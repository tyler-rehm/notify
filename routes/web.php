<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Emails\AppointmentEmail;

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::post('/sms/update/{api_key}', 'MessagesController@update_sms');
Route::post('/sms/incoming/{api_key}', 'MessagesController@incoming_sms');
Route::post('/call/update/{api_key}', 'MessagesController@update_call');
Route::post('/call/incoming/{api_key}', 'MessagesController@incoming_response');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/messages', 'MessagesController@index');
});

Route::get('/register', function() {
    return redirect('coming_soon');
});

Route::get('about', function() {
    return view('pages/about');
});

Route::post('demo', 'MessagesController@demo');

Route::get('cookies', function() {
    return view('pages/cookies');
});

Route::get('eula', function() {
    return view('pages/eula');
});

Route::get('privacy', function() {
    return view('pages/privacy');
});

Route::get('terms', function() {
    return view('pages/terms');
});

Route::get('coming_soon', function() {
    return view('coming_soon');
});

Route::get('services', function() {
    return view('pages.services');
});

Route::get('pricing', function() {
    return view('pages.pricing');
});

Route::get('faqs', function() {
    return view('pages.faqs');
});

Route::get('test', function() {
    $user = ['email' => 'tyler@hackrforce.com', 'name' => 'Tyler'];
    $message = ['date' => '11/26', 'time' => '12:00 PM', 'email_token' => str_random(25), 'location' => 'Buddy Brew Coffee House',  'message_id' => rand(0,1000)];
    $result = (new AppointmentEmail)->withData($message)->sendTo($user);
    dd($result);
});

Route::get('email/verify/{email}/{token}', 'UsersController@email_verify');
Route::get('appointment/{guid}/update/{status}/{method}', 'MessagesController@update_status');
