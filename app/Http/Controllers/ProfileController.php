<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;

use App\Http\Requests;

class ProfileController extends Controller
{
    use Helpers;
    //
    public function index(){
        //$user = app('Dingo\Api\Auth\Auth')->user();
        $user = $this->auth->user();
        return $this->response->item($user, new UserTransformer());
    }
}
