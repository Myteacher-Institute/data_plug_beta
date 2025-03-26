<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnterResult;
use Illuminate\Http\Request;
use App\Models\NINServices;
use App\Models\NINServicesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NINController extends Controller
{
    //
    public function services() {
        $services = NINServices::all();
        return view('admin.services', ['services' => $services]);
    }

    public function view_service_requests($slug) {
        $service_requests = NINServicesRequest::where('service_type', $slug)->where('status',0)->orderBy('id','DESC')->get();
        return view('admin.service_requests', ['service_requests' => $service_requests]);
    }

    public function view_service_request_history($slug) {
        $service_requests = NINServicesRequest::where('service_type', $slug)->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.service_request_history', ['service_requests' => $service_requests]);
    }
    public function view_all_service_request_history() {
        $service_requests = NINServicesRequest::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.service_request_history', ['service_requests' => $service_requests]);
    }

    public function view_service_requests_enter_result($id) {
        $service_request = NINServicesRequest::find($id);
        return view('admin.enter_service_result', ['service_request' => $service_request]);
    }

    public function view_service_requests_store_result(Request $request) {
        $validator = Validator::make($request->all(), [
            'link' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'PDF Link Is Are Required');
        }

        $nin_service_request = NINServicesRequest::where('id',$request->request_id)->first();

        $enter_result = new EnterResult;
        $enter_result->user_id = $nin_service_request->user_id;
        $enter_result->link = $request->link;
        $enter_result->request_id = $request->request_id;
        $enter_result->save();

        $nin_service_request->status = 1;
        $nin_service_request->update();

        return redirect()->back()->with('message', 'Request Result Added Successfully');
    }

    public function view_service_requests_update_result($id) {
        $service_request = NINServicesRequest::find($id);
        return view('admin.update_service_result', ['service_request' => $service_request]);
    }

    public function view_service_requests_store_update_result(Request $request) {
        $validator = Validator::make($request->all(), [
            'link' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'PDF Link Is Required');
        }

        $update_result = EnterResult::where('request_id', $request->request_id)->first();
        $update_result->link = $request->link;

        $update_result->update();

        return redirect()->back()->with('message', 'Request PDF Link Updated Successfully');
    }

    public function add_service() {
        return view('admin.add-service');
    }

    public function store_service(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'required',
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'All Fields Are Required');
        }

        $nin_service = new NINServices();
        $nin_service->name = $request->name;
        $nin_service->slug = Str::slug($request->name);
        $nin_service->details = $request->details;
        $nin_service->amount = $request->amount;
        $nin_service->save();

        return redirect()->back()->with('message', 'Service Added Successfully');
    }
    
    public function edit_service($id) {
        $service = NINServices::find($id);

        return view('admin.edit-service', ['service' => $service]);
    }

    public function update_service(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'required',
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
// <<<<<<< HEAD
//             return redirect()->back()->with('message', 'All Fields Are Required');
// =======
            return redirect()->back()->with('error', 'All Fields Are Required');
        }

        $nin_service = NINServices::find($id);
        $nin_service->name = $request->name;
        $nin_service->slug = Str::slug($request->name);
        $nin_service->details = $request->details;
        $nin_service->amount = $request->amount;
        $nin_service->update();

        return redirect('admin/services')->with('message', 'Service Updated Successfully');
    }

    public function delete_service($id) {
        $service = NINServices::find($id);
        $service->delete();

        return redirect()->back()->with('message', 'Service Deleted Successfully');
    }
}
