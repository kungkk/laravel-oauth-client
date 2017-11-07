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
use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});

// for couple with laravel-passport-postman
//Route::get('/', function () {
//    $query = http_build_query([
//        'client_id' => 4,        
//        'redirect_uri' => 'http://localhost:9000/callback',        
//        'response_type' => 'code',        
//        'scope' => '',    
//    ]);
//    return redirect('http://localhost:8000/oauth/authorize?'.$query);
//});
//
//
//Route::get('/callback', function (\Illuminate\Http\Request $request) {
//    $http = new GuzzleHttp\Client;
//    
//    $response = $http->post('http://localhost:8000/oauth/token', [
//        'form_params' => [
//            'grant_type' => 'authorization_code',            
//            'client_id' => 4,            
//            'client_secret' => 'r946RbzBVY0WUGbofng2E7thLdkU1GQGHYtYHrLO',            
//            'redirect_uri' => 'http://localhost:9000/callback',            
//            'code' => $request->code]    
//    ]);
//    return json_decode((string) $response->getBody(),true);    
//});


// for couple with laravel-oauth-server (Authorization Code Grant)
//Route::get('/', function () {
//    $query = http_build_query([
//        'client_id' => 3,        
//        'redirect_uri' => 'http://localhost:9000/callback',        
//        'response_type' => 'code',        
//        'scope' => '',    
//    ]);
//    return redirect('http://localhost:8000/oauth/authorize?'.$query);
//});

//Route::get('/callback', function (\Illuminate\Http\Request $request) {
//    $http = new GuzzleHttp\Client;
//    
//    $response = $http->post('http://localhost:8000/oauth/token', [
//        'form_params' => [
//            'grant_type' => 'authorization_code',            
//            'client_id' => 3,            
//            'client_secret' => 'l1LBihH75349htnoOIOVTOEjPSJujcEdn1klwaUV',            
//            'redirect_uri' => 'http://localhost:9000/callback',            
//            'code' => $request->code]    
//    ]);
//    return json_decode((string) $response->getBody(),true);    
//});

// for couple with laravel-oauth-server (Client Credential Grant)
//Route::get('/client', function (\Illuminate\Http\Request $request) {
//    $http = new GuzzleHttp\Client;
//    
//    $response = $http->post('http://localhost:8000/oauth/token', [
//        'form_params' => [
//            'grant_type' => 'client_credentials',
//            'client_id' => 3,        
//            'client_secret' => 'l1LBihH75349htnoOIOVTOEjPSJujcEdn1klwaUV',            
//            'scope' => '']    
//    ]);
//    
//    // working code
//    //return json_decode((string) $response->getBody(), true)['access_token'];
//    
//    return json_decode((string) $response->getBody(), true);
//});

// for couple with gocod-api (Authorization Code Grant)
//Route::get('/', function () {
//    $query = http_build_query([
//        'client_id' => 2,        
//        'redirect_uri' => 'http://localhost:9000/callback',        
//        'response_type' => 'code',        
//        'scope' => '',    
//    ]);
//    
//    return redirect('http://localhost:8000/oauth/authorize?'.$query);
//});
//
//
//Route::get('/callback', function (\Illuminate\Http\Request $request) {
//    $http = new GuzzleHttp\Client;
//    
//    $response = $http->post('http://localhost:8000/oauth/token', [
//        'form_params' => [
//            'grant_type' => 'authorization_code',            
//            'client_id' => 2,            
//            'client_secret' => 'ziR59EszIzjV2djqfFCRSrzWrGIntMP1i0Y54DlF',            
//            'redirect_uri' => 'http://localhost:9000/callback',            
//            'code' => $request->code]    
//    ]);
//    return json_decode((string) $response->getBody(),true);    
//});


// for couple with gocod-api (Client Credential Grant)
// ===================================================
Route::get('/client', function (\Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;
    
    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => 2,        
            'client_secret' => 'ziR59EszIzjV2djqfFCRSrzWrGIntMP1i0Y54DlF',            
            'scope' => '']    
    ]);
    
    // working code
    //return json_decode((string) $response->getBody(), true)['access_token'];
    
    return json_decode((string) $response->getBody(), true);
});

//
//// @link http://docs.guzzlephp.org/en/5.3/clients.html
//Route::get('/kkarticles', function (\Illuminate\Http\Request $request) {
//    $http = new Client([
//        'defaults' => [
//            'headers' => ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJhNDIxNGVlMjIzMDU2ZTEyYTlhOWY1ZjQ3Y2QwOTgyYmIxYmRmNzA1ZWY2YjQ4NDc3NGMwNTM4M2Q5MGMyZWIyZDg1ZmI5ZTNkOTc0MjIwIn0.eyJhdWQiOiIyIiwianRpIjoiMmE0MjE0ZWUyMjMwNTZlMTJhOWE5ZjVmNDdjZDA5ODJiYjFiZGY3MDVlZjZiNDg0Nzc0YzA1MzgzZDkwYzJlYjJkODVmYjllM2Q5NzQyMjAiLCJpYXQiOjE1MDk5NDgwMTQsIm5iZiI6MTUwOTk0ODAxNCwiZXhwIjoxNTEwMDM0NDEzLCJzdWIiOiIiLCJzY29wZXMiOltdfQ.V05Kx6b-DZDo3ZwQTZDZsxgBM6hFuoZIsdo4iX6CwxDyzhZn7n5VJ1GAmo3-mgDD3sAVPbxNspt4pT4t0VHWcy2-vw-W_PMwnh9mgEI8UhQEbD3CPiUptaArjYfjzISNkYTBmmARaDvgXUXXxY8TSNmn1b1R3M6LOpcV5QQBBB8dzJGTXaj7jbPE5C-rIS6RY8Ymb6y0sbVSj8uogeZ6u4DBrbDN-aqzPoUrAKng2LE6Lp-QhjyXtWsmcNpVRR_9d_Q_VmMhLjmhuDyYqv-2P5CB19AalyM8CVX8aIXnFCmCjHaNftMJeOIqr-2rAMbI1J2UpzUGNELf4hi2l7a262ikpXqv-dlso9tAD4iKp6vk7KUCz_xtKn1lKOF0OVfjC0bpxjQT7yIBpYIKMjsNrpUrqcSgK9kKcbKK21EyTfG5g0EDdhu1lVd9lAFZPsElp5XnvHG4WQBpkiK2YphNpCKvHDKmKkmN0jHpXC08cvJ1dJhYpYX26IcxjpQuCZ3szWabFAZtzSMuydf3WsGFz6IWLeXV57hHeSsqAjoTGllNLYC_1XssGiwK6nJmvFyNtUKU7wUQkxJd1EtSN-2cQFz-7M6Q0qzzq1AyIhH5DNnoJtd6ezYZpJhc8wuUSnk2wNk0Lmxes4HD8t_YUp1CRhT4jHU5FDhgSWUfFlevk7s']
//        ]
//    ]);
//    $response = $http->get('http://localhost:8000/api/kk-articles');
//
//    
//    // working code
//    //return json_decode((string) $response->getBody(), true)['access_token'];
//    
//    //return json_decode((string) $response->getBody(), true)['data'];
//    return json_decode((string) $response->getBody(), true);
//});