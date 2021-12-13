<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'image', 'link', 'tag_id',  'user_id'];

    public function tag()
    {
        return $this->belongsTo(SkillTag::class, 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
