<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; 
    protected $dates = ['created_at'];
    protected $table = 'employees';
    protected $fillable = ['img','nama','kelamin','hp'];
}
