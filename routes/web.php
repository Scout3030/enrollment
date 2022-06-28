<?php

use App\Http\Controllers\AcademicPeriodController;
use App\Http\Controllers\BusStopController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
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

    Route::view('/settings', 'settings.index')
            ->can('edit settings')
            ->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])
            ->can('edit settings')
            ->name('settings.store');

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

    Route::post('/upload-files/{path?}', [FileController::class, 'upload'])
        ->name('upload.files');

    if(config('app.env') == 'local') {
        Route::view('/profile/edit', 'user.profile.edit')
            ->name('user.profile.edit')
            ->middleware(['has.grade']);
    } else {
        Route::view('/profile/edit', 'user.profile.edit')
            ->name('user.profile.edit')
            ->middleware(['has.grade', 'active.enrollment']);
    }

    Route::put('student/profile', [StudentController::class, 'profile'])
        ->name('student.profile.update');
    Route::put('user/profile', [UserController::class, 'profile'])
        ->name('user.profile.update');
    Route::get('/profile/grade', [StudentController::class, 'optionGrade'])
        ->name('user.grade');

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
        Route::delete('/{student}', [StudentController::class, 'destroy'])
            ->name('students.destroy')
            ->can('delete students');
        Route::get('/export/{student}', [StudentController::class, 'export'])
            ->name('students.export')
            ->can('view students');
        Route::get('/notification/reset-password', [StudentController::class, 'notificationResetPassword'])
            ->name('students.notification.reset-password');
        Route::post('/update-grade', [StudentController::class, 'updateGrade'])
            ->name('students.update-grade');
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

    Route::group(['prefix' => "academic-periods"], function() {
        Route::get('/', [AcademicPeriodController::class, 'index'])
            ->name('academic-periods.index')
            ->can('view academic periods');
        Route::get('/create', [AcademicPeriodController::class, 'create'])
            ->name('academic-periods.create')
            ->can('create academic periods');
        Route::post('/store', [AcademicPeriodController::class, 'store'])
            ->name('academic-periods.store')
            ->can('create academic periods');
        Route::get('/{academicPeriod}', [AcademicPeriodController::class, 'show'])
            ->name('academic-periods.show')
            ->can('view academic periods');
        Route::get('/{academicPeriod}/edit', [AcademicPeriodController::class, 'edit'])
            ->name('academic-periods.edit')
            ->can('edit academic periods');
        Route::put('/{academicPeriod}', [AcademicPeriodController::class, 'update'])
            ->name('academic-periods.update')
            ->can('edit academic periods');
        Route::post('/change-status', [AcademicPeriodController::class, 'changeStatus'])
            ->name('academic-periods.change-status')
            ->can('edit academic periods');
        Route::delete('/{academicPeriod}', [AcademicPeriodController::class, 'destroy'])
            ->name('academic-periods.destroy')
            ->can('delete academic periods');
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
        if(config('app.env') == 'local') {
            Route::get('/', [EnrollmentController::class, 'create'])
                ->name('enrollment.create')
                ->can('create enrollment')
                ->middleware(['check.profile']);
        } else {
            Route::get('/', [EnrollmentController::class, 'create'])
                ->name('enrollment.create')
                ->can('create enrollment')
                ->middleware(['check.profile', 'active.enrollment']);
        }
        Route::post('/store', [EnrollmentController::class, 'store'])
            ->name('enrollment.store')
            ->can('create enrollment');
        Route::post('/signature', [EnrollmentController::class, 'signature'])
              ->can('create enrollment')
              ->name('enrollment.signature');
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
        Route::get('/export-student/{enrollment}', [EnrollmentController::class, 'exportStudent'])
            ->name('enrollments.export-student')
            ->can('view enrollments');
        Route::get('/attach-document/{enrollment}', [EnrollmentController::class, 'attachDocument'])
            ->name('enrollments.attach-document')
            ->can('view enrollments');
        Route::get('/download-document/{enrollment}/{field}', [EnrollmentController::class, 'downloadDocument'])
            ->name('enrollments.download-document')
            ->can('view enrollments');
    });
});
