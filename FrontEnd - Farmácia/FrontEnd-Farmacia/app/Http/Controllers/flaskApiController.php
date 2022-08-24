<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;


class flaskApiController extends Controller
{    
     //Login
     public function fazerLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $response = Http::get('http://127.0.0.1:8090/farmacias/email/'. $email);
        $log = $response->json();
        if($log == null){
            dd(1);
            return redirect('/');
        }
        if($log['active'] == false){
            dd(2);
            return redirect('/');
        }
        
        if($log['email'] == $email && $log['password'] == $password ){
            $id_log = intval($log['id']);
            setCookie_log($id_log);
            return redirect('/home');
        }else{
            return redirect('/');
        }
    }

    //Entregas solicitadas
    public function listaEntregas(){
        $id_log = intval(getCookie_log());
        $response = Http::get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('home', compact('response2','id_log'));
    }

    public function detalhesentrega($id){
        $id2 = intval($id);
        $response = Http::get('http://127.0.0.1:8090/entregas/'. $id2);
        $response2 = $response->json();
        return view('/detalhes', compact('response2'));
    }

    public function add_entrega(Request $request){
        $response = Http::post('http://127.0.0.1:8090/entregas',[
        'id_cliente' => 1, //Passa o id do usuário logado exemplificado
        'medicamento' => $request->input('medicamento'),
        'nome' => $request->input('nome'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cep' => $request->input('cep'),
        ]);
        return redirect('home');
    }

    public function editar($id){
        $id2 = intval($id);
        $response = Http::get('http://127.0.0.1:8090/entregas/'. $id2);
        $response2 = $response->json();
        return view('/editarEntrega', compact('response2'));
    }

    public function editar2($id, Request $request){
        $id2 = intval($id);
        $response = Http::put('http://127.0.0.1:8090/entregas/'. $id2,[
        'medicamento' => $request->input('medicamento'),
        'nome' => $request->input('nome'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cep' => $request->input('cep')
        ]);
        return redirect('/home');
    }

    public function removeentrega($id){
        $id2 = intval($id);
        $response = Http::delete('http://127.0.0.1:8090/entregas/'. $id2);
        return redirect('/home');
    }
}