<?php
/**
 * Created by PhpStorm.
 * User: DesProjectos.002
 * Date: 08/06/2016
 * Time: 12:22
 */

namespace App\Transformers;

use App\Post;
use App\User;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract{

    //Los transformers tinen 2 tipos de includes
    //por defecto, o los avaliable


    /**
     * @param Post $model
     * @return array
     */
    public function transform(Post $model){
        return[
            'id'            => $model->uuid,
            'body'          => $model->body,
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }


}