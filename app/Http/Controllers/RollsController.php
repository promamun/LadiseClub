<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nette\Schema\ValidationException;

class RollsController extends Controller
{
  public function userPermissionList()
  {
    $user = auth()->user();
    $user->userPermissionList();
    return $user;
  }
  public function userRoleList()
  {
    $userRoleList = Role::all();
    return response()->json($userRoleList);
  }
  public function rolesList(){
    $rolesList = Role::select('id','name')->get();
    return response()->json(['message'=>'Roles Data Get Success','data'=>$rolesList],200);
  }
  public function AllRoutes(){
    $routesByPrefix = [];
    // Loop through all registered routes
    foreach (Route::getRoutes() as $route) {
      // Get the prefix of the route
      $prefix = $route->getPrefix();

      // Check if the route has a prefix
      if ($prefix) {
        // Extract relevant route information
        $routeName = $route->getName();
        $uri = $route->uri();
        $methods = $route->methods();
        // Store route information in an array grouped by prefix
        $routesByPrefix[$prefix][] = [
          'name' => $routeName,
          'uri' => $uri,
          'methods' => $methods,
        ];
      }
    }
    return response()->json(['message'=>'Routes Gets Success','data'=>$routesByPrefix],200);
  }
  public function roles_store(Request $request){
    try {
      $this->validate($request, [
        'name' => 'required|string',
        'permissions' => 'required|array',
        'permissions.*' => 'string|nullable', // Assuming permissions are strings
      ]);
      $role = Role::create([
        'name'=>$request->name,
      ]);
      // Attach permissions to the role
      $permissions = [];
      foreach ($request->permissions as $permissionName) {
        if ($permissionName !== null) {
          $permission = Permission::firstOrCreate([
            'name' => $permissionName,
          ]);
          $permissions[] = $permission->id;
        }
      }
      $role->permissions()->attach($permissions);
      return response()->json(['message'=>'Role and permissions Create Success'],200);
    }catch (ValidationException $validationException){
      return response()->json(['error'=>$validationException->getMessage()],422);
    } catch (\Exception $exception){
      return response()->json(['error'=>$exception->getMessage()],500);
    }
  }
  public function roles_update(Request $request){
    try {
      $this->validate($request, [
        'id' => 'required|numeric',
        'name' => 'required|string',
        'permissions' => 'required|array',
        'permissions.*' => 'string|nullable', // Assuming permissions are strings
      ]);
      $id = $request->id; // Retrieve the ID from the request

      $role = Role::findOrfail($id);
      $role->update([
        'name'=>$request->name,
      ]);
      // Attach permissions to the role
      $permissions = [];
      foreach ($request->permissions as $permissionName) {
        if ($permissionName !== null) {
          $permission = Permission::firstOrCreate([
            'name' => $permissionName,
          ]);
          $permissions[] = $permission->id;
        }
      }
      $role->permissions()->sync($permissions); // Sync permissions with the new set

      return response()->json(['message'=>'Role and permissions Update Success'],200);
    }catch (ValidationException $validationException){
      return response()->json(['error'=>$validationException->getMessage()],422);
    } catch (\Exception $exception){
      return response()->json(['error'=>$exception->getMessage()],500);
    }
  }
  public function roles_delete($id){
    $roles_delete = Role::findOrfail($id);
    $roles_delete->delete();
    return response()->json(['message'=>'Roles And Permission Delete success'],200);
  }
  public function rolesPermissionsList($id){
    try {
      $rolesPermission = Role::with('permissions:id,name')->findOrfail($id);
      return response()->json(['message'=>'Role and permissions Get Success','data'=> $rolesPermission],200);
    } catch (\Exception $exception) {
      return response()->json(['error'=>$exception->getMessage()],500);
    }
  }
}
