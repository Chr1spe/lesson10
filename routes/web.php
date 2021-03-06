<?php



$stripe = resolve('App\Billing\Stripe');
//dd($stripe);

Route::get('/','PostController@index')->name('home');
Route::get('/posts/create','PostController@create');
Route::post('/posts', 'PostController@store');

Route::get('/posts/tags/{tag}', 'TagController@index');

Route::get('/posts/{post}','PostController@show');

Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('login', 'SessionsController@store')->name('login');
Route::get('/logout', 'SessionsController@destroy');
