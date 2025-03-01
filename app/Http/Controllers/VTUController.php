<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VTUController extends Controller
{
    public function buy_airtime (Request $request) {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:255',
            'operator' => 'required',
            'amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'All Fields Are Required.');
        }

        // then the amount being requested from the user and substract the balance from the user table
        //Auth::user()->decrement('balance', $amount);
        

        // this are the required field to fill which is in our form 
        $phone = $request->input('phone');
        $operator = $request->input('operator');
        $amount = $request->input('amount');    
        
        $data = array(
            "network" => $operator,  
            "amount" => $amount,
            "mobile_number" => $phone,
            "Ported_number" => true,
            "airtime_type" => "VTU"
        );
        

        if (Auth::user()->balance >= $amount) {
            //Set up some cURL config
            
            $curl = curl_init();
            curl_setopt_array($curl, array(CURLOPT_URL => 'https://www.husmodata.com/api/topup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Token XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $res = json_decode($response);
            
            if ($res->Status == "successful") {
                // if the status is successful then we will update the user table with the new balance
                Auth::user()->decrement('balance', $amount);

                $customer_ref = $res->customer_ref;
                $product_name = $res->ident;
                $phone = $res->mobile_number;
                $amount = $res->amount;
                $network = $res->plan_network;
                $status = $res->Status == "successful" ? 1 : 0;

                $transactions = new Transactions;
                $transactions->user_id = Auth::user()->user_id;
                $transactions->customer_ref = $customer_ref;
                $transactions->product_name = $product_name;
                $transactions->amount = $amount;
                $transactions->phone = $phone;
                $transactions->network = $network;
                $transactions->status = $status;
                $transactions->save();

                return redirect()->back()->with('message', 'Airtime Has Been Successfully Credited To '.$phone);
            }
            else {
                return redirect()->back()->with('message', 'Something Went Wrong');
            }
        }
        else {
            return redirect()->back()->with('message', 'Insufficient Balance');
        }

            
    }

    public function buy_data(Request $request) {

        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'All Fields Are Required');
        }
    }
            
}
