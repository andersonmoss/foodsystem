<?php

Route::prefix('admin')
        ->namespace('admin')
        ->group(function(){
            
            // Routes Plans
            
            Route::get('plans/{url}/details', 'PlanDetailController@index')->name('plans.details.index');
            Route::get('plans/{url}/details/create', 'PlanDetailController@create')->name('plans.details.create');
            Route::post('plans/{url}/details', 'PlanDetailController@store')->name('plans.details.store');
            Route::get('plans/{url}/details/{detailId}/edit', 'PlanDetailController@edit')->name('plans.details.edit');
            Route::put('plans/{url}/details/{detailId}', 'PlanDetailController@update')->name('plans.details.update');
            Route::get('plans/{url}/details/{detailId}', 'PlanDetailController@show')->name('plans.details.show');
            Route::delete('plans/{url}/details/{detailId}', 'PlanDetailController@destroy')->name('plans.details.destroy');


            // Routes Plans

            Route::any('plans/search', 'PlanController@search')->name('plans.search');
            Route::get('plans', 'PlanController@index')->name('plans.index');
            Route::get('plans/create', 'PlanController@create')->name('plans.create');
            Route::post('plans', 'PlanController@store')->name('plans.store');
            Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
            Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
            Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
            Route::put('plans/{url}', 'PlanController@update')->name('plans.update');

            // Routes Profiles
            Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
            Route::resource('profiles', 'ACL\ProfileController');

            // Routes Permissions
            Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
            Route::resource('permissions', 'ACL\PermissionController');
});


Route::get('/', function () {
    return view('welcome');
});
