<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;
    protected $table = 'item_requests';
    protected $fillable = ['id', 'category', 'client', 'name', 'description', 'picture'];
}
