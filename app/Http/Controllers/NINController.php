<?php

namespace App\Http\Controllers;

use App\Models\EnterResult;
use App\Models\NINServices;
use App\Models\NINServicesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NINController extends Controller
{
    public function nin_services(Request $request) {
        $value = $request->input('value');

        // Redirect to another blade file with the value
        return response()->json([
            'redirect_url' => url('display-value?value='.$value)
        ]);
    }

    public function display_value(Request $request)
    {
        $value = $request->query('value');
        $nin_services = NINServices::all();
        
        return view('front.nin-services', [
            'value' => $value,
            'nin_services' => $nin_services
        ]);
    }

    public function nin_retrieval(Request $request) {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nin_number' => 'required|string|min:10',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Fill In All Required Fields');
        }
        

        $nin_service = NINServices::where('slug', $request->service_type)->first();

        if (Auth::user()->balance >= $nin_service->amount) {
            $nin_service_request = new NINServicesRequest();
            $nin_service_request->user_id = Auth::user()->user_id;
            $nin_service_request->service_type = $request->service_type;
            $nin_service_request->firstname = $request->firstname;
            $nin_service_request->lastname = $request->lastname;
            $nin_service_request->middlename = $request->middlename;
            $nin_service_request->email = $request->email;
            $nin_service_request->nin_number = $request->nin_number;
            $nin_service_request->phone_number = $request->phone_number;
            $nin_service_request->tracking_id = $request->tracking_id;
            $nin_service_request->whatsapp_number = $request->whatsapp_number;
            $nin_service_request->dob = $request->dob;
            $nin_service_request->amount = $nin_service->amount;
            $nin_service_request->save();

            Auth::user()->decrement('balance', $nin_service->amount);

            return redirect('/services')->with('message', 'Request Sent Successfully.\nCheck Your Dashboard In 24 Hours');
        }
        else {
            return redirect()->back()->with('message', 'Insufficient Balance');
        }
    }

    public function nin_modification(Request $request) {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nin_number' => 'required|string|min:10',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Fill In All Required Fields');
        }
        

        $nin_service = NINServices::where('slug', $request->service_type)->first();

        if (Auth::user()->balance >= $nin_service->amount) {
            $nin_service_request = new NINServicesRequest();
            $nin_service_request->user_id = Auth::user()->user_id;
            $nin_service_request->service_type = $request->service_type;
            $nin_service_request->firstname = $request->firstname;
            $nin_service_request->new_firstname = $request->new_firstname;
            $nin_service_request->lastname = $request->lastname;
            $nin_service_request->new_lastname = $request->new_lastname;
            $nin_service_request->middlename = $request->middlename;
            $nin_service_request->new_middlename = $request->new_middlename;
            $nin_service_request->email = $request->email;
            $nin_service_request->nin_number = $request->nin_number;
            $nin_service_request->phone_number = $request->phone_number;
            $nin_service_request->tracking_id = $request->tracking_id;
            $nin_service_request->whatsapp_number = $request->whatsapp_number;
            $nin_service_request->dob = $request->dob;
            $nin_service_request->new_dob = $request->new_dob;
            $nin_service_request->amount = $nin_service->amount;
            $nin_service_request->save();

            Auth::user()->decrement('balance', $nin_service->amount);

            return redirect('/services')->with('message', 'Request Sent Successfully.\nCheck Your Dashboard In 24 Hours');
        }
        else {
            return redirect()->back()->with('message', 'Insufficient Balance');
        }
    }

    public function update_request($id) {
        $service_request = NINServicesRequest::find($id);

        return view('front.update_request', ['service_request' => $service_request]);
    }

    public function store_update_request(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nin_number' => 'required|string|min:10',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Fill In All Required Fields');
        }
        

        $service_request = NINServicesRequest::find($id);

        $service_request->firstname = $request->firstname;
        $service_request->new_firstname = $request->new_firstname != null ? $request->new_firstname : '';
        $service_request->lastname = $request->lastname;
        $service_request->new_lastname = $request->new_lastname != null ? $request->new_lastname : '';
        $service_request->middlename = $request->middlename;
        $service_request->new_middlename = $request->new_middlename != null ? $request->new_middlename : '';
        $service_request->email = $request->email;
        $service_request->nin_number = $request->nin_number;
        $service_request->phone_number = $request->phone_number;
        $service_request->tracking_id = $request->tracking_id;
        $service_request->whatsapp_number = $request->whatsapp_number;
        $service_request->dob = $request->dob;
        $service_request->update();

        return redirect()->back()->with('message', 'Request Updated Successfully');
        
    }

    public function check_result($id) {
        $result = EnterResult::where('request_id',$id)->first();
        
        return view('front.check_result', ['result' => $result]); 
    }
}
