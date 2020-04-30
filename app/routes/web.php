<?php

use Illuminate\Support\Facades\Route;
use App\Persone;

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

//khasike dir condition hna
Route::get('/', function () {
    $persones = Persone::where('ADRESSE_1', '!=' , null)->where('DATE_NAISSANCE', '!=' , null)->Paginate(10);
    return view('index' , ["persones"=>$persones]);
});


Route::post('display/export', 'PersoneController@export')->name('exportpage');
