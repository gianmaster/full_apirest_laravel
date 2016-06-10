<?php
/**
 * Created by PhpStorm.
 * User: Giancarlos-Developer
 * Date: 9/6/2016
 * Time: 23:46
 */

namespace App\Auth;

use App\User;

class UserResolver
{

    /**
     * @param $id
     * @return mixed
     */
    public function resolveById($id){
        return User::findOrFail($id);
    }

}