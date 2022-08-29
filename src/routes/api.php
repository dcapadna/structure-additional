<?php

Route::middleware('api')
    ->prefix('/api/v1')
    ->namespace('Dcapi\Structure\Additional\App\Http\Controllers')
    ->group(function () {
        Route::prefix('additional')->group(function () {
            Route::get('recaptcha','AdditionalController@recaptcha')->name("additional.recaptcha");
        });

        Route::prefix('additional')->middleware('auth:api')->group(function () {
            Route::get('years', 'AdditionalController@years');
            Route::get('months/name', 'AdditionalController@getNameMonths');
            Route::get('locations/{parent_id?}','LocationsController@index')->name("additional.locations");
            Route::get('banks','BanksController@index')->name("additional.banks");
            Route::get('financial/brokers','FinancialBrokersController@index')->name("additional.financial.brokers");
            Route::get('works','WorksController@index')->name("additional.works");
            Route::get('convert/price/point', 'AdditionalController@convertPricetoPoint');

        });
    });
