<?php

namespace App\Http\Controllers;

use App\Models\ProfileSettings;
use App\Http\Requests\StoreProfileSettingsRequest;
use App\Http\Requests\UpdateProfileSettingsRequest;

class ProfileSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileSettings $profileSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileSettings $profileSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileSettingsRequest $request, ProfileSettings $profileSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileSettings $profileSettings)
    {
        //
    }
}
