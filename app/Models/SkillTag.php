<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillTag extends Model
{
    public $timestamps = false;

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
