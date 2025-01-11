<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function SignIn()
    {
        return view('signin');
    }

    public function LoginAdmin(Request $request)
    {



        // Validate input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to login user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the logged-in user has the role 'admin'
            if (Auth::user()->role === 'supperadmin' ) {
                // Redirect to admin dashboard
                $notification = array(
                    'message' => 'Super Admin Login Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->route('dashboard')->with($notification);
            }
            else{
                $notification = array(
                    'message' => 'Login Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->route('userss')->with($notification);

            }

            // If role is not admin, log out and return error
            Auth::logout();
            return back()->withErrors([
                'email' => 'Access denied. You do not have admin privileges.',
            ])->withInput($request->except('password'));
        }

        // Login failed, redirect back with error message
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput($request->except('password'));
    }

    public function Dashboard()
    {
        return view('index');

    }

    function AddUser()
    {
        return view('adduser');
    }

    function ViewCustomer()
    {
        $users = User::with('userDetail')->where('role',  'customer')->get();
        return view('view_customer', compact('users'));
    }

    function ViewAdmin()
    {
        $users = User::with('userDetail')->where('role',  'admin')->get();
        return view('view_admin', compact('users'));
    }

    function viewEmployee()
    {
        $users = User::with('userDetail')->where('role',  'employee')->get();
        return view('view_admin', compact('users'));
    }

    function StoreUser(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'email' => 'required|email|unique:users,email',
        //     'account_owner' => 'required|string|max:255',
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'suite' => 'nullable|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'zipcode' => 'required|numeric',
        //     'country' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'cell_phone_number' => 'required|string|max:20',
        //     'website_url' => 'nullable|string|max:255|url',
        //     'fax' => 'nullable|string|max:20',
        //     'description' => 'required|string|max:500',
        // ]);

        $password = Str::random(10);

        $getuser_id = User::insertGetId([
            'name' => $request->account_owner,
            'email' => $request->email,
            'role' => 'customer',
            'password' => Hash::make($password),
            'status' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        UserDetail::insert([
            'user_id' => $getuser_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'suite' => $request->suite,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'phone' => $request->phone,
            'cell_phone_number' => $request->cell_phone_number,
            'website_url' => $request->website_url,
            'fax' => $request->fax,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Send email to the new user with their credentials
        // $email = $request->email;
        // $data = [
        //     'email' => $email,
        //     'password' => $password,
        //     'name' => $request->account_owner,
        // ];

        // Mail::send('emails.user_credentials', $data, function ($message) use ($email) {
        //     $message->to($email)
        //         ->subject('Your Account Credentials');
        // });

        $notification = [
            'message' => 'New Customer Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.user')->with($notification);
    }

    public function ListUser()
    {
        $users = User::with('userDetail')->get();
        return view('userslist', compact('users'));
    }

    public function EditUser($id)
    {
        $user = User::with('userDetail')->findOrFail($id);
        // dd($user);
        return view('useredit', compact('user'));
    }



    public function UpdateUser(Request $request, $id)
    {
        // Validate the incoming request
        // $request->validate([
        //     'email' => 'required|email|unique:users,email,' . $id, // Ignore current user's email
        //     'account_owner' => 'required|string|max:255',
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'suite' => 'nullable|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'zipcode' => 'required|numeric',
        //     'country' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'cell_phone_number' => 'required|string|max:20',
        //     'website_url' => 'nullable|string|max:255|url',
        //     'fax' => 'nullable|string|max:20',
        //     'description' => 'required|string|max:500',
        // ]);

        // Find the existing user and update their information
        $user = User::findOrFail($id);

        // Update user's general details
        $user->update([
            'name' => $request->account_owner,
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);

        // Update user details in the UserDetail table
        $userDetail = UserDetail::where('user_id', $id)->first();

        if ($userDetail) {
            $userDetail->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'suite' => $request->suite,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'phone' => $request->phone,
                'cell_phone_number' => $request->cell_phone_number,
                'website_url' => $request->website_url,
                'fax' => $request->fax,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            // If no user detail exists, create it
            UserDetail::create([
                'user_id' => $id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'suite' => $request->suite,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'phone' => $request->phone,
                'cell_phone_number' => $request->cell_phone_number,
                'website_url' => $request->website_url,
                'fax' => $request->fax,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'User updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.user')->with($notification);
    }



    public function DeleteUser($id)
    {
        $user = User::findOrFail($id);

        $userDetail = UserDetail::where('user_id', $id)->first();

        if ($userDetail) {
            $userDetail->delete();
        }

        $user->delete();

        $notification = [
            'message' => 'User and associated details deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.user')->with($notification);
    }

    public function LoginUser()
    {
        return view('user.login_user');

    }

    public function LoginUserStore(Request $request)
    {
        // Validate input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to login user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the logged-in user

            // Check if status is 0
            if ($user->status === 0) {
                // Redirect to the set password page with the user's ID
                return redirect()->route('set.password', ['id' => $user->id])
                                ->with('info', 'Please set your new password.');
            }

            // Check if the logged-in user has the role 'user'
            if ($user->role === 'user') {
                // Redirect to user dashboard
                return redirect()->route('dashboard')->with('success', 'Login successful!');
            }

            // If role is not 'user', log out and return an error message
            Auth::logout();
            return back()->withErrors([
                'email' => 'Access denied. Only users can log in.',
            ])->withInput($request->except('password'));
        }

        // Login failed, redirect back with error message
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput($request->except('password'));
    }


    public function SetPassword($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user to the view
        return view('user.set_password', ['user' => $user]);
    }


    public function UpdatePassword(Request $request, $id)
    {
        // Validate password fields
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        // Find the user and update the password
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password); // Encrypt the password
        $user->status = 1; // Update the status to active
        $user->save();

        return redirect()->route('login.user')->with('success', 'Password updated successfully!');
    }


    // Route For Supplier

    public function AddEmployee()
    {
        return view('addemployee');
    }


    function StoreEmployee(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'email' => 'required|email|unique:users,email',
        //     'account_owner' => 'required|string|max:255',
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'suite' => 'nullable|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'zipcode' => 'required|numeric',
        //     'country' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'cell_phone_number' => 'required|string|max:20',
        //     'website_url' => 'nullable|string|max:255|url',
        //     'fax' => 'nullable|string|max:20',
        //     'description' => 'required|string|max:500',
        // ]);

        $password = Str::random(10);

        $getuser_id = User::insertGetId([
            'name' => $request->account_owner,
            'email' => $request->email,
            'role' => 'supplier',
            'password' => Hash::make($password),
            'status' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        UserDetail::insert([
            'user_id' => $getuser_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'suite' => $request->suite,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'phone' => $request->phone,
            'cell_phone_number' => $request->cell_phone_number,
            'website_url' => $request->website_url,
            'fax' => $request->fax,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Send email to the new user with their credentials
        // $email = $request->email;
        // $data = [
        //     'email' => $email,
        //     'password' => $password,
        //     'name' => $request->account_owner,
        // ];

        // Mail::send('emails.user_credentials', $data, function ($message) use ($email) {
        //     $message->to($email)
        //         ->subject('Your Account Credentials');
        // });

        $notification = [
            'message' => 'New Supplier Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.user')->with($notification);
    }

    public function AddAdmin()
    {
        return view('addadmin');
    }


    function StoreAdmin(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'email' => 'required|email|unique:users,email',
        //     'account_owner' => 'required|string|max:255',
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'suite' => 'nullable|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'zipcode' => 'required|numeric',
        //     'country' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'cell_phone_number' => 'required|string|max:20',
        //     'website_url' => 'nullable|string|max:255|url',
        //     'fax' => 'nullable|string|max:20',
        //     'description' => 'required|string|max:500',
        // ]);

        $password = Str::random(10);

        $getuser_id = User::insertGetId([
            'name' => $request->account_owner,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($password),
            'status' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        UserDetail::insert([
            'user_id' => $getuser_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'suite' => $request->suite,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'phone' => $request->phone,
            'cell_phone_number' => $request->cell_phone_number,
            'website_url' => $request->website_url,
            'fax' => $request->fax,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Send email to the new user with their credentials
        // $email = $request->email;
        // $data = [
        //     'email' => $email,
        //     'password' => $password,
        //     'name' => $request->account_owner,
        // ];

        // Mail::send('emails.user_credentials', $data, function ($message) use ($email) {
        //     $message->to($email)
        //         ->subject('Your Account Credentials');
        // });

        $notification = [
            'message' => 'New Admin Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('list.user')->with($notification);
    }


    public function updateStatus(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
        ]);

        $user = User::find($request->user_id);
        $user->status = $request->status;

        if ($user->save()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }



}
