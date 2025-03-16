<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Models\User;
use App\Repositories\OrganizationRepository;
use App\Repositories\OrganizationTypeRepository;
use App\Services\OrganizationService;
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

    public function storeForUser(StoreOrganizationRequest $request)
    {
        app(OrganizationService::class)->create($request);
        return to_route('dashboard');
    }

    public function store(StoreOrganizationRequest $request)
    {
        app(OrganizationService::class)->create($request);
        return to_route('organizations.index');
    }

}
