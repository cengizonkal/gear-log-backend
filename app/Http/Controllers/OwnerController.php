<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return OwnerResource::collection($owners);
    }

    public function store(OwnerRequest $request)
    {
        $owner = Owner::create($request->validated());
        return new OwnerResource($owner);
    }

    public function show(Owner $owner)
    {
        return new OwnerResource($owner->load('vehicles'));
    }

    public function update(OwnerRequest $request, Owner $owner)
    {
        $owner->update($request->validated());
        return new OwnerResource($owner);
    }

    public function delete(Owner $owner)
    {
        $owner->delete();
        return response()->json(['message' => 'Arac sahibi başarıyla silindi.']);
    }
}
