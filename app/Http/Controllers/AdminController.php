<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
  public function user_store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'password' => 'required|string|min:8',
      'role_id' => 'required|numeric',
    ]);

    try {
      $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']), // Using Hash helper
        'is_admin' => 2, // Assuming this is a default value
      ]);

      $user->roleUsers()->attach($validatedData['role_id']); // Attaching role

      return response()->json(['success' => 'User created & Role assigned successfully.'], 200);
    } catch (ValidationException $exception) {
      return response()->json(['error' => $exception->getMessage()], 422);
    } catch (\Exception $exception) { // Catching specific database exceptions
      return response()->json(['error' => $exception->getMessage()], 500);
    }
  }
  public function user_update(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:8',
        'role_id' => 'required|numeric',
        'id' => 'required|numeric',
      ]);
      dd($validatedData);
      $user = User::findOrFail($validatedData['id']); // Find the user by ID

      // Update user information
      $user->name = $validatedData['name'];
      $user->email = $validatedData['email'];
      // Update password if provided
      if (!is_null($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']); // Hash the password
      }
      $user->save();
      // Sync user role
      $user->roleUsers()->sync([$validatedData['role_id']]); // Sync with only the provided role
      return response()->json(['success' => 'User Updated & Role assigned successfully.'], 200);
    } catch (ValidationException $exception) {
      return response()->json(['error' => $exception->getMessage()], 422);
    } catch (\Exception $exception) { // Catching specific database exceptions
      return response()->json(['error' => $exception->getMessage()], 500);
    }
  }
  public function AdminLoginRequest(Request $request){
    try {
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required', // Assuming password is required
      ]);

      // Attempt to authenticate the user
      $credentials = $request->only('email', 'password');
      $remember = $request->has('remember'); // Check if remember checkbox is checked
      if (Auth::attempt($credentials, $remember)) {
        // Authentication passed...
        return redirect()->intended('/admin'); // Redirect to the admin dashboard or any desired route
      } else {
        // Authentication failed...
        return redirect()->back()->with('error', 'Invalid credentials')->withInput();
      }

    }catch (ValidationException $validationException){
      return redirect()->back()->with(['error'=>$validationException->getMessage()],422)->withInput();
    } catch (\Exception $exception){
      return redirect()->back()->with(['error'=>$exception->getMessage()],500)->withInput();
    }
  }
  public function user_delete($id)
  {
    try {
      $user = User::findOrFail($id);
      $user->roleUsers()->detach();
      $user->delete();
      return response()->json(['success' => 'User deleted successfully.'], 200);
    } catch (\Exception $exception) {
      return response()->json(['error' => $exception->getMessage()], 500);
    }
  }
}
