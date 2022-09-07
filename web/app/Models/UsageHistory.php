<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageHistory extends Model
{
    protected $fillable = ['user_id','item_id','start_at', 'return_at'];
    use HasFactory;
}