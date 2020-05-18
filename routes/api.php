<?php
/**
 * API routes
 */
Route::group([
    "prefix" => "v1",
], function () {

    /**
     * COVID module
     */
    Route::group([
        "prefix" => "covid",
        "namespace" => "COVID",
    ], function () {

        Route::get("/", "DataController@fetch");
    });
});
