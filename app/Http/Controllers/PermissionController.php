<?php

namespace App\Http\Controllers;

use App\Models\Group;
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
        $message = '';

        if (!$group) {
            $type = 'error';
            $message = 'An error occured while creating your group.';
        }

        return $this->listGroups()->with($type, $message);
    }

    /**
     * Update an existing group by request
     * @param Request $request
     * @return View
     */
    public function updateGroup(Request $request): View {
        return $this->listGroups();
    }

    /**
     * Delete an existing group from request
     * @param Request $request
     * @return View
     */
    public function deleteGroup(Request $request): View {
        return $this->listGroups();
    }

    /**
     * Open view to list all permissions of a specific group
     * @param $groupId int Primary Key / ID of the group to fetch the permissions from
     * @return View View to display
     */
    public function listPermissionsOfGroup(int $groupId): View
    {
        return view();
    }
}
