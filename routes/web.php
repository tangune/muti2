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



Auth::routes();

Route::get('/', function(){
 return view('welcome');
});

Route::group(['middleware'=>['web','auth']], function(){

	//administrador

	Route::get('/admin', 'admin_tela_principalController@create')->name('admin');
	Route::get('/cidade', 'CidadeController@create')->name('cidade');
	Route::get('/bairro', 'bairroController@create')->name('bairro');
	Route::get('/quarteirao', 'quarteiraoController@create')->name('quarteirao');
	Route::get('/designacao', 'DesignacaoController@create')->name('designacao');
    Route::get('/estado', 'EstadoController@create')->name('estado');
	Route::get('/comissao', 'comissaoController@create')->name('comissao');
	Route::get('/lista_bairro', 'bairroController@index')->name('lista_bairro');
    Route::get('/lista_usuario', 'UserController@index')->name('lista_usuario');
    Route::get('/administradores', 'UserController@administrador')->name('administradores');
	Route::get('/lista_quarteirao', 'quarteiraoController@index')->name('lista_quarteirao');
	Route::get('/lista_comissao', 'comissaoController@index')->name('lista_comissao');
    Route::get('/lista_apartamento', 'ApartamentoController@index')->name('lista_apartamento');
    Route::get('/pesquisaApartamento', 'ApartamentoController@pesquisarApartamento')->name('pesquisaApartamento');

    //editar
    //Route::get('/editarBairro/{id}', 'bairroController@edit')->name('bairroBairro');
    //Route::put('/updateBairro/{id}', 'bairroController@update')->name('updateBairro');
    Route::get('/modal_editarBairro/{id}', 'bairroController@modal_edit')->name('modal_editarBairro');
    Route::put('/modal_updateBairro', 'bairroController@modal_update')->name('modal_updateBairro');
    Route::get('/editarUsuario/{id}', 'UserController@edit')->name('editarUsuario');
    Route::put('/updateUser', 'UserController@update')->name('updateUser');
    //Route::put('/updateUser/{id}', 'UserController@update')->name('updateUser');
    Route::get('/admin_reservas', 'admin_tela_principalController@listarReservas')->name('admin_reservas');
    Route::get('/admin_pesquisar_reservas', 'admin_tela_principalController@pesquisarReservas')->name('admin_pesquisar_reservas');
    Route::get('/admin_arrendamento', 'admin_tela_principalController@listarArrendamentos')->name('admin_arrendamento');


	Route::get('/note', 'NoteController@index')->name('note');


	//gravar

	Route::post('/gravarBairro', 'BairroController@store')->name('gravarBairro');
	Route::post('/gravarCidade', 'CidadeController@store')->name('gravarCidade');
	Route::post('/gravarQuarteirao', 'QuarteiraoController@store')->name('gravarQuarteirao');
	Route::post('/gravarDesignacao', 'DesignacaoController@store')->name('gravarDesignacao');
	Route::post('/gravarComissao', 'ComissaoController@store')->name('gravarComissao');
    Route::post('/gravarEstado', 'EstadoController@store')->name('gravarEstado');

	//comissao
	Route::get('/proprietario', 'ProprietarioController@create')->name('proprietario');
	Route::get('/apartamento', 'ApartamentoController@create')->name('apartamento');
   // Route::get('/apartamento_comissao', 'ApartamentoController@create')->name('apartamento_comissao');
	//Route::get('/casa_comissao', 'CasaController@create')->name('casa_comissao');
    Route::get('/casa', 'CasaController@create')->name('casa');
	Route::get('/detalhe', 'DetalheController@create')->name('detalhe');
	Route::get('/agente', 'AgenteController@create')->name('agente');
	Route::get('/lista_casa', 'CasaController@index')->name('lista_casa');
	Route::get('/lista_agente', 'agenteController@index')->name('lista_agente');
	Route::get('/dashboard', 'NoteController@dashboard')->name('dashboard');
    Route::get('/listar', 'CasaController@listar')->name('listar');
    Route::get('/comissaoListar', 'CasaController@comissaoListar')->name('comissaoListar');
    Route::get('/comissao_pesquisaCasa', 'CasaController@pesquisar')->name('comissao_pesquisaCasa');
    Route::get('/comissao1_pesquisaCasa', 'CasaController@comissaoPesquisar')->name('comissao1_pesquisaCasa');
    Route::get('/comissao1_casa_pesquisa', 'CasaController@pesquisarCasa')->name('comissao1_casa_pesquisa');
    Route::get('/reservas', 'ReservaController@listarReservas')->name('reservas');
    Route::get('/pesquisa_reservas', 'ReservaController@pesquisarReservas')->name('pesquisa_reservas');
    Route::get('/reservas_comissoes', 'ReservaController@ReservasComissoes')->name('reservas_comissoes');
    Route::get('/mensagem', 'ReservaController@index')->name('mensagem');

    Route::get('/modal_reservas', 'ReservaController@modal_listarReservas')->name('modal_reservas');

    //Enviar Mensagem
    Route::post('/enviarMensagem', 'MessageController@mensagem')->name('enviarMensagem');
    Route::get('/mensagem/{id}', 'ReservaController@editmensagem')->name('mensagem');

    Route::post('/sms', 'SmsController@enviarSms')->name('enviarMensagem');

    // Enviar Email
    Route::get('/enviarEmail', 'EmailController@index')->name('enviarEmail');
    Route::post('/enviarEmail/enviar', 'EmailController@enviar')->name('enviarEmail/enviar');
    Route::get('/gravarEmail', 'EmailController@store')->name('gravarEmail');


	//gravar
	Route::post('/gravarAgente', 'AgenteController@store')->name('gravarAgente');
	Route::post('/gravarProprietario', 'ProprietarioController@store')->name('gravarProprietario');
	Route::post('/gravarCasa', 'CasaController@store')->name('gravarCasa');
	Route::post('/gravarApartamento', 'ApartamentoController@store')->name('gravarApartamento');
	Route::post('/gravarDetalhe', 'DetalheController@store')->name('gravarDetalhe');

    Route::get('/editarReserva/{id}', 'ReservaController@editReserva')->name('bairroReserva');
   // Route::put('/updateReserva/{id}', 'ReservaController@update')->name('updateReserva');
    Route::get('/editarProprietario/{id}', 'ProprietarioController@edit')->name('editarProprietario');
    Route::put('/updateProprietario', 'ProprietarioController@update')->name('updateProprietario');


    // telas modal
    Route::get('/actualizar/{id}', 'CasaController@actualizar')->name('actualizar');
    Route::get('/actualizarApartamento/{id}', 'ApartamentoController@actualizar')->name('actualizarApartamento'); //modal
    Route::put('/updateApartamentoPreco', 'ApartamentoController@update')->name('updateApartamentoPreco');
    Route::get('/actualizarReserva/{id}', 'ReservaController@actualizar')->name('actualizarReserva');
    Route::put('/updateReserva', 'ReservaController@update')->name('updateReserva');


    //cliente
	// Route::get('/cliente', 'ClienteController@index')->name('cliente');
	// Route::get('/home', 'ClienteController@index')->name('cliente');
	Route::get('/cliente_lista_apartamento', 'clienteController@index')->name('cliente_lista_apartamento');
	Route::get('/detalhes/{id}', 'ClienteController@detalhes')->name('detalhes');
    Route::get('/detalhesAgente/{id}', 'ClienteController@detalhesAgente')->name('detalhesAgente');
    Route::get('/reservar_modal/{id}', 'ClienteController@reservar')->name('reservar_modal');
	Route::get('/pesquisaCasa', 'clienteController@pesquisarCasa')->name('pesquisaCasa');
    //Route::get('/reservar/{idapartamento}', 'ReservaController@prepararReserva')->name('reservar');
    Route::get('/reserva_feita', 'ReservaController@reservaFeita')->name('reserva_feita');
    Route::put('/gravarReserva', 'ReservaController@store')->name('gravarReserva');
    Route::get('/expediente', 'ReservaController@expediente')->name('expediente');
    Route::get('/experiencia_expediente', 'ReservaController@experiencia_expediente')->name('experiencia_expediente');
    //Route::get('/expediente_confirmado', 'ReservaController@expedienteConfirmado')->name('expediente_confirmado');

    Route::get('/modal_reserva','ReservaController@indexModal')->name('modal_reserva');




// Route::get('/home', function(){
// 	if (Auth::user()->admin == 0) {
// 		//return view('read.cliente');
// 		return view('cliente.tela_cliente');
// 	}if(Auth::user()->admin == 2){
//         //return view('comissao.tela_comissao');
// 		return view('read.comissao');
// 	}else{
// 		$users['users'] = App\User::all();
// 		//return view('administrador.tela_admin', $users);
// 		return view('read.administrador', $users);
// 	}
// });
	Route::get('/home', function(){
	if (Auth::user()->admin == 0) {
		//return view('read.cliente');
		return redirect()->action('clienteController@index');
		// return view('cliente.tela_cliente');
	}if(Auth::user()->admin == 2){
        //return view('comissao.tela_comissao');
		return view('read.comissao');
	}if(Auth::user()->admin == 3){
        //return view('comissao.tela_comissao');
        return view('read.comissoes');
    }else{
		$users['users'] = App\User::all();
		//return view('administrador.tela_admin', $users);
		return view('read.administrador', $users);
	}
});

});

//administrador

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/administrador', 'administradorController@index')->name('administrador');


// template AdminLte




Route::get('/imagem', 'ImagemController@create')->name('imagem');
Route::post('/gravarImagem', 'ImagemController@store')->name('gravarImagem');

