<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\otpModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Brian2694\Toastr\Facades\Toastr;

use DB;
//use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
        ]);

        DB::beginTransaction();
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();
            return redirect()->back()->with('status', 'Register successfully');
        }
        catch(\Exception $error)
        {
            DB::rollback();
            return redirect()->back()->with('status', 'Register Failed');
        }
    }

    public function handlelogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);


        DB::beginTransaction();
        try
        {
            $credetials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            DB::commit();
            if (Auth::attempt($credetials))
            {
                $user = user::where('email', $request->email)->first();

                $otp = new otpModel;
                $otp->user_id = $user->id;
                $otp->otp = random_int(100000, 999999);
                $otp->save();
                // $request->session()->put('sessionotp', $otp->otp);
                return view('otp_view', ['otp' => $otp->otp]);
            }
        }
        catch(\Exception $error)
        {
            DB::rollback();
            return redirect()->back()->with('status', 'Error Email or Password');
        }


    }



    public function login()
    {
        echo 'Welcome to login page';
        return view('login');
    }

    public function handleOtp(Request $request)
    {
        $auth_user = auth()->user();
        $latest_otp = $auth_user->latestOtp();

        $user_otp = $request->otp;
        $createdTime = $latest_otp->created_at; // Replace with your created time

        $currentDateTime = Carbon::now();
        $createdDateTime = Carbon::parse($createdTime);

        if ($createdDateTime->diffInMinutes($currentDateTime) <= 10)
        {
            if($user_otp != NULL && $user_otp == $latest_otp->otp)
             {
                //  $latest_otp->update(['status' => 'verified']); // Update using Eloquent
                 $latest_otp->status = 'verified';
                 $latest_otp->save();
                 session(['isOtpVerified' => 'verified']);
                return redirect()->route('home');
             }
             else
             {
                Auth::logout();
                return redirect()->route('login');
             }
        }
        else
        {
            Auth::logout();
            return redirect()->route('login');
        }

             //return $otpData->otp;
        //$user = otpModel::where('email', '=',)
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('/');
    }
}
