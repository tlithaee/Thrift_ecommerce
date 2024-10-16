<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $order = $user->order;
        $orders = $order->menu;
        $total = 0;

        foreach ($order->menu as $menu) {
            $subtotal = $menu->price * $menu->pivot->quantity;
            $total += $subtotal;
        }

        $status = $order->status;
        // dd($totalPrice);
        return view('order', compact('orders', 'total', 'status'));
    }

    public function addMenu(Request $request, String $slug)
    {
        $order = User::find(auth()->id())->order;
        $menu = Menu::where('slug', $slug)->firstOrFail();
        if(!$order->menu()->where('menu_id', $menu->id)->exists()) {
            $order->menu()->attach($menu->id, ['quantity' => 1]);
        } else {
            $order->menu()->updateExistingPivot($menu->id, [
                'quantity' => DB::raw('quantity + 1')
            ]);
        }
        return redirect('/order');
        
    }

    public function show($slug)
    {
        $user = User::find(auth()->id());
        $order = Order::where('slug', $slug)->firstOrFail();

        return view('order.show', compact('menu'));
    }

    public function submitOrder()
    {
        $user = User::find(auth()->id());
        $order = $user->order;
        $order->menu()->delete();
        return redirect('/')->with('success', 'Order submitted successfully!');
    }

    public function deleteMenuOrder($id)
    {
        $order = User::find(auth()->id())->order;
        $order->menu()->where('menu_id', $id)->delete();

        return redirect('/order')->with('success', 'Order deleted successfully');
    }

    public function increment($id)
    {
        $order = User::find(auth()->id())->order;
        $order->menu()->updateExistingPivot($id, [
            'quantity' => DB::raw('quantity + 1')
        ]);
        return redirect('/order')->with('success', 'Order edited successfully');
    }

    public function decrement($id)
    {
        $order = User::find(auth()->id())->order;
        $order->menu()->updateExistingPivot($id, [
            'quantity' => DB::raw('quantity - 1')
        ]);
        return redirect('/order')->with('success', 'Order edited successfully');
    }
    
}