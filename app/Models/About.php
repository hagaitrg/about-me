<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['name', 'image', 'desc', 'email', 'phone', 'link'];

    use HasFactory;
}