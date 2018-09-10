<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $primaryKey = 'postId';


    public function user(){
        return $this->belongsTo('App\User');
    }


}
