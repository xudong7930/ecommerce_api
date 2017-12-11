<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'RegisterController@register')->name('register');

Route::group(['prefix'=>'topics'], function () {
    Route::get('/', 'TopicController@index')->name('topics.list');
    Route::get('/{topic}', 'TopicController@show')->name('topics.show');
    Route::post('/', 'TopicController@store')->name('topics.store')->middleware('auth:api');
    Route::patch('/{topic}', 'TopicController@update')->name('topics.update')->middleware('auth:api');;
    Route::delete('/{topic}', 'TopicController@destroy')->name('topics.destroy')->middleware('auth:api');
    Route::group(['prefix'=>'/{topic}/post'], function () {
        Route::post('/', 'PostController@store')->name('topic.post.store')->middleware('auth:api');
        Route::get('/{post}', 'PostController@show')->name('topic.post.show')->middleware('auth:api');
        Route::patch('/{post}', 'PostController@update')->name('topic.post.update')->middleware('auth:api');
        Route::delete('/{post}', 'PostController@destroy')->name('topic.post.destroy')->middleware('auth:api');
        Route::post('/{post}/likes', 'PostLikeController@like')->name('topic.post.like')->middleware('auth:api');
    });
});
