<?php

use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
//use Request;


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
   return Inertia::render('User/Users', [
       "users"  =>  User::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user)=>[
                   'id' => $user->id,
                   'name' => $user->name,
       ]),

       "filters" => Request::only("search"),
   ]);
});

Route::get('/users/create', function (){
   return Inertia::render('User/Create');
});


Route::get('/settings', function (){
   return Inertia::render('Settings');
});




Route::post('/logout', function (Request $data){
    dd('call logout method'. $data->input('foo'));
});
