<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);


Route::get('/live-recording', [webcontroller::class, 'liveRecording'])->name('liveRecording');
Route::get('/about-us', [webcontroller::class, 'theTribe'])->name('theTribe');
Route::get('/real-estate', [webcontroller::class, 'realEstate'])->name('realEstate');
Route::get('/event-lifestyle', [webcontroller::class, 'eventLifestyle'])->name('eventLifestyle');
Route::get('/contact-us', [webcontroller::class, 'contactUs'])->name('contactUs');
Route::post('/submit_form', [webcontroller::class, 'submitForm']);

Route::get('/projects', [webcontroller::class, 'projects'])->name('projects');


Route::get('/projects/{slug}', [webcontroller::class, 'show']);
