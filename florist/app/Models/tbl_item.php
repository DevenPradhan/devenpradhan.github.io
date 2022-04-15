<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_item extends Model
{
    use HasFactory;
    protected $table = 'items_list';
    protected $fillable = ['id', 'item_id', 'item_category', 'client_id', 'quantity']; 
    
}
