<?php

namespace App\Http\Controllers;

use App\Models\Help;
use App\Models\NINServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\Payments;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable

     */
    public function index()
    {
        $nin_services = NINServices::all();

        return view('front.home', ['nin_services' => $nin_services]);
    }

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
                'Authorization: Bearer FLWSECK_TEST-41a99426c1734b81a4d2c4c366a3b372-X',
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
                $phone = $res->data->customer->phone;
                $user_id = $res->data->meta->user_id;

                $payments = new Payments;

                $payments->tx_ref = $tx_ref;
                $payments->name = $name;
                $payments->email = $email;
                $payments->phone = $phone;
                $payments->user_id = $user_id;
                $payments->amount_paid = $amount_paid;

                return redirect('home')->with('message', 'Payment Successfull');
            } 
            else {
                return redirect('home')->with('message', 'Payment Not Processed');
            }

        }

    }

    public function view_transaction_table()
    {
         $transactions = Transactions::where('user_id',Auth::user()->user_id)->get();
        return view('front.view_transaction_table',[
            'transactions' => $transactions
        ]);
    }
    public function services()
    {
        return view('front.services');
    }

    public function transactions()
    {
        $transactions = Transactions::where('user_id', Auth::user()->user_id)->get();

        // $all = Transactions::find('user_id')->where('user_id', Auth::user()->user_id);
        // $tr  = $transactions->email;
        // $labels = [];
        // $data = [];

        // $value = $transactions->amount;
        //    $data[] = $value;
            // $labels[] = $value->created_at;
            // $datasetData = json_encode($tr);
            
        // }
            return view('front.transactions', [
                // 'all' => $all
                'transactions' => $transactions
            ]);
    }

    public function help()
    {
        $helps = Help::all();
        return view('front.help', [
            'helps' => $helps
        ]);
    }

    public function settings()
    {
        return view('front.settings');
    }


    

    public function update_details(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Every Field Is Required');
        }

        $user = User::find(Auth::user()->id);
        if ($user->email == $request->email) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        } 
        else {
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Email Already Used');
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }

        return redirect()->back()->with('message', 'User Details Updated Successfully');
    }

    public function update_password(Request $request) {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Error With Updating User Password');
        }

        $current_password = Hash::check($request->current_password, Auth::user()->password);
        if ($current_password) {
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        }
        else {
            return redirect()->back()->with('message', 'Current Password Incorrect');
        }
    }


    // services section

    public function nin(){
        return view('front.nin');
    }

    public function tin(){
        return view('front.tin');
    }

    public function mobile_data(){
        return view('front.mobiledata');
    }

    public function sme(){
        return view('front.sme');
    }

    public function electricity(){
        return view('front.electricity');
    }
    public function bills(){
        return view('front.bills');
    }
}
