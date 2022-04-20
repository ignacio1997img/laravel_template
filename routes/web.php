<?php

use App\Http\Controllers\AdditionalController;

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

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return redirect('admin');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::resource('additional_services', AdditionalController::class);

    Route::get('additional_services/view/inspeccion/{id?}', [AdditionalController::class, 'view_inspeccion'])->name('view.inspeccion');
    Route::post('additional_services/store/inspeccion', [AdditionalController::class, 'store_inspeccion'])->name('store.inspeccion');

    Route::get('additional_services/view/costo/{id?}', [AdditionalController::class, 'view_costo'])->name('view.costo');
    Route::post('additional_services/store/costo', [AdditionalController::class, 'store_costo'])->name('store.costo');

    Route::get('additional_services/view/programacion/{id?}', [AdditionalController::class, 'view_programacion'])->name('view.programacion');
    Route::post('additional_services/store/programacion', [AdditionalController::class, 'store_programacion'])->name('store.programacion');


    Route::get('additional_services/view/success/{id?}', [AdditionalController::class, 'view_success'])->name('view.success');





    
    // Route::post('usuarios/desactivar', [UserController::class, 'desactivar'])->name('almacen_desactivar');
    // Route::post('usuarios/activar', [UserController::class, 'activar'])->name('almacen_activar');

    
    // //........................  INCOME
    // Route::resource('income', IncomeController::class);
    // Route::get('incomes/browse/view/{id?}', [IncomeController::class, 'view_ingreso'])->name('income_view');
    // Route::get('incomes/browse/view/stock/{id?}', [IncomeController::class, 'view_ingreso_stock'])->name('income_view_stock');
    // Route::delete('incomes/browse/delete', [IncomeController::class, 'destroy'])->name('income_delete');

    // Route::post('incomes/update', [IncomeController::class, 'update'])->name('income_update');

});

// Clear cache
Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin/profile')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');
