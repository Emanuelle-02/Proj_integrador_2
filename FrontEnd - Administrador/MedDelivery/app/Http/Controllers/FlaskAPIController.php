<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskAPIController extends Controller
{
    public function all_farmacias(){
        $response = Http::get('http://127.0.0.1:8090/farmacias');
        $responseArray = $response->json();
        return view('home', compact('responseArray'));
    }

    public function add_farmacias(Request $request){
        $dados = $request->all();
        $response = Http::post('http://127.0.0.1:8090/farmacias',[
        'nome_farmacia' => $request->input('nome_farmacia'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'cnpj' => $request->input('cnpj'),
        'telefone' => $request->input('telefone'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cidade' => $request->input('cidade')
        ]);
        return redirect('/home');
    }

    public function detalhesfarmacia($id){
        $id2 = intval($id);
        $response = Http::get('http://127.0.0.1:8090/farmacias/'. $id2);
        $responseArray = $response->json();
        return view('/detalhes', compact('responseArray'));
    }

    public function editarfarmacia($id){
        $id2 = intval($id);
        $response = Http::get('http://127.0.0.1:8090/farmacias/'. $id2);
        $responseArray = $response->json();
        return view('/editar_farmacia', compact('responseArray'));
    }

    public function editarfarmacia2($id, Request $request){
        $id2 = intval($id);
        $response = Http::put('http://127.0.0.1:8090/farmacias/'. $id2,[
        'nome_farmacia' => $request->input('nome_farmacia'),
        'email' => $request->input('email'),
        'cnpj' => $request->input('cnpj'),
        'telefone' => $request->input('telefone'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cidade' => $request->input('cidade')
        ]);
        
        return redirect('/home');
    }

    //Remove farmacia
    public function removefarmacia($id){
        $id2 = intval($id);
        $response = Http::delete('http://127.0.0.1:8090/farmacias/'. $id2);
        return redirect('/home');
    }


//ENTREGADORES
    public function all_entregadores(){
        $response = Http::get('http://127.0.0.1:8090/entregadores');
        $responseArray = $response->json();
        return view('entregadores', compact('responseArray'));
    }

    public function add_entregadores(Request $request){
        $dados = $request->all();
        $response = Http::post('http://127.0.0.1:8090/entregadores',[
        'nome' => $request->input('nome'),
        'cpf' => $request->input('cpf'),
        'email' => $request->input('email'),
        'senha' => $request->input('senha'),
        'telefone' => $request->input('telefone')
        ]);
        return redirect('/entregadores');
    }

    //editar entregador
    public function editentregadores($id){
        $id2 = intval($id);
        $response = Http::get('http://127.0.0.1:8090/entregadores/'. $id2);
        $responseArray = $response->json();
        return view('/edit_entregador', compact('responseArray'));
    }
    
    public function editentregadores2($id, Request $request){
        $id2 = intval($id);
        $response = Http::put('http://127.0.0.1:8090/entregadores/'. $id2,[
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone')
            ]);
            return redirect('/entregadores');
    }

    //Remove entregador
    public function removeentregadores($id){
        $id2 = intval($id);
        $response = Http::put('http://127.0.0.1:8090/entregadores/'. $id2,[
        'active' => False
        ]);
        return redirect('/entregadores');
    }
}