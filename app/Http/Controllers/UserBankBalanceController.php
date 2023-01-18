<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Gate;
use Auth;

class UserBankBalanceController extends Controller
{
    public function edit() {
        return view('users.addmoney', [
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'bank_balance' => 'required|numeric|min:'
        ]);

        $input = $request -> all();

        try {
            User::findOrFail(Auth::user()->id)->increment('bank_balance', $input['bank_balance']);
        } catch(QueryException $ex) {
            return redirect()->back()->withErrors(__('custom.bank_balance'));
        }
        return redirect()->route('users.show', Auth::user()->id);
    }
}
