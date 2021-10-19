<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function getDataByCep($cep){
        $url = "https://viacep.com.br/ws/$cep/json/";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = json_decode(curl_exec($curl));
        return response()->json($resp);
    }

    public function getGeoLocationByCep($cep){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$cep&key=AIzaSyDtan25Af8upI2gzsDd_d610TEaA4NHwdw";
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = json_decode(curl_exec($curl), true);

        if(isset($resp['results'][0])){
            $response = $resp['results'][0]['geometry'];
        }else{
            $response = $resp;
        }

        return response()->json($response);
    }
}
