<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;


class flaskApiController extends Controller
{    
     //Login
     public function fazerLogin(Request $request){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $email = $request->input('email');
        $password = $request->input('password');
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/farmacias/email/'. $email);
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
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('home', compact('response2','id_log'));
    }

    public function detalhesentrega($id){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas/'. $id2);
        $response2 = $response->json();
        return view('/detalhes', compact('response2'));
    }

    public function add_entrega(Request $request){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ]; 
        //Pega o Id do usuário logado.
        //$id_log = intval(getCookie_log()); 
        $response = Http::withHeaders($header)->post('http://127.0.0.1:8090/entregas',[
        //'id_cliente' => $id_log, //Passa o id do usuário logado exemplificado caso a empresa disponibilize o frontend para o cliente como um serviço extra. 
        //Sendo backend próprio, a farmácia em questão passa o próprio id como exemplificado abaixo(consequentemente, a linha 65 não precisaria existir):
        'id_cliente' => 1,
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
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas/'. $id2);
        $response2 = $response->json();
        return view('/editarEntrega', compact('response2'));
    }

    public function editar2($id, Request $request){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->put('http://127.0.0.1:8090/entregas/'. $id2,[
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
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->delete('http://127.0.0.1:8090/entregas/'. $id2);
        return redirect('/home');
    }

     public function listaAndamentos(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('andamento', compact('response2','id_log'));
    }

    public function listaEntregues(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('entregues', compact('response2','id_log'));
    }

    public function gerar_relatorio(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas/relatorio/'. 1);
        $responseArray = $response->json();

        $response2 = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas/relatorio');
        $responseArray2 = $response2->json();

        return view('relatorio', compact('responseArray', 'responseArray2'));
    }
}