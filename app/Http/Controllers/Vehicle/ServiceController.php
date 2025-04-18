<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Vehicle;
use App\Models\Service;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\Request;

#[Group('Vehicle\Service')]
class ServiceController extends Controller
{
    public function index(Vehicle $vehicle)
    {
        return ServiceResource::collection($vehicle->services);
    }

    public function show(Vehicle $vehicle, Service $service)
    {
        return new ServiceResource($service->load(['items', 'user', 'vehicle']));
    }

    public function store(Vehicle $vehicle, Request $request)
    {
        $service = Service::create($request->validated());
        $vehicle->services()->save($service);
        return new ServiceResource($service);
    }
   
}
