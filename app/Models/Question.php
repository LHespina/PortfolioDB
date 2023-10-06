<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table ='questions';
    protected $fillable = ['full_name', 'email', 'phone_number', 'comment'];
}
