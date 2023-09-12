<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Models\Genre;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/landing', [PostController::class, 'index'])->name('posts');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/form', [AdminController::class, 'AdminForm'])->middleware('auth')->name('admin.post');
    Route::get('/admin/dashboard', [PostController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/show/{post:slug}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/admin/edit/{post:slug}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::put('/admin/update/{post:slug}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::post('/admin/update/{post:slug}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::match(['POST', 'PUT'], '/admin/update/{post:slug}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::match(['POST', 'PUT'], '/admin/edit/{post:slug}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::resource('/admin', PostController::class)->except([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);
Route::post('/store', [PostController::class, 'store'])->name('post.store');
Route::delete('/post/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::post('/admin/form', function () {
    App\Models\Post::create(['title' => request('title')]);
    return redirect()->back();
});
Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Post::class, 'slug', request('title'));
    return response()->json(['slug' => $slug]);
});
