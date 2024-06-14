<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitieDetail extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'image',
      'description'
    ];
    public function facilities(){
      return $this->belongsToMany(Facilitie::class);
     }
}
