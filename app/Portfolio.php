<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
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
