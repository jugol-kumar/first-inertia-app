<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
        'username' => "Jugol Kumar",
    ]);
});


Route::get('/users', function (){
//    return User::paginate(10);

   return Inertia::render('Users', [
       "users"=>  User::paginate(10)->through(fn($user)=>[
           'id' => $user->id,
           'name' => $user->name,
       ]),
   ]);
});

Route::get('/settings', function (){
   return Inertia::render('Settings');
});


Route::post('/logout', function (\Illuminate\Http\Request $data){
    dd('call logout method'. $data->input('foo'));
});
