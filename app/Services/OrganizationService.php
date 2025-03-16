<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use App\Repositories\OrganizationRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class OrganizationService
{

    public function create(FormRequest $request): ?Organization
    {
        return DB::transaction(function () use ($request) {
            $organization = app(OrganizationRepository::class)->store([
                'owner_id' => $request->user()->person->id,
                'name' => $request->input('name'),
                'organization_type_id' => $request->input('category'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'country_id' => $request->input('country'),
            ]);

            $organization->members()->attach($request->user()->person->id, ['role' => 'owner']);
            User::auth()->assignRole('owner');

            return $organization;
        });
    }

}
