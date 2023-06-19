<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botreply extends Model
{
    use HasFactory;
    protected $table = "botreply";
    protected $primaryKey = "enrollno";
}
