<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo;

    public function redirectTo()
    {
        if (Auth::user()->user_type == 'super-admin') {
            return RouteServiceProvider::SuperAdmin;
        } elseif (Auth::user()->user_type == 'employer-company') {
            return RouteServiceProvider::EmployerCompany;
        } elseif (Auth::user()->user_type == 'welfare-service-center-company') {
            return RouteServiceProvider::WelfareCentre;
        } elseif (Auth::user()->user_type == 'bangladeshi-embassy') {
            return RouteServiceProvider::BangladeshEmbassy;
        } elseif (Auth::user()->user_type == 'uae-admin') {
            return RouteServiceProvider::UAEAdmin;
        } elseif (Auth::user()->user_type == 'master-one-stop-service') {
            return RouteServiceProvider::OneStopService;
        } elseif (Auth::user()->user_type == 'child-one-stop-service') {
            return RouteServiceProvider::OneStopService_Child;
        } elseif (Auth::user()->user_type == 'travel-agency') {
            return RouteServiceProvider::TravelAgency;
        } elseif (Auth::user()->user_type == 'biometric-agencies') {
            return RouteServiceProvider::BiometricAgencies;
        } elseif (Auth::user()->user_type == 'candidate') {
            return RouteServiceProvider::Candidate;
        } elseif (Auth::user()->user_type == 'uae-embassy') {
            return RouteServiceProvider::UaeEmbassy;
        } elseif (Auth::user()->user_type == 'medical-agency') {
            return RouteServiceProvider::MedicalAgency;
        } elseif (Auth::user()->user_type == 'training-agency') {
            return RouteServiceProvider::TrainingAgency;
        } elseif (Auth::user()->user_type == 'travel-company') {
            //return route('.dashboard');
        } elseif (Auth::user()->user_type == 'biometric-company') {
            //return route('.dashboard');
        } elseif (Auth::user()->user_type == 'recruiting-agency') {
            return RouteServiceProvider::RecruitingAgency;
        } elseif (Auth::user()->user_type == 'bangladeshi-admin') {
            //return route('BangladeshAdmin.dashboard');
        } elseif (Auth::user()->user_type == 'employer') {
            //return route('.dashboard');
        } else {
            return route('register');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'country' => 'required',
            'role' => 'required',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $userType = "";
        if ($data['role'] == 1) {
            $userType = "super-admin";
        }elseif ($data['role'] == 2){
            $userType = "employer-company";
        }elseif ($data['role'] == 3){

            $userType = "welfare-service-center-company";
        } elseif ($data['role'] == 4) {
            $userType = "bangladeshi-embassy";
        } elseif ($data['role'] == 5) {
            $userType = "master-one-stop-service";
        } elseif ($data['role'] == 6) {
            $userType = "child-one-stop-service";
        } elseif ($data['role'] == 7) {
            $userType = "medical-company";
        } elseif ($data['role'] == 8) {
            $userType = "training-company";
        } elseif ($data['role'] == 9) {
            $userType = "travel-company";
        } elseif ($data['role'] == 10) {
            $userType = "biometric-company";
        } elseif ($data['role'] == 11) {
            $userType = "recruiting-agency";
        } elseif ($data['role'] == 12) {
            $userType = "bangladeshi-admin";
        } elseif ($data['role'] == 13) {
            $userType = "employer";
        } elseif ($data['role'] == 14) {
            $userType = "uae-admin";
        } elseif ($data['role'] == 15) {
            $userType = "";
        } else {
            echo "some this wrong";
        }

        //$user = new User();

        //dd($data['name']." ".$data['email']." ".$data['password']." ".$data['role']." ".$userType." ".$data['country']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role'],
            'user_type' => $userType,
            'active_status' => "New",
            'country_id' => $data['country'],
        ]);
    }
    public function showRegistrationForm(){
        $countries=Country::where('status','active')->orderBy('id','DESC')->get();
        $roles=Role::where('status','active')->orderBy('id','DESC')->get();
        return view('auth.register', compact('countries','roles'));
    }
}
