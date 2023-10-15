<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['admin_auth', 'user_auth'])->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');
    Route::get('about', [GuestController::class, 'about'])->name('guest.about');
    Route::get('courses', [GuestController::class, 'courses'])->name('guest.courses');
    Route::get('loginPage', [GuestController::class, 'loginPage'])->name('guest.login');
    Route::get('registerPage', [GuestController::class, 'registerPage'])->name('guest.register');
    Route::get('details/{id}', [GuestController::class, 'courseDetails'])->name('guest.courseDetails');
    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('googleLogin');
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('comment', [CommentController::class, 'comment'])->name('comment');
    Route::get('/gate', [AuthController::class, 'gate']);
    Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin.changePassword');

    Route::middleware(['admin_auth'])->group(function () {
        Route::prefix('admin_')->group(function () {
            Route::get('dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

            // List
            Route::get('list', [AdminController::class, 'adminList'])->name('admin.list');
            Route::get('add/users', [AdminController::class, 'addNewUserPage'])->name('admin.addNewUserPage');
            Route::post('add/users', [AdminController::class, 'addNewUser'])->name('admin.addNewUser');
            Route::get('user-list', [AdminController::class, 'userList'])->name('admin.user-list');
            Route::get('delete/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
            Route::get('profile/{id}', [AdminController::class, 'profile'])->name('admin.profile');


            // categories
            Route::prefix('category')->group(function () {
                Route::get('index', [CategoryController::class, 'index'])->name('admin.category');
                Route::get('create', [CategoryController::class, 'createPage'])->name('admin.createCategoryPage');
                Route::post('create', [CategoryController::class, 'createCategory'])->name('admin.createCategory');
                Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
                Route::post('update', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
                Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.deleteCategory');
            });

            // courses
            Route::prefix('course')->group(function () {
                Route::get('index', [CourseController::class, 'index'])->name('admin.courses');
                Route::get('create', [CourseController::class, 'createCoursePage'])->name('admin.createCoursePage');
                Route::post('create', [CourseController::class, 'createCourse'])->name('admin.createCourse');
                Route::get('edit/{id}', [CourseController::class, 'editCourse'])->name('admin.courseEdit');
                Route::get('delete/{id}', [CourseController::class, 'deleteCourse'])->name('admin.courseDelete');
                Route::post('update', [CourseController::class, 'updateCourse'])->name('admin.updateCourse');
                Route::get('/{id}', [LessonController::class, 'lessons'])->name('admin.lessons');
                Route::get('{id}/lesson/create', [LessonController::class, 'createLessonPage'])->name('admin.createLessonPage');
                Route::post('lesson/create', [LessonController::class, 'createLesson'])->name('admin.createLesson');
                Route::get('lesson/delete/{id}', [LessonController::class, 'deleteLesson'])->name('admin.deleteLesson');
            });

            // profile
            Route::prefix('account')->group(function () {
                Route::post('upgrade', [AdminController::class, 'upgrade'])->name('admin.updateProfile');
                Route::get('change/password', [AdminController::class, 'changePasswordPage'])->name('admin.changePasswordPage');
                Route::get('themes', [AdminController::class, 'themes'])->name('admin.themes');
                Route::post('themes', [AdminController::class, 'changeTheme'])->name('admin.theme');
                //Route::get('reset/password',[AdminController::class,'resetPasswordPage'])->name('admin.resetPasswordPage');
            });

            // order
            Route::prefix('order')->group(function () {
                Route::get('index', [OrderController::class, 'orders'])->name('admin.orders');
                Route::get('details/{id}', [OrderController::class, 'orderDetail'])->name('admin.orderDetail');
                Route::post('accept', [OrderController::class, 'orderAccept'])->name('admin.orderAccept');
                Route::post('deny', [OrderController::class, 'orderDeny'])->name('admin.orderDeny');
            });
        });
    });
    Route::middleware(['user_auth'])->group(function () {
        Route::prefix('user_')->group(function () {
            Route::get('home', [UserController::class, 'home'])->name('user.home');
            Route::prefix('courses')->group(function () {
                Route::get('index', [UserController::class, 'courses'])->name('user.courses');
                Route::get('buyPage/{id}', [UserController::class, 'buyPage'])->name('user.buyPage');
                Route::post('buy', [UserController::class, 'buy'])->name('user.buy');
                Route::get('enrolled', [UserController::class, 'enrolledCourses'])->name('user.enrolledCourses');
                Route::get('{id}', [UserController::class, 'playList'])->name('user.play');
                Route::get('details/{id}', [UserController::class, 'courseDetails'])->name('user.courseDetails');
                Route::get('denied/{id}',[UserController::class,'denyReason'])->name('user.denyReason');
                Route::get('enrollment/delete/{id}',[UserController::class,'deleteEnrollment'])->name('user.deleteEnrollment');
            });
            Route::get('profile', [UserController::class, 'userProfile'])->name('user.profile');
            Route::get('change/password/',[UserController::class,'changePasswordPage'])->name('user.changePasswordPage');
            Route::post('update', [AdminController::class, 'upgrade'])->name('user.updateProfile');
        });
    });
});
