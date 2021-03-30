<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Open view to list all existing groups
     * @return View View to display
     */
    public function listGroups(): View
    {
        return view('permissions.listGroups');
    }

    /**
     * Create a new group from request
     * @param Request $request
     * @return View
     */
    public function createGroup(Request $request): View {
        return $this->listGroups();
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
