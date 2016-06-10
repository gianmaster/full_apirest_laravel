<?php

namespace App\Http\Controllers\Auth;

use Authorizer;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{
    use Helpers;

    /**
     * @return mixed
     */
    public function authorizeClient(){
        //return $this->response->array('Se fue a la mierda');
        return $this->response->array(Authorizer::issueAccessToken());
    }


    /**
     * @param $email
     * @param $pass
     * @return bool
     */
    public function authorizeUser($email, $pass){
        $credentials = [
            'email'    => $email,
            'password' => $pass,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
