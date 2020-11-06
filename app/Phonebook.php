<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'mobile',
    ];
    protected $connection = 'sqlsrv';
    
}

 

 