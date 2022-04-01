<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
// use pp\CrudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------ --------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [CrudController :: class, 'showData']);
Route::get('/add_data', [CrudController :: class, 'addData']);
Route::post('/storeData', [CrudController :: class, 'storeData']); // post because of data store security

