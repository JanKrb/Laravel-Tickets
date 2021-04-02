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
}
