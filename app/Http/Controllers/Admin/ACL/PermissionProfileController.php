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

    /**
     * Get permissions of Profile
     */
    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function permissionsAvailable($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        // $permissions = $profile->permissions()->paginate();
        // $permissions = $this->permission->paginate();
        $permissions = $profile->permissionsAvaliable(); //traz as permissões não adicionais ao perfil

        return view('admin.pages.profiles.permissions.avaliable', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $permissions = $request->permissions;

        if (!$permissions || count($permissions) == 0 ) {
            return redirect()->back()->with('alert', "Precisa escolher pelo menos uma permissão");
        }

        $profile->permissions()->attach($permissions); //vincula

        return redirect()->route('profile.permissions', $profile->id);
    }
}
