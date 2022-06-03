<?php

use App\Http\Controllers\BusStopController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => "users"], function() {
        Route::get('/', [UserController::class, 'index'])
            ->name('users.index')
            ->can('view users');
        Route::post('/store', [UserController::class, 'store'])
            ->name('users.store')
            ->can('create users');
        Route::get('/{user}', [UserController::class, 'show'])
            ->name('users.show')
            ->can('view users');
        Route::put('/{user}', [UserController::class, 'update'])
            ->name('users.update')
            ->can('edit users');
        Route::delete('/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy')
            ->can('delete users');
    });

    Route::group(['prefix' => "user"], function() {
        Route::view('/profile/edit', 'user.profile.edit')
            ->name('user.profile.edit');

        Route::put('profile', [StudentController::class, 'profile'])->name('user.profile.update');
    });

    Route::group(['prefix' => "students"], function() {
        Route::get('/', [StudentController::class, 'index'])
            ->name('students.index')
            ->can('view students');
        Route::post('/store', [StudentController::class, 'store'])
            ->name('students.store')
            ->can('create students');
        Route::view('/import', 'student.import')
            ->name('students.import')
            ->can('view students');
        Route::post('/import', [StudentController::class, 'import'])
            ->name('students.import')
            ->can('create students');
        Route::get('/download-format', [StudentController::class, 'downloadFormat'])
            ->name('students.downloadFormat')
            ->can('create students');
        Route::get('/{student}', [StudentController::class, 'show'])
            ->name('students.show')
            ->can('view students');
        Route::get('/{student}/edit', [StudentController::class, 'edit'])
            ->name('students.edit')
            ->can('edit students');
        Route::put('/{student}', [StudentController::class, 'update'])
            ->name('students.update')
            ->can('edit students');
        Route::delete('/{user}', [StudentController::class, 'destroy'])
            ->name('students.destroy')
            ->can('delete students');
    });

    Route::group(['prefix' => "courses"], function() {
        Route::get('/', [CourseController::class, 'index'])
            ->name('courses.index')
            ->can('view courses');
        Route::get('/create', [CourseController::class, 'create'])
            ->name('courses.create')
            ->can('create courses');
        Route::post('/store', [CourseController::class, 'store'])
            ->name('courses.store')
            ->can('create courses');
        Route::get('/{course}', [CourseController::class, 'show'])
            ->name('courses.show')
            ->can('view courses');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])
            ->name('courses.edit')
            ->can('edit courses');
        Route::put('/{course}', [CourseController::class, 'update'])
            ->name('courses.update')
            ->can('edit courses');
        Route::delete('/{course}', [CourseController::class, 'destroy'])
            ->name('courses.destroy')
            ->can('delete courses');
    });

    Route::group(['prefix' => "levels"], function() {
        Route::get('/', [LevelController::class, 'index'])
            ->name('levels.index')
            ->can('view levels');
    });

    Route::group(['prefix' => "grades"], function() {
        Route::get('/', [GradeController::class, 'index'])
            ->name('grades.index')
            ->can('view grades');
        Route::get('level/{level}', [GradeController::class, 'gradesByLevel'])
            ->name('grades.byLevel')
            ->can('view grades');
    });

    Route::group(['prefix' => "course-types"], function() {
        Route::get('/', [CourseTypeController::class, 'index'])
            ->name('courseTypes.index')
            ->can('view course types');
        Route::get('level/{level}', [CourseTypeController::class, 'courseTypesByLevel'])
            ->name('courseTypes.byLevel')
            ->can('view course types');
    });

    Route::group(['prefix' => "bus-stop"], function() {
        Route::get('/', [BusStopController::class, 'index'])
            ->name('busStop.index')
            ->can('view bus stops');
        Route::get('route/{route}', [BusStopController::class, 'busStopByRoute'])
            ->name('busStop.byLevel')
            ->can('view bus stops');
    });

    Route::group(['prefix' => "enrollment"], function() {
        Route::get('/', [EnrollmentController::class, 'create'])
            ->name('enrollment.create')
            ->can('create enrollment');
//            ->middleware('active.enrollment');
        Route::post('/store', [EnrollmentController::class, 'store'])
            ->name('enrollment.store')
            ->can('create enrollment');
    });

    Route::group(['prefix' => "enrollments"], function() {
        Route::get('/', [EnrollmentController::class, 'index'])
            ->name('enrollments.index')
            ->can('view enrollments');
        Route::get('/{enrollment}', [EnrollmentController::class, 'show'])
            ->name('enrollments.show')
            ->can('view enrollments');
        Route::get('/export/{enrollment}', [EnrollmentController::class, 'export'])
            ->name('enrollments.export')
            ->can('view enrollments');
    });
});
