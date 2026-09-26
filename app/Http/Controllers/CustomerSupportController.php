<?php

namespace App\Http\Controllers;

use App\Models\CustomerSupportTicket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomerSupportController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'order_id' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $orderId = null;

        if ($request->filled('order_id')) {
            $normalizedOrderNumber = strtoupper(ltrim(trim((string) $request->input('order_id')), '#'));

            $orderId = Order::query()
                ->whereRaw('UPPER(order_number) = ?', [$normalizedOrderNumber])
                ->value('id');

            if ($orderId === null) {
                throw ValidationException::withMessages([
                    'order_id' => 'The order reference entered is not valid.',
                ]);
            }
        }

        CustomerSupportTicket::create([
            'user_id' => Auth::id(),
            'order_id' => $orderId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'category' => $validated['subject'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'open',
        ]);

        return back()->with(
            'success',
            'Your support request has been submitted successfully.'
        );
    }
}
