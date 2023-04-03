<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\ContactIconController;
use App\Http\Controllers\FrontPages\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\MainServiceController;
use App\Http\Controllers\MethodologyController;
use App\Http\Controllers\MethodologyDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjTypeController;
use App\Http\Controllers\ProspectDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Models\Project;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/back', function () {
            return view('welcome');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        /*** In Case of AccessDashboard Middleware */
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified', 'AccessDash'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::get('test', function () {
            return 'You Are Not Allowed';
        });

        Route::get('/', [FrontController::class, 'front']);
        Route::get('/about', [FrontController::class, 'about']);
        Route::get('/services', [FrontController::class, 'service']);
        Route::get('/proj', [FrontController::class, 'project']);
        Route::get('/projectDetail/{myprojectid}', [FrontController::class, 'projectDetail'])->name('projectDetail.projectDetail');
        Route::post('/{id?}', [FrontController::class, 'store'])->name('front.store');

        Route::resources([
            // 'category' => CategoryController::class,
            // 'product' => ProductController::class,
            'About' => AboutController::class,
            'Gallery' => GalleryController::class,
            'HomeSlider' => HomeSliderController::class,
            'user' => UserController::class,
            'skill' => SkillController::class,
            'competency' => CompetencyController::class,
            'academic' => AcademicController::class,
            'service' => ServiceController::class,
            'mainService' => MainServiceController::class,
            'contactDetail' => ContactDetailController::class,
            'contactIcon' => ContactIconController::class,
            'prospectDetail' => ProspectDetailController::class,
            'methodology' => MethodologyController::class,
            'methodologyDetail' => MethodologyDetailController::class,
            'project' => ProjectController::class,
            'projType' => ProjTypeController::class,
        ]);
    }
);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
