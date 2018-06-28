<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Sex;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['first_name', 'last_name', 'sex_id'];

    protected $primaryKey = 'id';

    public $timestamps = false;
}
