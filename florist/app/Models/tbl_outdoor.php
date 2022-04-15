<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_outdoor extends Model
{
    use HasFactory;
    protected $table = 'tbl_outdoors';
    protected $fillable = ['id', 'name', 'description', 'picture'];
}
