<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table= 'sexes';
    protected $fillable = ['sex'];
    protected $primaryKey = 'id';

	public $timestamps = false;
}
