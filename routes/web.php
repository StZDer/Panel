<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutImgController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyImgController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabImgController;
use App\Http\Controllers\NewsImgController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\panel\PanelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RotaController;
use App\Http\Controllers\RotaImgController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('panel.welcome');
});
Route::prefix('panel')->name('panel.')->group(
    function () {
        Route::get('/', function () {
            return view('panel.home');
        })->name('home');

        Route::get('/news', [PanelController::class, 'news'])->name('news.index');

        Route::get('/lab', [PanelController::class, 'lab'])->name('lab.index');

        Route::get('/lab/{id}/desc', [PanelController::class, 'labdesc'])->name('lab.desc');

        Route::get('/about', [PanelController::class, 'about'])->name('about.index');

        Route::get('/rotas', [PanelController::class, 'rotas'])->name('rotas.index');

        Route::get('/rota/{id}/desc', [PanelController::class, 'rotadesc'])->name('rota.desc');
    }
);
Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::resources([
            'news' => NewsController::class,
            'newsImg' => NewsImgController::class,
            'lab' => LabController::class,
            'labImg' => LabImgController::class,
            'about' => AboutController::class,
            'aboutImg' => AboutImgController::class,
            'rota' => RotaController::class,
            'rotaImg' => RotaImgController::class,
            'role' => RoleController::class,
        ]);
    }
);
Auth::routes();

Route::get('/auth', function () {
    return view('admin.auth');
})->name('admin.auth');
