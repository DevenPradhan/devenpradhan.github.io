<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_client extends Model
{
    use HasFactory;
    protected $table = 'tbl_clients';
    protected $fillable = [
        'user_id',
        'name',
        'cid_no',
        'address',
        'contact_no',
    ];
}
