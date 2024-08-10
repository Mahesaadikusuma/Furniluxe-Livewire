<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $transaction = Transaction::where('invoice', $notification->order_id)->first();

        if ($notification->transaction_status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
        } elseif ($notification->transaction_status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } elseif ($notification->transaction_status == 'deny' || $notification->transaction_status == 'expire' || $notification->transaction_status == 'cancel') {
            $transaction->transaction_status = 'FAILED';
        }

        $transaction->save();
    }
}
