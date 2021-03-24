<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
//    public function classes()
//    {
//        return $this->belongsto(ClassRoom::class);
//    }
    //---------- Relation Students_Teachers ---------//
    public function Teachers()
    {
        return $this->HasMany(Teacher::class);
    }
    //---------- Relation Students_Cours ---------//
    public function Cours()
    {
        return $this->HasMany(Student::class);
    }
    //---------- Relation Students_Matieres ---------//
    public function Matiere()
    {
        return $this->HasMany(Matieres::class);
    }
    //---------- Relation Students_Exercices ---------//
    public function Exercices()
    {
        return $this->HasMany(Exercices::class);
    }
    //---------- Relation Students_Classes ---------//
    public function Classes()
    {
        return $this->BelongsTo(Exercices::class);
    }
}
