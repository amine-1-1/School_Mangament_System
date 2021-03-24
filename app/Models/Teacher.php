<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function contracts()
    {
        return $this->hasmany(Contract::class);
    }

    //---------- Relation Teacher_Student ---------//
    public function Students()
    {
        return $this->HasMany(Teacher::class);
    }
    //---------- Relation Teacher_Cours ---------//
    public function Cours()
    {
        return $this->HasMany(Student::class);
    }
    //---------- Relation Teacher_Matieres ---------//
    public function Matiere()
    {
        return $this->HasMany(Matieres::class);
    }
    //---------- Relation Teacher_Exercices ---------//
    public function Exercices()
    {
        return $this->HasMany(Exercices::class);
    }
    //---------- Relation Teacher_Classes ---------//
    public function Classes()
    {
        return $this->HasMany(Exercices::class);
    }
    public function vacations()
    {
        return $this->hasmany(Vacation::class);
    }
}
