<?php

Route::prefix('admin')
        ->namespace('admin')
        ->group(function(){
            
            // Routes Plans

            Route::get('plans/{url}/details', 'PlanDetailController@index')->name('plan.details.index');

            // Routes Plans

            Route::any('plans/search', 'PlanController@search')->name('plans.search');
            Route::get('plans', 'PlanController@index')->name('plans.index');
            Route::get('plans/create', 'PlanController@create')->name('plans.create');
            Route::post('plans', 'PlanController@store')->name('plans.store');
            Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
            Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
            Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
            Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
});


Route::get('/', function () {
    return view('welcome');
});
