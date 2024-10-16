<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
{
    public function showCheckout()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'phone_number' => 'required|string|max:15',
        ]);

        $userId = Auth::id();

        $address = ShippingAddress::where('user_id', $userId)->first();

        if ($address) {
            $address->update([
                'address_line' => $request->address_line,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_number,
            ]);
        } else {
            ShippingAddress::create([
                'user_id' => $userId,
                'address_line' => $request->address_line,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_number,
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Shipping address saved successfully!');
    }
}
