<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {
        $settings = Settings::find(1);
        return view('front.payment', [
            'settings' => $settings
        ]);
    }

    public function make_payment(Request $request) {
        $status = $request->input('status');

        if ($status == "cancelled") {
            return redirect('home')->with('message', 'Payment Cancelled');
        }
        else if ($status == "successful") {
            $tx_id = $request->input("transaction_id");

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/transactions/'.$tx_id.'/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10, 
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                'Content-Type: application/json'
            ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);

            $res = json_decode($response);

            if ($res->status == "success") {
                $amount_paid = $res->data->charged_amount;
                $tx_ref = $res->data->tx_ref;
                $name = $res->data->customer->name;
                $email = $res->data->customer->email;
                $phone = $res->data->customer->phone_number;
                $user_id = $res->data->meta->user_id;

                $payments = new Payments;

                $payments->tx_ref = $tx_ref;
                $payments->name = $name;
                $payments->email = $email;
                $payments->phone = $phone;
                $payments->user_id = $user_id;
                $payments->amount_paid = $amount_paid;

                $payments->save();

                Auth::user()->increment('balance', $amount_paid);

                return redirect('home')->with('message', 'Payment Successfull');
            } 
            else {
                return redirect('home')->with('message', 'Payment Not Processed');
            }

        }

    }
}
