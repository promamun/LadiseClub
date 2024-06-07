<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $role = Role::where("name", "Administrators")->first();
    if ($role) {
      $permissions = [
        "user-access-roles",
        "roles-list",
        "roles-add",
        "roles-edit",
        "roles-delete",
        "roles-store",
        "roles-update",
        "roles-permissions-list",
        "roles-view",
      ];
      foreach ($permissions as $permissionName) {
        $permission = Permission::firstOrCreate(['name' => $permissionName]);
        $role->permissions()->attach($permission->id);
      }
    } else {
      $this->command->warn('Role "Administrators" not found. Permissions not assigned.');
    }
  }
}
