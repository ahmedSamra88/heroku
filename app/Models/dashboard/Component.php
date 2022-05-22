<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
   protected $fillable=['name','data','created_at','updated_at'];
   protected $primaryKey="name";
}
