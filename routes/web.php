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

Route::get('test', function() {
    $user = ['email' => 'tyler@hackrforce.com', 'name' => 'Tyler'];
    $message = ['date' => '11/26', 'time' => '12:00 PM', 'guid' => str_random(25), 'message_id' => rand(0,1000)];
    $data = array_merge($user, $message);
    $result = (new AppointmentEmail)->sendTemplate($data);
    dd($result);
});

Route::get('test2', function() {
    include('../app/Emails/Mandrill.php');
});

Route::get('email/verify/{email}/{token}', 'UsersController@email_verify');
Route::get('appointment/{guid}/update/{status}/{method}', 'MessagesController@update_status');
