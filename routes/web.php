<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Plans\PDIController;
use App\Http\Controllers\Admin\Plans\PDUController;
use App\Http\Controllers\Admin\Plans\PlanController;
use App\Http\Controllers\Admin\Plans\IndicatorController;
use App\Http\Controllers\Admin\Plans\ObjectiveController;
use App\Http\Controllers\Admin\Support\SectorController;
use App\Http\Controllers\Admin\Laboratories\LaboratoryController;

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

Route::prefix('admin')
    // ->middleware('auth')
    ->group(function () {

        //supports
        Route::resource('/unidade', SectorController::class);
        Route::any('/unidade/search', [SectorController::class, 'search'])->name('unidade.search');
//        Route::any('tema/search', [ThemeObjectiveController::class, 'search'])->name('tema.search');
//        Route::resource('tema', ThemeObjectiveController::class);
//        Route::any('tipo-plano/search', [TypeOfPlanController::class, 'search'])->name('tipo-plano.search');
//        Route::resource('tipo-plano', TypeOfPlanController::class);
//        Route::any('perspectiva/search', [PerspectivePdiPduController::class, 'search'])->name('perspectiva.search');
//        Route::resource('perspectiva', PerspectivePdiPduController::class);

        // Laboratorios
        Route::any('laboratorio/search', [LaboratoryController::class, 'search'])->name('laboratorio.search');
        Route::resource('laboratorio', LaboratoryController::class);

        //indicador
        Route::any('indicador/search', [IndicatorController::class, 'search'])->name('indicador.search');
        Route::resource('indicador', IndicatorController::class);

        // Objetivos x Indicadores
        Route::get('plano/objetivo/{id}', [ObjectiveController::class, 'showIndicators'])
            ->name('objetivo.indicador.show');
        Route::post('plano/objetivo/{id}/indicador/{idIndicator}/detach', [ObjectiveController::class, 'detachIndicatorObjective'])
            ->name('objetivo.indicador.detach');
        Route::post('plano/objetivo/{id}/indicadores', [ObjectiveController::class, 'attachIndicatorObjective'])
            ->name('objetivo.indicador.attach');

        //Rotas para PDU
        Route::any('pdu/search', [PDUController::class, 'search'])->name('pdu.search');
        Route::resource('pdu', PDUController::class);

        // Objetivos x Indicadores
        Route::get('indicador/{indicatorId}/edit/{objectiveId}', [IndicatorController::class, 'editByObjective'])->name('indicador.objetivo.edit');
        Route::get('indicador/{id}/create', [IndicatorController::class, 'createByObjective'])->name('indicador.objetivo.create');

        // PDI x Objetivos
        Route::get('objetivo/{objectiveId}/edit/{planId}', [ObjectiveController::class, 'editByPlan'])->name('objetivo.plano.edit');
        Route::get('objetivo/{id}/create', [ObjectiveController::class, 'createByPlan'])->name('objetivo.plano.create');

        //Rotas para Objetivos
        Route::any('plano/objetivo/search', [ObjectiveController::class, 'search'])
            ->name('objetivo.search');
        Route::resource('objetivo', ObjectiveController::class);

        //Rotas para PDI
        Route::any('pdi/search', [PDIController::class, 'search'])->name('pdi.search');
        Route::resource('pdi', PDIController::class);

//        //Setores da Ufopa
//        Route::any('setor/search', [SectorController::class, 'search'])->name('setor.search');
//        Route::resource('setor', SectorController::class);
    });


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Auth::routes();
