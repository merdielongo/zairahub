<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class AttributeRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:attribute-role {user : The email of the user} {role : The name of the role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a role to a user based on their email';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = $this->argument('user');
        $roleName = $this->argument('role');

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User with email '{$email}' not found.");
            return;
        }

        $role = Role::where('name', $roleName)->first();
        if (!$role) {
            $this->error("Role '{$roleName}' not found.");
            return;
        }

        if ($user->hasRole($roleName)) {
            $this->info("User already has the '{$roleName}' role.");
            return;
        }

        $user->assignRole($roleName);
        $this->info("Role '{$roleName}' successfully assigned to '{$email}'.");
    }
}
