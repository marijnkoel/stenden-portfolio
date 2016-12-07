<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module_portfolio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_portfolios';

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
    protected $fillable = ['portfolio_id', 'module_id'];

    
}
