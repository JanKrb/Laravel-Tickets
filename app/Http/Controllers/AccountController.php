<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function listAccounts(): View
    {
        $data = array(
            "accounts" => User::all()
        );
        return view('accounts.listAccounts', $data);
    }

    /**
     * Show detailed account view
     * @param $accountId
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function showAccount($accountId) {
        $data = array(
            "user" => User::where('id', $accountId)->first(),
        );

        return view('accounts.detailedView', $data);
    }

    /**
     * Update account details
     * @param Request $request
     * @param $accountId int Target account id
     * @return RedirectResponse
     */
    public function updateAccount(Request $request, int $accountId): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            "first_name" => 'required',
            "last_name" => 'required'
        ]);

        $account = User::where('id', $accountId)->first();
        $account->email = $request->input('email');
        $account->name = $request->input('first_name');
        $account->last_name = $request->input('last_name');
        $account->save();

        return redirect()->route('showAccount', ['accountid' => $accountId])->withSuccess('Account has been updated');
    }

    public function changePasswordAccount(Request $request, int $accountId) {
        $request->validate([
            'password' => 'required|string|min:8'
        ]);

        $account = User::where('id', $accountId)->first();
        $account->password = $request->input('password');
        $account->save();

        return redirect()->route('showAccount', ['accountid' => $accountId])->withSuccess('Password has been changed.');
    }

    public function deleteAccount(Request $request, int $accountId) {
        $account = User::where('id', $accountId)->delete();
        return redirect()->route('listAccounts')->withSuccess('Account has been deleted.');
    }
}
