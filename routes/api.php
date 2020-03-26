<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\AuthController@login')->name('login');
Route::post('register', 'Api\AuthController@register');

Route::middleware(['auth:api'])->group(function(){
    /* specify all resource's custom methods before you register the resource*/
    Route::post('uploadImage', 'Api\PostController@uploadFeatureImage');

    Route::apiResources([
        'roles' => 'Api\RoleController',
        'users' => 'Api\UserController',
        'posts' => 'Api\PostController',
        'tags' => 'Api\TagController'
    ]);

    Route::post('details', 'Api\AuthController@details');
    Route::post('logout', 'Api\AuthController@logout');
});

/**
 * Api routes for guidance pet blog
 */

Route::apiResources([
    'tags' => 'Api\TagController',
]);
