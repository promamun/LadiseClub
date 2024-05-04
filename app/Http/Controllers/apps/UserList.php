<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserList extends Controller
{
  public function index()
  {
    return view('content.user.app-user-list');
  }
  public function allUserList()
  {
    $allUserList  = User::with('roleUsers:id,name')->get();
    return response()->json($allUserList);
  }
}
