<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

Route::get('/', function () 
{
    return view('welcome');
});

// Route::get('/todolist', function()
// {
//     return view('todolist');
// });
Route::get('todolist', [TodoListController::class, 'index']);


// Route::post('/saveItemRoute', function()
// {
//     return view('todolist');
// })->name('saveItem');
Route::post('saveItemRoute', [TodoListController::class, 'saveItem'])->name('saveItem');

Route::post('completedRoute/{id}', [TodoListController::class, 'completed'])->name('completed');