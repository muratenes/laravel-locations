<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'locations'], function () {
    Route::get('countries', [\MuratEnes\Regions\RegionController::class, 'countries']);
    Route::get('states/{countryId}', [\MuratEnes\Regions\RegionController::class, 'states']);
    Route::get('districts/{stateId}', [\MuratEnes\Regions\RegionController::class, 'districts']);
});
