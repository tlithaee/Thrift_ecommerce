<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
{
    // Fetch the user's cart
    $cart = Cart::with('cartItems.menu')->where('user_id', Auth::id())->firstOrFail();

    // Validate the incoming request
    $validatedData = $request->validate([
        'address_line' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'zip_code' => 'required|string|max:10',
        'phone_number' => 'required|string|max:20',
    ]);

    // Create a new transaction
    $transaction = Transaction::create([
        'user_id' => Auth::id(),
        'total_price' => $cart->cartItems->sum(fn($item) => $item->menu->price * $item->quantity),
        'address_line' => $validatedData['address_line'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip_code' => $validatedData['zip_code'],
        'phone_number' => $validatedData['phone_number'],
        'status' => 'pending', 
    ]);

    // Save each item from the cart to the transaction_items table
    foreach ($cart->cartItems as $cartItem) {
        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'menu_id' => $cartItem->menu_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->menu->price,
        ]);
    }

    // Clear the cart after placing the order
    $cart->cartItems()->delete();

    // Redirect to the transaction summary page
    return redirect()->route('transaction.summary', ['transaction' => $transaction->id]);
}

    public function summary($transactionId)
    {
        // Fetch the transaction and its items
        $transaction = Transaction::with('transactionItems.menu')->where('id', $transactionId)->where('user_id', Auth::id())->firstOrFail();

        // Return the view with the transaction data
        return view('transaction', compact('transaction'));
    }

    public function updateStatus(Request $request, $id)
{
    // Find the transaction by ID
    $transaction = Transaction::findOrFail($id);
    
    // Update the status to 'completed'
    $transaction->status = $request->input('Completed');
    
    // Save the changes
    $transaction->save();

    return response()->json(['success' => true]);
}

public function history()
{
    // Fetch the user's transactions, along with their items and menu details, paginated
    $transactions = Transaction::with('transactionItems.menu')
                    ->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc') // Order by latest
                    ->paginate(5); // Paginate 5 transactions per page

    // Pass the paginated transactions to the view
    return view('history', compact('transactions'));
}

public function updatePaymentMethod(Request $request, Transaction $transaction)
{
    // Validate the payment method input
    $request->validate([
        'payment_method' => 'required|string|in:Cash On Delivery,Gopay,Ovo',
    ]);

    // Update the transaction with the new payment method
    $transaction->update([
        'payment_method' => $request->payment_method,
        'status' => 'completed', // Update the status if needed
    ]);

    // Return success response
    return response()->json(['success' => true], 200); // Return JSON response for AJAX
}


}
