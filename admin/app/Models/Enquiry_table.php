<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry_table extends Model
{
    use HasFactory;
    protected $table = "enquiry_table";
    protected $primaryKey = "id";
}
