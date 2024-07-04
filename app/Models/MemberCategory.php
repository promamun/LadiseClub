<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    use HasFactory;
    protected $guarded=[];
  public function members()
  {
    return $this->belongsToMany(Member::class, 'member_member_category');
  }
}
