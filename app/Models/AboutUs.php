<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'title',
      'image',
      'description',
      'what_to_do',
      'what_we_are',
      'our_aim_mission'
    ];
}
