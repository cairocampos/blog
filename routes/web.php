<?php

use Illuminate\Support\Facades\Route;

/* Controllers
--------------------*/
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\WebController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

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
Route::post("/posts/edit/{id}", [PostController::class, "update"])->name("posts.update");
Route::delete("/posts/{id}", [PostController::class, "destroy"])->name("posts.destroy");


Route::post("/image_upload", [UploadController::class, "image"])->name("image_upload");
Route::get("/image_upload", [UploadController::class, "image"]);

Route::get("/users", [UserController::class, "index"])->name("users.index");



Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
Route::post("/projects/create", [ProjectController::class, "store"]);
Route::get("/projects/{id}/edit", [ProjectController::class, "edit"])->name("projects.edit");
Route::post("/projects/{id}/edit", [ProjectController::class, "update"]);