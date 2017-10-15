<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $address = $user->address;
        return view('user.profile', ['user' => $user, 'address' => $address]);
    }

    public function showAddressForm()
    {
        return view('user.add-address');
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        $user_address = new UserAddress();
        $user_address->address_line_1 = $request->line_1;
        $user_address->address_line_2 = $request->line_2;
        $user_address->city = $request->city;
        $user_address->state = $request->state;
        $user_address->zipcode = $request->zipcode;

        $user_address->user_id = $user->id;

        $user_address->save();

        return redirect()->route('show-profile');

    }


}
