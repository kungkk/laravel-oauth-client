<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    $query = http_build_query([
        'client_id' => 4,        
        'redirect_uri' => 'http://localhost:9000/callback',        
        'response_type' => 'code',        
        'scope' => '',    
    ]);
    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});


Route::get('/callback', function (\Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;
    
    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',            
            'client_id' => 4,            
            'client_secret' => 'r946RbzBVY0WUGbofng2E7thLdkU1GQGHYtYHrLO',            
            'redirect_uri' => 'http://localhost:9000/callback',            
            'code' => $request->code]    
    ]);
    return json_decode((string) $response->getBody(),true);    

});