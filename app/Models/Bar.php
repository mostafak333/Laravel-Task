<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $table = 'bar';
    public $primarykey = 'id';
    public $timestamps = true;
}
