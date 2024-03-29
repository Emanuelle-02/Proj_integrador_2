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
        $senha = $request->input('senha');
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregadores/email/'. $email);
        $log = $response->json();
        if($log == null){
            dd(1);
            return redirect('/');
        }
        if($log['active'] == false){
            dd(2);
            return redirect('/');
        }
        
        if($log['email'] == $email && $log['senha'] == $senha ){
            $id_log = intval($log['id_entregador']);
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
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('/home', compact('response2'));
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

    public function detalhesentrega2($id){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/farmacias/'. $id2);
        $responseF = $response->json();
        return view('/detalhes', compact('response2'));
    }

    public function aceitarEntrega($id){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->put('http://127.0.0.1:8090/entregas/'. $id2,[
            'id_entregador' => $id_log, 
            'entrega_status' => "Em andamento",
            ]);
            return redirect('/minhasEntregas');
    }
    
    public function entregas(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('minhasEntregas', compact('response2','id_log'));
    }
    
    public function finalizarEntrega($id){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->put('http://127.0.0.1:8090/entregas/'. $id2,[
            'entrega_status' => "Entregue",
            ]);
            return redirect('/minhasEntregas');
    }

    public function gerenciarEntregas(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('gerenciar', compact('response2'));
    }

    public function gerenciar_andamento(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('em_andamento', compact('response2'));
    }

    public function v_entregue(){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id_log = intval(getCookie_log());
        $response = Http::withHeaders($header)->get('http://127.0.0.1:8090/entregas');
        $response2 = $response->json();
        return view('finalizadas', compact('response2','id_log'));
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
        'nome' => $request->input('nome'),
        'entrega_status' => $request->input('entrega_status'),
        'id_entregador' => $request->input('id_entregador'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cidade' => $request->input('cidade')
        ]);
        return redirect('/gerenciar');
    }

    public function removeentrega($id){
        $header = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RlQHRlc3RlLmNvbSIsImV4cCI6MTY2MTQzODc3M30.0PB047n_S3IS_qFpUdBl1FMWbzDwmEbr7XSNqNzQWA0'
        ];
        $id2 = intval($id);
        $response = Http::withHeaders($header)->delete('http://127.0.0.1:8090/entregas/'. $id2);
        return redirect('/gerenciar');
    }
}