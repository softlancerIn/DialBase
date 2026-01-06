<?php

use App\Http\Controllers\Api\StateController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::controller(StateController::class)->group(function () {
        Route::get('/states', 'getAllStates')->name('api.states');
        
        Route::get('/states-with-cities', 'getAllStatesWithCities')->name('api.states_with_cities');
        
        Route::get('/cities', 'getCitiesByState')->name('api.cities');
        Route::get('/states/{state}/cities', 'getCitiesByState')->name('api.state.cities');
    });
});
