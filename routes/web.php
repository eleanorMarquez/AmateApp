<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ReservarCitaController;
use App\Http\Controllers\TestAnonimoController;

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

/************** ROUTES OF PUBLIC LANDING**************** */
/* Route::get('/', function () {
    return view('frontend.inicio');
}); */
//comandos
Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

Route::controller(FrontendController::class)
    ->group(function () {
        Route::get('/', 'inicio')->name('inicio');
        Route::get('/directorio', 'directorio')->name('directorios');
        Route::get('/contacto', 'contacto')->name('contacto');
        Route::post('/contacto/enviar', 'contacto_store')->name('contacto.enviar');
        Route::get('/noticias', 'noticias')->name('noticias');
        Route::get('/noticias/{id}', 'noticiashow')->name('noticiashow');
        Route::get('/eventos', 'eventos')->name('eventosindex');
        Route::get('/eventos/{id}', 'eventoshow')->name('eventoshow');
        Route::get('/test-anonimo', 'test_anonimo')->name('test_anonimo');
    });

Route::controller(TestAnonimoController::class)
    ->group(function () {
        Route::get('/test-anonimo/resultado/{author_ramdon}', 'resultado')->name('test_anonimo.resultado');
        Route::post('/test-anonimo/store', 'store')->name('test_anonimo.store');
    });
/************** END ROUTES OF PUBLIC LANDING**************** */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::controller(DashboardController::class)
        ->group(function () {
            Route::get('/inicio', 'index')->name('dashboard.index');
        });
    //ROUTES FOR MANAGEMENT USERS
    Route::controller(UserController::class)
        ->group(function () {
            Route::get('/usuarios', 'index')->name('usuarios.index');
            Route::get('/usuarios/obtener', 'getUsuarios')->name('usuarios.obtener');
            Route::get('/usuarios/crear', 'create')->name('usuarios.create');
            Route::get('/usuarios/edit/{id}', 'edit')->name('usuarios.edit');
            Route::get('/usuarios/destroy/{id}', 'destroy')->name('usuarios.destroy');
            Route::post('/usuarios/store', 'store')->name('usuarios.store');
            Route::post('/usuarios/status', 'status')->name('usuarios.status');
            Route::post('/usuarios/update', 'update')->name('usuarios.update');
            Route::post('/usuarios/update-profesional', 'update_profesional')->name('usuarios.update_profesional');

            //ROUTES FOR GET USERS OF ROLE USUARIO
            Route::get('/pacientes', 'pacientesindex')->name('pacientes.index');
            Route::get('/pacientes/obtener', 'getUsuarios2')->name('pacientes.obtener');
            Route::get('/pacientes/obtenerAnonimos', 'getUsuarios3')->name('pacientes.obtenerAnonimos');

            //GET PROFILE OF LOGIN USER
            Route::get('/perfil', 'profile')->name('usuario.perfil');

            //UPDATED OF USER PRESTADOR OF SERVICES
            Route::post('/perfil/actualizar-logo', 'updatedphoto')->name('prestador.updatedphoto');
            Route::post('/perfil/actualizar-informacion', 'updatedprestador')->name('prestador.updatedprestador');
        });

    //ROUTES FOR MANAGEMENT NEWS
    Route::controller(InformationController::class)
        ->group(function () {
            Route::get('/noticias-listado', 'index')->name('noticia.index');
            Route::get('/gestionar-noticias/crear', 'create')->name('noticia.create');
            Route::post('/noticias/store', 'store')->name('noticia.store');
            Route::get('/noticiass/obtener', 'getNews')->name('noticia.obtener');
            Route::get('/noticias/edit/{id}', 'edit')->name('noticia.edit');
            Route::post('/noticias/update', 'update')->name('noticia.update');
            Route::get('/noticias/destroy/{id}', 'destroy')->name('noticia.destroy');
        });

    //ROUTES FOR MANAGEMENT EVENTS
    Route::controller(EventController::class)
        ->group(function () {
            Route::get('/eventos-listado', 'index')->name('evento.index');
            Route::get('/gestionar-eventos/crear', 'create')->name('evento.create');
            Route::post('/eventos/store', 'store')->name('evento.store');
            Route::get('/eventoss/obtener', 'getEvents')->name('evento.obtener');
            Route::get('/eventos/edit/{id}', 'edit')->name('evento.edit');
            Route::post('/eventos/update', 'update')->name('evento.update');
            Route::get('/eventos/destroy/{id}', 'destroy')->name('evento.destroy');
        });

    //ROUTES FOR MANAGEMENT DIRECTORY
    Route::controller(DirectoryController::class)
        ->group(function () {
            Route::get('/directorio-listado', 'index')->name('directorio.index');
            Route::get('/directorio/crear', 'create')->name('directorio.create');
            Route::post('/directorio/store', 'store')->name('directorio.store');
            Route::get('/directorio/obtener', 'getDirectory')->name('directorio.obtener');
            Route::get('/directorio/edit/{id}', 'edit')->name('directorio.edit');
            Route::post('/directorio/update', 'update')->name('directorio.update');
            Route::get('/directorio/destroy/{id}', 'destroy')->name('directorio.destroy');
        });

    //ROUTES FOR MANAGEMENT QUESTIONS OF TEST
    Route::controller(QuestionController::class)
        ->group(function () {
            Route::get('/preguntas-test', 'index')->name('questions.index');
            Route::post('/preguntas-test/store', 'store')->name('questions.store');
            Route::get('/preguntas-test/edit/{id}', 'edit')->name('questions.edit');
            Route::get('/preguntas-test/obtener', 'getQuestions')->name('questions.obtener');
            Route::get('/preguntas-test/destroy/{id}', 'destroy')->name('questions.destroy');
            Route::post('/preguntas-test/update', 'update')->name('questions.update');
        });

    //ROUTES FOR MANAGEMENT OF TEST FOR USER
    Route::controller(TestController::class)
        ->group(function () {
            Route::get('/test-violentometro', 'index')->name('test.index');
            Route::get('/test-violentometro/resultado', 'resultado')->name('test.resultado');
            Route::post('/test-violentometro/store', 'store')->name('test.store');
            Route::get('/test/obtener', 'getQuestions')->name('test.obtener');

            //MOSTRAR DETAILS OF TEST TO PROFESSIONAL
            Route::get('/test-violentometro/detalles/{id}', 'detalles')->name('test.detalles');
            Route::get('/test-violentometro/download/{id}', 'downloadpdf')->name('test.downloadpdf');
        });

    //ROUTES FOR MANAGEMENT OF TEST FOR USER ANONIMO
    Route::controller(TestAnonimoController::class)
        ->group(function () {

            //MOSTRAR DETAILS OF TEST TO PROFESSIONAL
            Route::get('/testanonimo-violentometro/detalles/{author_ramdon}', 'detalles')->name('test_anonimo.detalles');
            Route::get('/testanonimo-violentometro/download/{author_ramdon}', 'downloadpdf')->name('test_anonimo.downloadpdf');
        });

    //ROUTES FOR MANAGEMENT OF CITATION IN PROFESSIONALS
    Route::controller(CitationController::class)
        ->group(function () {
            Route::get('/citas', 'index')->name('citation.index');
            Route::get('/citas-agendadas', 'agendadas')->name('citation.agendadas');
            Route::get('/citas-agendadas/listado', 'agendadaslistado')->name('citation.agendadaslistado');
            Route::get('/listado/citas', 'listcitations')->name('citation.listcitations');
            Route::post('/citas/store', 'store')->name('citation.store');
            Route::get('/citas/eliminardisponibilidad/{id}', 'destroy')->name('citation.destroy');

            //routes for role user-client
            Route::get('/agendar-cita', 'agendar')->name('citation.agendar');
        });
    //ROUTES FOR MANAGEMENT RESERVE CITATION
    Route::controller(ReservarCitaController::class)
        ->group(function () {
            Route::get('/mis-citas', 'index')->name('citareservadas.index');
            Route::get('/miscitas/listado', 'miscitas')->name('citareservadas.list');
            Route::get('/mis-citas/store/{id}', 'agendar')->name('reservarcita.store');
            Route::get('/mis-citas/cancelar/{id}', 'destroy')->name('reservarcita.destroy');
        });
});
