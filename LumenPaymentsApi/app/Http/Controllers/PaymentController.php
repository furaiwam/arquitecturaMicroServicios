<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Services\OrderService;
use App\Services\UserService;

class PaymentController extends Controller
{
    protected $orderService;
    protected $userService;

    public function __construct(OrderService $orderService, UserService $userService)
    {
        $this->orderService = $orderService;
        $this->userService = $userService;
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'user_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Simulate payment processing
        $status = rand(0, 10) > 1 ? 'completed' : 'failed'; // 90% success rate

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => $status,
            'transaction_id' => 'txn_' . uniqid(),
        ]);

        return response()->json($payment, 201);
    }

    public function getPayment($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    public function getPaymentsByOrder($orderId)
    {
        $payments = Payment::where('order_id', $orderId)->get();
        return response()->json($payments);
    }

    public function processRefund(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->status !== 'completed') {
            return response()->json(['error' => 'Only completed payments can be refunded'], 400);
        }

        $payment->update([
            'status' => 'refunded',
            'transaction_id' => $payment->transaction_id . '_refunded',
        ]);

        return response()->json($payment);
    }

    public function getPaymentsByUser($userId)
    {
        $payments = Payment::where('user_id', $userId)->get();
        return response()->json($payments);
    }
}
