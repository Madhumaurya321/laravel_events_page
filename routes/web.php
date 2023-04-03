<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\Indexhome;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\Indexhome::class, 'eventListShow']);
Route::post('/eventList',[App\Http\Controllers\Indexhome::class, 'filterData'])->name('eventList');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/panel',[App\Http\Controllers\HomeController::class, 'index'])->name('panel');

//Artist
Route::view('addArtist','artist/create')->name('addArtist');
Route::get('updateArtist/{id}',[ArtistController::class,'updateArtist'])->name('updateArtist');
Route::post('editArtist',[ArtistController::class,'editArtist'])->name('editArtist');
Route::get('listArtist',[ArtistController::class,'index'])->name('listArtist');
Route::post('createArtist',[ArtistController::class,'createArtist'])->name('createArtist');
Route::get('deleteArtist/{id}',[ArtistController::class,'deleteArtist'])->name('deleteArtist');

//Genres
Route::view('addGenre','genres/create')->name('addGenre');
Route::get('updateGenre/{id}',[GenreController::class,'updateGenre'])->name('updateGenre');
Route::post('editGenre',[GenreController::class,'editGenre'])->name('editGenre');
Route::get('listGenre',[GenreController::class,'index'])->name('listGenre');
Route::post('createGenre',[GenreController::class,'createGenre'])->name('createGenre');
Route::get('deleteGenre/{id}',[GenreController::class,'deleteGenre'])->name('deleteGenre');


//venue
Route::view('addVenue','venue/create')->name('addVenue');
Route::get('updateVenue/{id}',[VenueController::class,'updateVenue'])->name('updateVenue');
Route::post('editVenue',[VenueController::class,'editVenue'])->name('editVenue');
Route::get('listVenue',[VenueController::class,'index'])->name('listVenue');
Route::post('createVenue',[VenueController::class,'createVenue'])->name('createVenue');
Route::get('deleteVenue/{id}',[VenueController::class,'deleteVenue'])->name('deleteVenue');

//Event
Route::get('addEvent',[EventController::class,'addEvent'])->name('addEvent');
Route::get('updateEvent/{id}',[EventController::class,'updateEvent'])->name('updateEvent');
Route::post('editEvent',[EventController::class,'editEvent'])->name('editEvent');
Route::get('listEvent',[EventController::class,'index'])->name('listEvent');
Route::post('createEvent',[EventController::class,'createEvent'])->name('createEvent');
Route::get('deleteEvent/{id}',[EventController::class,'deleteEvent'])->name('deleteEvent');




