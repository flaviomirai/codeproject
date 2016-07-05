<?php



Route::get('/', function () {
    return view('app');
});


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::get('usuarios', ['uses' => 'UserController@index']);


Route::group(['middleware' => 'oauth'], function(){

    Route::resource('client','ClientController', ['except' => ['create', 'edit']]);
    Route::resource('project','ProjectController', ['except' => ['create', 'edit']]);


    Route::group(['prefix' => 'project'], function(){
        Route::get('{id}/note', ['uses' =>  'ProjectNoteController@index' ]);
        Route::post('{id}/note', ['uses' =>  'ProjectNoteController@store' ]);
        Route::put('note/{noteId}', ['uses' =>  'ProjectNoteController@update' ]);
        Route::get('{id}/note/{noteId}', ['uses' =>  'ProjectNoteController@show' ]);
        Route::delete('note/{id}', ['uses' =>  'ProjectNoteController@destroy' ]);

        Route::post('{id}/file', 'ProjectFileController@store');
    });

    Route::get('user/authenticated', ['uses' =>  'UserController@authenticated' ]);




});


