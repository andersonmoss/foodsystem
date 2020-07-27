<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;
    
    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }
    
    public function index($profileId){
        $profile = $this->profile->find($profileId);

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }

    public function available($profileId) {
        $profile = $this->profile->find($profileId);

        $permissions = $this->profile->all();
        $permissions = $profile->permissionsAvailable();

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));

    }

    public function attachPermissionsProfile(Request $request, $profileId) {
        $profile = $this->profile->find($profileId);

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                        ->back()
                        ->with('info', "Precisa selecionar pelo menos 1 permissão");
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id);

    }

    public function detach($profileId, $permissionId) {
        $profile = $this->profile->find($profileId);

        $profile->permissions()->detach($permissionId);

        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function profiles($permissionId) {
        $permission = $this->permission->find($permissionId);

        $profiles = $permission->profiles;

        return view('admin.pages.profiles.permissions.profiles', compact('profiles', 'permission'));
    }
}
