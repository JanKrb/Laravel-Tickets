<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPermission;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Open view to list all existing groups
     * @return View View to display
     */
    public function listGroups(): View
    {
        $data = array(
            'groups' => Group::all()
        );

        return view('permissions.listGroups', $data);
    }

    /**
     * Create a new group from request
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function createGroup(Request $request) {
        $request->validate([
            'name' => 'required',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/'
        ]);

        if (Group::where('default_group', true)->count() > 0 && $request->input('default') == 'on') {
            return redirect()->route('groups')->with('error', 'There is already a default group, remove it first.');
        }

        $group = Group::create([
            'group_name' => $request->input('name'),
            'group_color' => $request->input('color'),
            'default_group' => $request->input('default') == 'on',
            'creator_id' => Auth::user()->id,
        ]);

        $type = 'success';
        $message = 'The group has been created.';

        if (!$group) {
            $type = 'error';
            $message = 'An error occured while creating your group.';
        }

        return $this->listGroups()->with($type, $message);
    }

    /**
     * Update an existing group by request
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function updateGroup(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/'
        ]);

        if (Group::where('default_group', true)->count() > 0 && $request->input('default') == 'on') {
            return redirect()->route('groups')->with('error', 'There is already a default group, remove it first.');
        }

        $group = Group::where('id', $request->input('id'))->first();
        $group->update([
            'group_name' => $request->input('name'),
            'group_color' => $request->input('color'),
            'default_group' => $request->input('default') == 'on',
            'creator_id' => Auth::user()->id,
        ]);

        $type = 'success';
        $message = 'The group has been edited.';

        if (!$group) {
            $type = 'error';
            $message = 'An error occured while updating your group.';
        }

        return $this->listGroups()->with($type, $message);
    }

    /**
     * Delete an existing group from request
     * @param Request $request
     * @return View
     */
    public function deleteGroup(Request $request): View {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $group = Group::where('id', $request->input('id'))->delete();

        $type = 'success';
        $message = 'The group has been deleted.';

        if (!$group) {
            $type = 'error';
            $message = 'An error occured while deleting your group.';
        }

        return $this->listGroups()->with($type, $message);
    }

    /**
     * Open view to list all permissions of a specific group
     * @param $groupId int Primary Key / ID of the group to fetch the permissions from
     * @return View View to display
     */
    public function listPermissions(int $groupId): View
    {
        $data = array(
            "group" => Group::where('id', $groupId)->first(),
            "permissions" => GroupPermission::where('group_id', $groupId)->get()
        );

        return view('permissions.listPermissions', $data);
    }

    /**
     * Grant permission to group
     * @param Request $request
     * @param int $groupId Target group id
     * @return View View to display
     */
    public function grantPermission(Request $request, int $groupId): View {
        $request->validate([
            'name' => 'required',
        ]);

        $permissions = GroupPermission::create([
            'permission_name' => $request->input('name'),
            'creator_id' => Auth::user()->id,
            'group_id' => $groupId
        ]);

        $type = 'success';
        $message = 'Permission has been granted.';

        if (!$permissions) {
            $type = 'error';
            $message = 'An error occured while granting your permission.';
        }

        return $this->listPermissions($groupId)->with($type, $message);
    }

    public function updatePermission(Request $request, int $groupId): View {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required',
        ]);

        $permission = GroupPermission::where('id', $request->input('id'))->first();
        $permission->update([
            'permission_name' => $request->input('name'),
            'creator_id' => Auth::user()->id,
            'updated_at' => now()
        ]);

        $type = 'success';
        $message = 'The permission has been edited.';

        if (!$permission) {
            $type = 'error';
            $message = 'An error occured while updating your permission.';
        }

        return $this->listPermissions($groupId)->with($type, $message);
    }

    /**
     * Revoke permission by id
     * @param Request $request
     * @param int $groupId Target group id
     * @return View View to display
     */
    public function revokePermission(Request $request, int $groupId): View
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        GroupPermission::where(['id' => $request->input('id')])->delete();

        return $this->listPermissions($groupId)->with('success', 'The permission has been revoked.');
    }
}
