<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\AdminPagesController;


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


Route::group(["middleware"=>"throttle:50,1"],function(){

Route::get("/",[PagesController::class,"index"])->name("index");
Route::get("/about-us",[PagesController::class,"about"])->name("about");
Route::get("/contact-us",[PagesController::class,"contact"])->name("contact");
Route::POST("/contact",[PagesController::class,"contact_store"])->name("contact.store");
Route::get("/portfolio",[PagesController::class,'portfolios'])->name("portfolios");
Route::get("/portfolio/{id}/{name}",[PagesController::class,"portfolio"])->name("portfolio.each");

Route::get("/reviews",[PagesController::class,"reviews"])->name("reviews");


//admin

//Pages Photos 
Route::Get('/8ZaMMkK7CREDJQB/pages/index',[AdminPagesController::class,'index'])->name('pages.index'); 

//text 
Route::Get("/8ZaMMkK7CREDJQB/text/about",[TextController::class,"about"])->name("text.about");
Route::Get("/8ZaMMkK7CREDJQB/text/contact",[TextController::class,"contact"])->name("text.contact");
Route::POST("/8ZaMMkK7CREDJQB/text/store",[TextController::class,"store"])->name("text.store");

//review
Route::resource("/8ZaMMkK7CREDJQB/review",ReviewController::class);

//portfolio
Route::resource('/8ZaMMkK7CREDJQB/portfolio',PortfolioController::class);


//contact
Route::get("/8ZaMMkK7CREDJQB/contact",[ContactUsController::class,"index"])->name("contact.index");
Route::DELETE("/8ZaMMkK7CREDJQB/contact/destroy/{id}",[ContactUsController::class,"destroy"])->name("contact.destroy");


//image 
Route::get("/8ZaMMkK7CREDJQB/images/{type}/{id}",[ImageController::class,'add'])->name('image.create');
//Store
Route::POST("/8ZaMMkK7CREDJQB/image/store",[ImageController::class,'store']);
//Destroy 
Route::DELETE("/8ZaMMkK7CREDJQB/remove/image/{id}",[ImageController::class,'destroy'])->name('image.destroy');

});

