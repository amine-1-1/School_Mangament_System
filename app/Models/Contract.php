<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    public function teacher()
    {
        return $this->belongsto(Teacher::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
