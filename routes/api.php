<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('v1/users', function (Request $request) {
    return $request->user();
});

Route::apiResources(
    [
        'v1/documents' => 'API\DocumentController'
    ]
);
