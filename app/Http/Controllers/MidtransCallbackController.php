<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;

class MidtransCallbackController extends Controller
{
    public function receive(Request $request)
    {
        Log::info('=== MIDTRANS CALLBACK RECEIVED ===');
        Log::info($request->all());

        $orderId           = $request->order_id;
        $statusCode        = $request->status_code;
        $grossAmount       = $request->gross_amount;
        $signatureKey       = $request->signature_key;
        $transactionStatus = $request->transaction_status;
        $paymentType        = $request->payment_type;
        $fraudStatus         = $request->fraud_status;

        if (!$orderId || !$statusCode || !$grossAmount || !$signatureKey) {
            Log::error('Incomplete callback data');
            return response()->json(['message' => 'Bad request'], 400);
        }

        $serverKey = env('MIDTRANS_SERVER_KEY');
        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($signatureKey !== $expectedSignature) {
            Log::warning('INVALID SIGNATURE - Possible fake callback: ' . $orderId);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $trx = Transaction::where('order_id', $orderId)->first();

        if (!$trx) {
            Log::error("Transaksi tidak ditemukan: " . $orderId);
            return response()->json(['message' => 'Order not found'], 404);
        }

        /**
         * ✅ UPDATE STATUS
         */
        if ($transactionStatus === 'capture') {

            if ($paymentType === 'credit_card') {

                if ($fraudStatus === 'challenge') {
                    $trx->payment_status = 'challenge';
                }

                if ($fraudStatus === 'accept') {
                    $trx->payment_status = 'success';
                    $trx->status = 'paid';
                }
            }

        } elseif ($transactionStatus === 'settlement') {

            $trx->payment_status = 'success';
            $trx->status = 'paid';

        } elseif ($transactionStatus === 'pending') {

            $trx->payment_status = 'pending';

        } elseif (in_array($transactionStatus, ['deny','expire','cancel'])) {

            $trx->payment_status = $transactionStatus;
            $trx->status = 'failed';

        } else {
            Log::warning("Unknown transaction status: {$transactionStatus}");
        }

        $trx->save();

        Log::info("STATUS UPDATED: {$orderId} → {$trx->payment_status}");

        return response()->json(['message' => 'OK'], 200);
    }
}
