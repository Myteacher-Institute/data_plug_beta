<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\NINServices;
use App\Models\NINServicesRequest;
use App\Models\Settings;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index() {
        $users = User::where('role',0)->count();
        $nin_services = NINServices::count();
        $nin_service_requests = NINServicesRequest::count();
        $transactions = Transactions::count();

        return view('admin.index',
        [
            'users' => $users,
            'nin_services' => $nin_services,
            'nin_service_requests' => $nin_service_requests,
            'transactions' => $transactions
        ]
    );
    }

    public function users() {
        $users = User::where('role',0)->get();

        return view('admin.users',
        ['users' => $users]
    );
    }

    public function services() {
        $services = NINServices::all();
        return view('admin.services', ['services' => $services]);
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
            return redirect()->back()->with('message', 'All Fields Are Required');
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

    public function profile() {
        $user = User::where('id',Auth::user()->id)->get();
        

        return view('admin.profile',[
            'user' => $user
            ]
    );
    }

    public function update_profile(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Error Updating Admin Profile');
        }

        $admin = User::where('role','1')->first();

        if ($admin->email == $request->email) {
            $admin->update([
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

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }

        return redirect('admin/profile')->with('message', 'Personal Information Updated Successfully');
    }

    public function update_password(Request $request) {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Error With Updating Admin Password');
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

    public function add_help(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'help_video' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'help_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $help = new Help;
        $help->category = $request->category;
        $help->content = $request->content;

        // Handle video upload
        if ($request->hasFile('help_video')) {
            $videoFile = $request->file('help_video');
            $videoFileName = time() . '_' . $videoFile->getClientOriginalName();
            $videoFile->move(public_path('uploads/videos'), $videoFileName);
            $help->video = 'uploads/videos/' . $videoFileName;
        }

        // Handle image upload
        if ($request->hasFile('help_img')) {
            $imageFile = $request->file('help_img');
            $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('uploads/images'), $imageFileName);
            $help->img = 'uploads/images/' . $imageFileName;
        }
        $help->save();

        return redirect()->back()->with('message', 'Help Content Added Successfully');
    }


    public function delete_help(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Category is required');
        }

        $help = Help::where('category', $request->category)->first();

        if (!$help) {
            return redirect()->back()->with('error', 'Help content not found');
        }

        // Delete associated files if they exist
        if ($help->video) {
            $videoPath = public_path('uploads/' . $help->video);
            if (File::exists($videoPath)) {
                File::delete($videoPath);
            }
        }

        if ($help->img) {
            $imagePath = public_path('uploads/' . $help->img);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $help->delete();

        return redirect()->back()->with('message', 'Help content deleted successfully');
    }

    


    public function get_settings() {
        $settings = Settings::where('id','1')->first();
        $helps = Help::all();
        

        return view('admin.settings', [
            'settings' => $settings,
            'helps' => $helps
        ]);
    }

    public function update_settings(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'logo' => 'nullable',
            'favicon' => 'nullable',
            'description' => 'nullable',
            'keywords' => 'nullable'
        ]);

        /* if ($validator->fails()) {
            return redirect()->back()->with('message', 'All Field Are Required');
        } */

        $settings = Settings::where('id','1')->first();

        if ($settings) {
            
            $settings->website_title = $request->title;

            if ($request->hasfile('logo')) {
                $destination = 'uploads/'.$settings->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('logo');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $settings->logo = $filename;
            }

            if ($request->hasfile('favicon')) {
                $destination = 'uploads/'.$settings->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('favicon');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $settings->favicon = $filename;
            }

            $settings->description = $request->description;
            $settings->keywords = $request->keywords;
            $settings->update();

            return redirect('admin/settings')->with('message', 'Settings Updated!');
        } else {
            $settings = new Settings;
            $settings->website_title = $request->title;

            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $settings->logo = $filename;
            }

            if ($request->hasfile('favicon')) {
                $file = $request->file('favicon');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $settings->favicon = $filename;
            }

            $settings->description = $request->description;
            $settings->keywords = $request->keywords;
            $settings->save();

            return redirect('admin/settings')->with('message', 'Settings Added!');
        }
    }


    public function get_transactions() {
        $transactions = Transactions::all();
        $sum = $transactions->sum('amount');
        $average = $transactions->count() > 0 ? $sum / $transactions->count() : 0;
        $percentage = $transactions->count() > 0 ? ($sum / ($transactions->count() * $average)) * 100 : 0;

        $all = Transactions::all()->where('product_name', 'MTN Airtime VTU');
        // $prd = Transactions::where('id',)->get();
        $sum_prd = $all->sum('amount');
        $mtn_sum = $all->count() > 0 ? $sum_prd: 0;



        return view('admin.transactions',[
            'transactions' => $transactions,
            'sum' => $sum,
            'average' => $average,
            'percentage' => $percentage,
            'mtn_sum' => $mtn_sum
        ]);
    }

    public function user_delete(Request $request) {
        $user_id = $request->user_id;
        
        $user = User::find($user_id);
        $user->delete();

        return redirect()->back()->with('message','User Deleted Successfully');
    }


    

    public function api_manegement()
    {
        $allRoutes = $this->getAllRoutes();
        return view('admin.api', compact('allRoutes'));
    }

    public function getAllRoutes() {
    $routes = [];

    // Get all defined routes
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $route) {
        $routeInfo = [
            'method' => implode('|', $route->methods()),
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'action' => $route->getActionName(),
        ];
        $routes[] = $routeInfo;
    }

    return $routes;
    // $allRoutes = getAllRoutes();
}

// In your CMS controller or any other controller
// public function displayRoutes()
// {

//     // You can now use the $allRoutes array to display or manipulate the routes in your CMS.
//     // For example, you can loop through the routes and display them in a table or list.

//     return view('cms.routes',);
// }

// Usage example:
// You can now use the $allRoutes array in your CMS to display or manipulate the routes.
}
