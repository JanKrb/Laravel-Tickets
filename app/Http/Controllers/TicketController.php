<?php

namespace App\Http\Controllers;

use App\Models\TicketDepartment;
use App\Models\TicketPreset;
use App\Models\TicketSetting;
use App\Models\TicketStatus;
use App\Models\TicketTag;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function createTicket() {
        return view('tickets.create-ticket');
    }

    public function listTicket() {
        return view('tickets.list-tickets');
    }

    public function viewTicket($ticketId) {
        return view('tickets.detail-ticket');
    }

    public function adminTicket() {
        $data = [
            'statues' => TicketStatus::all(),
            'tags' => TicketTag::all(),
            'departments' => TicketDepartment::all(),
            'presets' => TicketPreset::all()
        ];

        return view('tickets.admin-ticket', $data);
    }

    /**
     * Get setting value
     * @param $settingName String Name of the setting
     * @return bool
     */
    private function getSetting($settingName): bool {
        $setting = TicketSetting::where('setting_name', $settingName)->first();

        if ($setting != null) {
            return $setting->setting_value;
        }

        return false;
    }
}
