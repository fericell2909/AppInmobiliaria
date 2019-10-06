<?php

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
    return view('welcome');
});

Route::get('/miprimeraruta', function () {
    return view('miprimeraruta');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => 'auth'], function () {
    
    // Definiendo una ruta de reporte 

    Route::get('/Reportes/ReportedeUsuarios', 'ReporteController@verreporteusuario')->name('ReportedeUsuarios');

    Route::get('/Reportes/rptusuarios/{id}', 'ReporteController@rptusuarios');
    
    //

    // Definiendo nuestra Ruta para Reporte de Ubicaciones Simple.

        Route::get('/Reportes/ReportedeUbicaciones', 'ReporteController@verreporteubicacion')->name('ReportedeUbicaciones');
    
        Route::get('/Reportes/rptubicaciones/{id}', 'ReporteController@rptubicaciones');
    //




    Route::get('/ubicaciones', 'UbicacionController@gestionarubicaciones')->name('ubicaciones');

        Route::post('/ubicacion/registrar', 'UbicacionController@registrarubicaciones')->name('ubicacion/registrar');
        
        Route::post('/ubicacion/editarguardar', 'UbicacionController@editarguardar')->name('ubicacion/editarguardar');


        // EJemplo BootGRid Basico

        Route::get('/UsuariosListar', 'UsersController@UsuariosListar')->name('UsuariosListar');

        Route::get('/MonedasListar', 'MonedaController@MonedasListar')->name('MonedasListar');


        Route::get('/UbicacionesListar', 'UbicacionController@UbicacionesListar')->name('UbicacionesListar');

        Route::get('/UbicacionesBusqueda', 'UbicacionController@UbicacionesBusqueda')->name('UbicacionesBusqueda');
        
        Route::post('/ubicacion/consultabusqueda', 'UbicacionController@consultabusqueda')->name('ubicacion/consultabusqueda');
        

        Route::get('/Ubicaciones/Ver/{id}', 'UbicacionController@UbicacionesVer')->name('UbicacionesVer');
        
        Route::get('/Ubicaciones/Editar/{id}', 'UbicacionController@UbicacionesEditar')->name('UbicacionesEditar');
        
        Route::get('/Ubicaciones/Imprimir/{id}', 'UbicacionController@UbicacionesImprimir')->name('UbicacionesImprimir');

        Route::post('/Ubicaciones/Listar', 'UbicacionController@UbicacionesMostrarRegistros');

        Route::post('Zona/Listar_Provincias_x_Departamento/{id}',['as' => 'Zona/Listar_Provincias_x_Departamento', 'uses' => 'ZonaController@Listar_Provincias_x_Departamento']);

        Route::post('Zona/Listar_Distritos_x_Provincia/{id}',['as' => 'Zona/Listar_Distritos_x_Provincia', 'uses' => 'ZonaController@Listar_Distritos_x_Provincia']);

        Route::post('Estilos/Listar_Estilos_x_Tipo/{id}',['as' => 'Estilos/Listar_Estilos_x_Tipo', 'uses' => 'UbicacionController@Listar_Estilos_x_Tipo']);   

        Route::post('Ubicaciones/Zona/Listar_Provincias_x_Departamento/{id}',['as' => 'Zona/Listar_Provincias_x_Departamento', 'uses' => 'ZonaController@Listar_Provincias_x_Departamento']);

        Route::post('Ubicaciones/Zona/Listar_Distritos_x_Provincia/{id}',['as' => 'Zona/Listar_Distritos_x_Provincia', 'uses' => 'ZonaController@Listar_Distritos_x_Provincia']);

        Route::post('Ubicaciones/Estilos/Listar_Estilos_x_Tipo/{id}',['as' => 'Estilos/Listar_Estilos_x_Tipo', 'uses' => 'UbicacionController@Listar_Estilos_x_Tipo']);

         Route::get('Ubicaciones/ImpresionUbicacion/{id}', 'UbicacionController@ImpresionUbicacion');


         # Mantenedores.
        Route::get('/NivelInstitucion', 'NivelInstitucionController@Listar')->name('nivelinstitucion');
        Route::get('/NivelInstitucion/Editar/{id}', 'NivelInstitucionController@Editar')->name('nivelinstitucioneditar');
        Route::get('/NivelInstitucion/Nuevo', 'NivelInstitucionController@Nuevo')->name('nivelinstitucionnuevo');
        Route::post('/NivelInstitucion/Listar', 'NivelInstitucionController@NivelInstitucionMostrarRegistros');
        Route::post('/NivelInstitucion/guardar', 'NivelInstitucionController@guardar')->name('nivelinstitucionguardar');


        Route::get('/CaracteristicaInstitucion', 'CaracteristicaInstitucionController@Listar')->name('caracteristicainstitucion');
        Route::get('/CaracteristicaInstitucion/Editar/{id}', 'CaracteristicaInstitucionController@Editar')->name('caracteristicainstitucioneditar');
        Route::get('/CaracteristicaInstitucion/Nuevo', 'CaracteristicaInstitucionController@Nuevo')->name('caracteristicainstitucionnuevo');
        Route::post('/CaracteristicaInstitucion/Listar', 'CaracteristicaInstitucionController@CaracteristicaInstitucionMostrarRegistros');
        Route::post('/CaracteristicaInstitucion/guardar', 'CaracteristicaInstitucionController@guardar')->name('caracteristicainstitucionguardar');
	
	
		Route::get('/ModalidadInstitucion', 'ModalidadInstitucionController@Listar')->name('modalidadinstitucion');
		Route::get('/ModalidadInstitucion/Editar/{id}', 'ModalidadInstitucionController@Editar')->name('modalidadinstitucioneditar');
		Route::get('/ModalidadInstitucion/Nuevo', 'ModalidadInstitucionController@Nuevo')->name('modalidadinstitucionnuevo');
		Route::post('/ModalidadInstitucion/Listar', 'ModalidadInstitucionController@ModalidadInstitucionMostrarRegistros');
		Route::post('/ModalidadInstitucion/guardar', 'ModalidadInstitucionController@guardar')->name('modalidadinstitucionguardar');
	
	
		Route::get('/AliadoEstrategico', 'AliadoEstrategicoController@Listar')->name('aliadoestrategico');
		Route::get('/AliadoEstrategico/Editar/{id}', 'AliadoEstrategicoController@Editar')->name('aliadoestrategicoeditar');
		Route::get('/AliadoEstrategico/Nuevo', 'AliadoEstrategicoController@Nuevo')->name('aliadoestrategiconuevo');
		Route::post('/AliadoEstrategico/Listar', 'AliadoEstrategicoController@AliadoEstrategicoMostrarRegistros');
		Route::post('/AliadoEstrategico/guardar', 'AliadoEstrategicoController@guardar')->name('aliadoestrategicoguardar');
	
		Route::get('/CondicionLaboral', 'CondicionLaboralController@Listar')->name('condicionlaboral');
		Route::get('/CondicionLaboral/Editar/{id}', 'CondicionLaboralController@Editar')->name('condicionlaboraleditar');
		Route::get('/CondicionLaboral/Nuevo', 'CondicionLaboralController@Nuevo')->name('condicionlaboralnuevo');
		Route::post('/CondicionLaboral/Listar', 'CondicionLaboralController@CondicionLaboralMostrarRegistros');
		Route::post('/CondicionLaboral/guardar', 'CondicionLaboralController@guardar')->name('condicionlaboralguardar');
	
		
		Route::get('/Usuarios', 'UsersController@Listar')->name('musuarios');
		Route::get('/Usuarios/Editar/{id}', 'UsersController@Editar')->name('musuarioseditar');
		Route::get('/Usuarios/EditarClave/{id}', 'UsersController@EditarClave')->name('musuarioseditarclave');
		Route::get('/Usuarios/Nuevo', 'UsersController@Nuevo')->name('musuariosnuevo');
		Route::post('/Usuarios/Listar', 'UsersController@UserMostrarRegistros');
		Route::post('/Usuarios/guardar', 'UsersController@guardar')->name('musuariosguardar');
		Route::post('/Usuarios/guardarclave', 'UsersController@guardarclave')->name('musuariosguardarclave');
		
        Route::get('/Preguntas', 'PreguntasController@Listar')->name('preguntas');
        Route::get('/Preguntas/Editar/{id}', 'PreguntasController@Editar')->name('preguntaseditar');
        Route::get('/Preguntas/Nuevo', 'PreguntasController@Nuevo')->name('preguntasnuevo');
        Route::post('/Preguntas/Listar', 'PreguntasController@PreguntasMostrarRegistros');
        Route::post('/Preguntas/guardar', 'PreguntasController@guardar')->name('preguntasguardar');
        
        
		Route::post('/PreguntasOpciones/Listar/{id}', 'PreguntaOpcionesController@PreguntasOpcionesMostrarRegistros');
		Route::post('/PreguntasOpciones/Mantenimiento', 'PreguntaOpcionesController@Mantenimiento');
	
		Route::get('/Productos', 'ProductoController@Listar')->name('productos');
		Route::get('/Productos/Editar/{id}', 'ProductoController@Editar')->name('productoseditar');
		Route::get('/Productos/Nuevo', 'ProductoController@Nuevo')->name('productosnuevo');
		Route::post('/Productos/Listar', 'ProductoController@ProductoMostrarRegistros');
		Route::post('/Productos/guardar', 'ProductoController@guardar')->name('productosguardar');
	
		Route::get('/Actividades', 'ActividadController@Listar')->name('actividades');
		Route::get('/Actividades/Editar/{id}', 'ActividadController@Editar')->name('actividadeseditar');
		Route::get('/Actividades/Nuevo', 'ActividadController@Nuevo')->name('actividadesnuevo');
		Route::post('/Actividades/Listar', 'ActividadController@ActividadMostrarRegistros');
		Route::post('/Actividades/guardar', 'ActividadController@guardar')->name('actividadesguardar');
	
		
		Route::get('/CodigosFases', 'CodigoFaseController@Listar')->name('codigosfases');
		Route::get('/CodigosFases/Editar/{id}', 'CodigoFaseController@Editar')->name('codigosfaseseditar');
		Route::get('/CodigosFases/Nuevo', 'CodigoFaseController@Nuevo')->name('codigosfasesnuevo');
		Route::post('/CodigosFases/Listar', 'CodigoFaseController@CodigoFaseMostrarRegistros');
		Route::post('/CodigosFases/guardar', 'CodigoFaseController@guardar')->name('codigosfasesguardar');
	
	
		Route::get('/Fases', 'FaseController@Listar')->name('fases');
		Route::get('/Fases/Editar/{id}', 'FaseController@Editar')->name('faseseditar');
		Route::get('/Fases/Nuevo', 'FaseController@Nuevo')->name('fasesnuevo');
		Route::post('/Fases/Listar', 'FaseController@FaseMostrarRegistros');
		Route::post('/Fases/guardar', 'FaseController@guardar')->name('fasesguardar');
	
		Route::post('/FasesPreguntas/Listar/{id}', 'FasePreguntaController@FasePreguntaMostrarRegistros');
		Route::post('/FasesPreguntas/Mantenimiento', 'FasePreguntaController@Mantenimiento');
	
	
		Route::get('/ModeloEncuestas', 'ModeloEncuestaController@Listar')->name('modeloencuestas');
		Route::get('/ModeloEncuestas/Editar/{id}', 'ModeloEncuestaController@Editar')->name('actividadeseditar');
		#Route::get('/ModeloEncuestas/Nuevo', 'ActividadController@Nuevo')->name('actividadesnuevo');
		Route::post('/ModeloEncuestas/Listar', 'ModeloEncuestaController@ModeloEncuestaMostrarRegistros');
		#Route::post('/ModeloEncuestas/guardar', 'ActividadController@guardar')->name('actividadesguardar');
	
});
