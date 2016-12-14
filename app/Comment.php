<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function portfolio(){
        return $this->belongsTo('App\Portfolio','portfolio_id');
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'portfolio_id', 'user_id'];

    
}
