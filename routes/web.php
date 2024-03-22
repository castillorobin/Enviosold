<?php

use Illuminate\Support\Facades\Route;
//agregue controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RecolectaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\EstatusController;

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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/facturasfiltro/{comercio}', [App\Http\Controllers\FacturacionController::class, 'filtro'])->name('facturasfiltro');
 
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('recolecta', RecolectaController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('repartidores', RepartidorController::class);
    Route::resource('vendedores', VendedorController::class);
    Route::resource('facturas', FacturacionController::class);
    Route::resource('estatus', EstatusController::class);
    
}); 
Route::group(['middleware' => ['auth']], function() {
Route::get('pedido/desdeenvio', [App\Http\Controllers\PedidoController::class, 'desdeenvio'] )->name('desdeenvio') ;
Route::get('pedido/comerperso', [App\Http\Controllers\PedidoController::class, 'comerperso'] )->name('comerperso') ;
Route::get('pedido/comerpfijo', [App\Http\Controllers\PedidoController::class, 'comerpfijo'] )->name('comerpfijo') ;
Route::get('pedido/comercasi', [App\Http\Controllers\PedidoController::class, 'comercasi'] )->name('comercasi') ;

Route::get('pedido/editando/{id}', [App\Http\Controllers\PedidoController::class, 'editando'] )->name('editando') ;
Route::get('pedido/editarlo/{id}', [App\Http\Controllers\PedidoController::class, 'editarlo'] )->name('editarlo') ;
Route::get('pedido/crearp', [App\Http\Controllers\PedidoController::class, 'crearp'] )->name('crearp') ;
Route::get('pedido/crearpf', [App\Http\Controllers\PedidoController::class, 'crearpf'] )->name('crearpf') ;
Route::get('pedido/crearcas', [App\Http\Controllers\PedidoController::class, 'crearcas'] )->name('crearcas') ;

Route::get('comercio/filtrado/{id}', [App\Http\Controllers\VendedorController::class, 'filtrado'] )->name('filtrado') ;
Route::get('comercio/listado', [App\Http\Controllers\VendedorController::class, 'comercios'] )->name('comercios') ;

Route::get('pedido/indexfiltro/{id}', [App\Http\Controllers\PedidoController::class, 'indexfiltro'] )->name('indexfiltro') ;

Route::get('pedido/indexdigitadofiltro/{id}', [App\Http\Controllers\PedidoController::class, 'indexdigitadofiltro'] )->name('indexdigitadofiltro') ;
Route::get('pedido/indexdigitado/', [App\Http\Controllers\PedidoController::class, 'indexdigitado'] )->name('indexdigitado') ;

Route::get('comercio/guardar', [App\Http\Controllers\VendedorController::class, 'guardar'] )->name('guardar') ;

Route::get('factura/facturapdf/{pedidos}', [App\Http\Controllers\FacturacionController::class, 'facturapdf'] )->name('pedido.facturapdf') ;
Route::get('factura/listado', [App\Http\Controllers\FacturacionController::class, 'listado'] )->name('factura.listado') ;
Route::get('factura/listadofiltro/{comercio}', [App\Http\Controllers\FacturacionController::class, 'listadofiltro'] )->name('factura.listadofiltro') ;

Route::get('factura/listadopagos', [App\Http\Controllers\FacturacionController::class, 'listadopagos'] )->name('factura.listadopagos') ;
Route::get('factura/listadopagosfiltro/', [App\Http\Controllers\FacturacionController::class, 'listadopagosfiltro'] )->name('factura.listadopagosfiltro') ;
Route::get('factura/detalles/{id}', [App\Http\Controllers\FacturacionController::class, 'detalles'] )->name('factura.detalles') ;

Route::get('estado/estadomanual', [App\Http\Controllers\EstatusController::class, 'emanual'] )->name('estado.emanual') ;
Route::get('estado/manualfiltro', [App\Http\Controllers\EstatusController::class, 'manualfiltro'] )->name('estado.manualfiltro') ;
Route::get('estado/cestadomanual/', [App\Http\Controllers\EstatusController::class, 'cestadomanual'] )->name('estado.cestadomanual') ;
 
Route::get('estado/estadolote', [App\Http\Controllers\EstatusController::class, 'elote'] )->name('estado.elote') ;
Route::get('estado/lotefiltro', [App\Http\Controllers\EstatusController::class, 'lotefiltro'] )->name('estado.lotefiltro');
Route::get('estado/cestadolote', [App\Http\Controllers\EstatusController::class, 'cestadolote'] )->name('estado.cestadolote') ;


Route::get('pedidos/etiqueta/{id}', [App\Http\Controllers\PedidoController::class, 'etiqueta'] )->name('pedido.etiqueta') ; 
Route::get('pedidos/imprimire', [App\Http\Controllers\PedidoController::class, 'imprimire'] )->name('imprimire'); 

Route::get('pedido/estado', [App\Http\Controllers\PedidoController::class, 'estado'] )->name('estado') ;
Route::get('pedido/cestado', [App\Http\Controllers\PedidoController::class, 'cestado'] )->name('cestado') ;

Route::get('pedido/listaestatus', [App\Http\Controllers\EstatusController::class, 'listaestatus'] )->name('listaestatus') ;
Route::get('pedido/cambiando', [App\Http\Controllers\EstatusController::class, 'cambiando'] )->name('cambiando') ;
 
Route::get('pedido/verpedido/{id}', [App\Http\Controllers\PedidoController::class, 'verpedido'] )->name('verpedido') ;

Route::get('reportes', [App\Http\Controllers\PedidoController::class, 'reporte'] )->name('reporte')->middleware('auth') ;
Route::get('reportes/envio', [App\Http\Controllers\PedidoController::class, 'reporteenvio'] )->name('reporteenvio') ;
Route::get('reportes/ganancia', [App\Http\Controllers\PedidoController::class, 'reporteganancia'] )->name('reporteganancia') ;
Route::get('reportes/cobros', [App\Http\Controllers\PedidoController::class, 'reportecobros'] )->name('reportecobros') ;
Route::get('reportes/enviofiltro', [App\Http\Controllers\PedidoController::class, 'reporteenviof'] )->name('reporteenviof') ;
Route::get('reportes/gananfiltro', [App\Http\Controllers\PedidoController::class, 'reportegananciaff'] )->name('reportegananciaff') ;
Route::get('reportes/cobrofiltro', [App\Http\Controllers\PedidoController::class, 'reportecobrof'] )->name('reportecobrof') ;

Route::get('reportes/repobodega', [App\Http\Controllers\PedidoController::class, 'repobodega'] )->name('repobodega') ;
Route::get('reportes/repofiltrobodega', [App\Http\Controllers\PedidoController::class, 'repofiltrobodega'] )->name('repofiltrobodega')->middleware('auth') ;
Route::get('reportes/cambiarbodega', [App\Http\Controllers\PedidoController::class, 'cambiarbodega'] )->name('cambiarbodega') ;

Route::get('reportes/repobodegafecha', [App\Http\Controllers\PedidoController::class, 'repobodegafecha'] )->name('repobodegafecha') ;
Route::get('reportes/repofiltrobodegafecha', [App\Http\Controllers\PedidoController::class, 'repofiltrobodegafecha'] )->name('repofiltrobodegafecha') ;



Route::get('descargar-respaldo', [App\Http\Controllers\PedidoController::class, 'descargarRespaldo'] )->name('descargarRespaldo') ; 

Route::get('repofiltro', [App\Http\Controllers\PedidoController::class, 'repofiltro'] )->name('repofiltro') ;

Route::get('printfiltro/{filtro}/{ftipo}', [App\Http\Controllers\PedidoController::class, 'printfiltro'] )->name('printfiltro') ;

Route::get('pedido/editrepa', [App\Http\Controllers\PedidoController::class, 'editrepa'] )->name('editrepa') ;

Route::get('pedido/camara', [App\Http\Controllers\PedidoController::class, 'camara'] )->name('camara') ;

Route::get('estatus/agregar', [App\Http\Controllers\EstatusController::class, 'agregar'] )->name('agregar') ;

}); 