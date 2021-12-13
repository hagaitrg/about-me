<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['name', 'image', 'desc', 'email', 'phone', 'link', 'user_id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
