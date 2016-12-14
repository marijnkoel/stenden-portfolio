<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'portfolio_id', 'id');
    }

    public function modules(){
        return $this->hasMany('App\Module','portfolio_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment','portfolio_id');
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'portfolios';

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
    protected $fillable = ['name', 'background_color', 'headers_color', 'text_color'];

    
}
