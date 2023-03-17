<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function getuserId(Request $request){

        $url = 'http://www.usuarios.bh/api/auth/user?client_ip='.$request->getClientIp();
        $client = new Client();
        try{
            $response = $client->request('POST', $url);
            $body = json_decode($response->getBody());
            return $body->user->id;

        }catch (ClientException $e) {
            return $e;
        }
    }
}
