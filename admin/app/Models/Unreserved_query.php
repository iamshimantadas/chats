<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unreserved_query extends Model
{
    use HasFactory;
    protected $table = "unreserved_query";
    protected $primaryKey = "enrollno";
}
