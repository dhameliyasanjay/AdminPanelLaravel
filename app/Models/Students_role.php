<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students_role extends Model
{
    use HasFactory;
    public $table = 'role_student';
    protected $fillable = ['student_id','role_id'];
}
