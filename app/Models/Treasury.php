<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasury';
    public $primarykey = 'id';
    public $timestamps = true;
}
