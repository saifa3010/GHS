<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CreateWorkerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\User\userPageController;
use App\Http\Controllers\Admin\Profile_workerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Worker\WorkerController;
use App\Http\Middleware\CheckeUserRole;
use GuzzleHttp\Promise\Create;
use Illuminate\Queue\Worker;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/Home', function () {
//     return view('admin.home');})->middleware(['auth', CheckeUserRole::class])->name('home');
Route::get("/Home",[HomeDashboardController::class,'home'])->middleware(['auth', CheckeUserRole::class])->name('home');

Route::resource('service', ServiceController::class)->middleware(['auth', CheckeUserRole::class]);
Route::resource('categories', CategoriesController::class)->middleware(['auth', CheckeUserRole::class]);
Route::resource('HomePage', HomePageController::class)->middleware(['auth', CheckeUserRole::class]);
Route::resource('About', AboutController::class)->middleware(['auth', CheckeUserRole::class]);
Route::resource('footer', FooterController::class)->middleware(['auth', CheckeUserRole::class]);
Route::get('/CreateWorker/create', [CreateWorkerController::class, 'create'])->name('create_worker')->middleware(['auth', CheckeUserRole::class]);
Route::post('/CreateWorker/store', [CreateWorkerController::class, 'store'])->middleware(['auth', CheckeUserRole::class]);
Route::resource('Profile_worker', Profile_workerController::class)->middleware(['auth', CheckeUserRole::class]);
Route::get('/comments/comment', [CommentController::class, 'comment'])->name('comments.comment')->middleware(['auth', CheckeUserRole::class]);
Route::post('/comments/approve/{comment}', [CommentController::class, 'approveComment'])->name('approve.comment')->middleware(['auth', CheckeUserRole::class]);
Route::get('/tasks/index', [TaskController::class,'index'])->name('tasks')->middleware(['auth', CheckeUserRole::class]);
Route::patch('/tasks/{id}/update-status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');



Route::get('/', [HomeController::class, 'index'])->name('user_page');
Route::get('/category/{category}', [HomeController::class, 'showWorker'])->name('user.showWorker');
Route::get('/worker/{id}', [TaskController::class, 'showDetails'])->name('worker.details');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/tasks/store-comment', [TaskController::class, 'storeComment'])->name('tasks.storeComment');
Route::get('/checkout/{taskId}', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/payment/{id}', [PaymentController::class, 'showPayment'])->name('show.payment');
Route::post('/payment/store/{id}', [PaymentController::class, 'store'])->name('store.payment');
Route::get('/checkout/success/{task_id}', [BookingController::class, 'success'])->name('user.booking');
Route::get('/aboutUs', [AboutController::class, 'About'])->name('aboutUs');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';
