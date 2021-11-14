<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
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

Route::get('/', function() {
    return Inertia::render('Home');
});

Route::get('/users', function(Request $request) {
    return Inertia::render('Users', [
        'users' => User::query()
            ->when(Request::input('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(function($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name
                ];
            }),
        'filters' => Request::only(['search'])
    ]);
});

Route::get('/settings', function() {
    return Inertia::render('Settings');
});
