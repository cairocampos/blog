<?php

use Illuminate\Support\Facades\Route;

/* Controllers
--------------------*/
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\WebController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;

Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

/*Route::middleware("auth")->group(function() {
});*/

Route::get("/", [WebController::class, "index"])->name("home");
Route::get("/projects", [WebController::class, "projects"])->name("projects");


Route::get("/posts", [PostController::class, "index"])->name("posts");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::post("/posts/create", [PostController::class, "store"]);
Route::get("/posts/edit/{id}", [PostController::class, "edit"])->name("posts.edit");
Route::post("/posts/edit/{id}", [PostController::class, "edit"])->name("posts.update");


Route::post("/image_upload", [UploadController::class, "image"])->name("image_upload");

Route::get("/image_upload", [UploadController::class, "image"]);