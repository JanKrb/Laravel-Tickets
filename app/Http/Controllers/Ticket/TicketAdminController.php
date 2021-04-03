<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\TicketDepartment;
use App\Models\TicketPreset;
use App\Models\TicketSetting;
use App\Models\TicketStatus;
use App\Models\TicketTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketAdminController extends Controller
{
    /**
     * Update Generic Settings
     * @param Request $request Request of forms
     */
    public function updateGenericSetting(Request $request) {
        $enableComments = TicketSetting::firstOrNew(['setting_name' => 'enable_comments']);
        $enableComments->setting_value = ($request->input('enable_comments') == 'on');
        $enableComments->save();

        $showFirstname = TicketSetting::firstOrNew(['setting_name' => 'first_name']);
        $showFirstname->setting_value = ($request->input('first_name') == 'on');
        $showFirstname->save();

        $showLastname = TicketSetting::firstOrNew(['setting_name' => 'last_name']);
        $showLastname->setting_value = ($request->input('last_name') == 'on');
        $showLastname->save();

        $showEmail = TicketSetting::firstOrNew(['setting_name' => 'email']);
        $showEmail->setting_value = ($request->input('email') == 'on');
        $showEmail->save();

        return redirect()->route('adminTicket')->withSuccess('Changes has been applied');
    }

    public function addNewStatus(Request $request) {
        $request->validate([
            'title' => 'required',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/'
        ]);

        $status = TicketStatus::create([
            'title' => $request->input('title'),
            'color' => $request->input('color'),
            'creator_id' => Auth::user()->id
        ]);

        $type = 'success';
        $message = 'The status has been created.';

        if (!$status) {
            $type = 'error';
            $message = 'An error occured while creating your status.';
        }

        return redirect()->route('adminTicket')->with($type, $message);
    }

    public function addNewTag(Request $request) {
        $request->validate([
            'title' => 'required',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/'
        ]);

        $tag = TicketTag::create([
            'title' => $request->input('title'),
            'color' => $request->input('color'),
            'creator_id' => Auth::user()->id
        ]);

        $type = 'success';
        $message = 'The tag has been created.';

        if (!$tag) {
            $type = 'error';
            $message = 'An error occured while creating your tag.';
        }

        return redirect()->route('adminTicket')->with($type, $message);
    }

    public function addNewDepartment(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $tag = TicketDepartment::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'creator_id' => Auth::user()->id
        ]);

        $type = 'success';
        $message = 'The department has been created.';

        if (!$tag) {
            $type = 'error';
            $message = 'An error occured while creating your department.';
        }

        return redirect()->route('adminTicket')->with($type, $message);
    }

    public function addNewPreset(Request $request) {
        $request->validate([
            'text' => 'required'
        ]);

        $preset = TicketPreset::create([
            'text' => $request->input('text'),
            'creator_id' => Auth::user()->id
        ]);

        $type = 'success';
        $message = 'The preset has been created.';

        if (!$preset) {
            $type = 'error';
            $message = 'An error occured while creating your preset.';
        }

        return redirect()->route('adminTicket')->with($type, $message);
    }

    public function editNewStatus(Request $request) {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'color' => 'required',
        ]);

        $status = TicketStatus::where('id', $request->input('id'))->first();
        if (!$status) {
            return redirect()->route('adminTicket')->with('error', 'You tried to edit an invalid status');
        }

        $status->title = $request->input('title');
        $status->color = $request->input('color');
        $status->save();

        return redirect()->route('adminTicket')->withSuccess('You successfully updated the status.');
    }

    public function deleteNewStatus(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        TicketStatus::where('id', $request->input('id'))->delete();

        return redirect()->route('adminTicket')->withSuccess('You successfully deleted the status.');
    }

    public function editNewTag(Request $request) {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'color' => 'required',
        ]);

        $tag = TicketTag::where('id', $request->input('id'))->first();
        if (!$tag) {
            return redirect()->route('adminTicket')->with('error', 'You tried to edit an invalid tag');
        }

        $tag->title = $request->input('title');
        $tag->color = $request->input('color');
        $tag->save();

        return redirect()->route('adminTicket')->withSuccess('You successfully updated the tag.');
    }

    public function deleteNewTag(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        TicketTag::where('id', $request->input('id'))->delete();

        return redirect()->route('adminTicket')->withSuccess('You successfully deleted the tag.');
    }

    public function editNewDepartment(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $department = TicketDepartment::where('id', $request->input('id'))->first();
        if (!$department) {
            return redirect()->route('adminTicket')->with('error', 'You tried to edit an invalid department');
        }

        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();

        return redirect()->route('adminTicket')->withSuccess('You successfully updated the department.');
    }

    public function deleteNewDepartment(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        TicketDepartment::where('id', $request->input('id'))->delete();

        return redirect()->route('adminTicket')->withSuccess('You successfully deleted the department.');
    }

    public function editNewPreset(Request $request) {
        $request->validate([
            'id' => 'required',
            'text' => 'required'
        ]);

        $preset = TicketPreset::where('id', $request->input('id'))->first();
        if (!$preset) {
            return redirect()->route('adminTicket')->with('error', 'You tried to edit an invalid preset');
        }

        $preset->text = $request->input('text');
        $preset->save();

        return redirect()->route('adminTicket')->withSuccess('You successfully updated the preset.');
    }

    public function deleteNewPreset(Request $request) {
        $request->validate([
           'id' => 'required'
        ]);

        TicketPreset::where('id', $request->input('id'))->delete();

        return redirect()->route('adminTicket')->withSuccess('You successfully deleted the preset.');
    }
}
