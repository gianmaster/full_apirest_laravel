<?php
/**
 * Created by PhpStorm.
 * User: DesProjectos.002
 * Date: 08/06/2016
 * Time: 12:22
 */

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{

    //protected $defaultIncludes = ['latestPosts'];
    protected $availableIncludes = ['latestPosts', 'user'];

    public function transform(User $user){
        return[
            'id'            => $user->uuid,
            'email'         => $user->email,
            'name'          => $user->name,
            'created_at'    => $user->created_at,
            'updated_at'    => $user->updated_at
        ];
    }


    public function includeLatestPosts(User $user){
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(5)->get();
        return $this->collection($posts, new PostTransformer());
    }

    public function includeUser($user){
        return $this->item($user, new UserTransformer());
    }

}