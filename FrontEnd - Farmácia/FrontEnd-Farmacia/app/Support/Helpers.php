<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

    function setCookie_log($id_log){
        Cookie::queue('cookie_log', $id_log);
        return ;
    }
    function getCookie_log(){
        $cookieValue = Cookie::get('cookie_log');
        return $cookieValue;
    }