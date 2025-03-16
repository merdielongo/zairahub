<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Models\User;
use App\Repositories\OrganizationRepository;
use App\Repositories\OrganizationTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class OrganizationController extends Controller
{

    public function createForUser()
    {
        return Inertia::render('organizations/CreateForUser', [
            'organizationTypes' => app(OrganizationTypeRepository::class)->getAll(),
        ]);
    }

    public function store(StoreOrganizationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $organization = app(OrganizationRepository::class)->store([
                'owner_id' => User::auth()->person->id,
                'name' => $request->input('name'),
                'organization_type_id' => $request->input('category'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'country_id' => $request->input('country'),
            ]);

            $organization->members()->attach(User::auth()->person->id, ['role' => 'owner']);
            User::auth()->assignRole('owner');

        });

        return to_route('dashboard');
    }

}
