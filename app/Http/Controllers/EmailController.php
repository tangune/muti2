<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\EnviarEmail;
use App\User;
use App\Email;


class EmailController extends Controller
{
     function index(){

         $usuarios = User::all();
         $emeiles = Email::all();
        return view('comissao.tela_email', compact('usuarios','emeiles'));
    }



    public function store(Request $request)
    {
        $emai = new Email;
        $emai->nome = Input::get('nome');
       // $emai = $request->input('email');
        dd($emai);

    }

    function enviar(Request $request){

         $m = new Email;


         $nome = $request->input('nome');
         $email = $request->input('email');
         $mensagem = $request->input('message');

         $m->nome = $nome;
         $m->email = $email;
         $m->mensagem = $mensagem;






         $this->validate($request, [
             'nome'      =>  'required',
             'email'     =>  'required|email',
             'message'   =>  'required'

         ]);



         $data = array(
             'nome'      => $request->nome,
             'email'     =>$request->email,
             'message'   => $request->message

         );

         Mail::to($email)->send(new EnviarEmail($data));
         $m->save();

         return back()->with('sucesso','O email foi enviado com sucesso!');



    }


}
