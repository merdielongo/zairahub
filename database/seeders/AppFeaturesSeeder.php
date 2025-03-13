<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AppFeaturesSeeder extends Seeder
{
    protected array $crud_permissions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->crud_permissions = config('appfeatures.crud_permissions');
        $modules = config('appfeatures.modules');

        DB::transaction(function() use ($modules) {
            foreach ($modules as $module) {
                $obj_module = $this->updateOrCreateModule(Arr::except($module, ['features', 'roles']));

                $this->updateOrCreateFeatures($obj_module, $module['features'], $module['roles']);
            }
        });
    }

    /**
     * Update a module or create if it doesn't in database.
     *
     * @param array $module
     * @return Module
     */
    protected function updateOrCreateModule(array $module) : Module
    {
        return Module::updateOrCreate(['name' => $module['name']], Arr::except($module, 'name'));
    }

    protected function updateOrCreateFeatures(Module $module, array $features, array $module_roles)
    {
        foreach ($features as $item) {
            $feature = Feature::updateOrCreate(
                ['name' => $item['name']],
                Arr::add(Arr::except($item, ['crud_permission', 'permissions', 'name', 'roles']), 'module_id', $module->id)
            );

            $this->setPermissions($feature, $item['permissions'], $item['crud_permission'], array_merge($module_roles, $item['roles']));
        }
    }

    protected function setPermissions(Feature $feature, array $permissions, array|bool $crud_permission, array $inherited_roles) : void
    {
        $cruds = [];
        if ($crud_permission === true)
            $cruds = $this->crud_permissions;
        else if (is_array($crud_permission) && count($crud_permission) > 0)
            $cruds = Arr::only($this->crud_permissions, $crud_permission);

        if (count($cruds) > 0) {
            foreach ($cruds as $key => $item) {

                $permissions[] = [
                    'name' => $feature->name.".".$key,
                    'label_fr' => $item['fr']." ".$feature->label_fr,
                    'label_en' => $item['en']." ".$feature->label_en,
                ];
            }
        }

        foreach ($permissions as $permission) {
            $roles = array_unique(array_merge($inherited_roles, $permission['roles'] ?? []));

            $permission['guard_name'] = 'web';
            $permission['name'] = Str::startsWith($permission['name'], '.')
                ? $feature->name.$permission['name']
                : $permission['name'];

            $permission = Permission::updateOrCreate(
                Arr::only($permission, 'name'),
                Arr::add(
                    Arr::except($permission, ['name', 'roles']),
                    'feature_id',
                    $feature->id
                )
            );

            if (count($roles) > 0)
                $permission->assignRole($roles);
        }
    }
}
