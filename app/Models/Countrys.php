<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrys extends Model
{
    use HasFactory;

    protected $table = 'countrys';
    protected $fillable = ['name'];
}
