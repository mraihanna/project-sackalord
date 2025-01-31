<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
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
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);


//halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

//halaman category
Route::get('/categories', [CategoryController::class, 'index']);


// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'All Categories',
//         'categories' => Category::all()
//     ]);
// });

//halaman post per category
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('category', [
//         'title' => $category->name,
//         'posts' => $category->posts,
//         'category' => $category->name
//     ]);
// });


//route ketika membutuhkan login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    });
    //Route Postingan
    Route::resource('/dashboard/posts', DashboardPostController::class);
    Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug']);
    //Route Profile
    Route::get('dashboard/profile', [DashboardProfileController::class, 'index']);
    Route::get('dashboard/profile/edit', [DashboardProfileController::class, 'edit']);
    Route::put('dashboard/profile/update', [DashboardProfileController::class, 'update']);
    // Route::resource('/dashboard/profile', DashboardProfileController::class);
});

// Route::get('profile', function () {
//     return view('profile');
// })->name('profile');
// Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::resource('/dashboard/posts', DashboardPostController::class);
// Auth::routes(['verify'=>true]);

require __DIR__ . '/auth.php';
