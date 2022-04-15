<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_indoor extends Model
{
    use HasFactory;
    protected $table = 'tbl_indoors';
    protected $fillable = [
        'name',
        'description',
        'picture'
    ];
}
