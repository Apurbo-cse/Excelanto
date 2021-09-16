<?php

namespace App\Http\Controllers\WelfareCentre;

use App\Http\Controllers\Controller;
use App\MeetAndGreet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  WSC_RegisteredController extends Controller
{
    public function change_visa_request()
    {
        return view('WelfareCentre.WSC_Registered.LegalisationVisaChange.change_visa_request');
    }
    public function change_visa_payment()
    {
        return view('WelfareCentre.WSC_Registered.LegalisationVisaChange.change_visa_payment');
    }
    public function change_visa_paid()
    {
        return view('WelfareCentre.WSC_Registered.LegalisationVisaChange.change_visa_paid');
    }
    public function change_visa_delivery()
    {
        return view('WelfareCentre.WSC_Registered.LegalisationVisaChange.change_visa_delivery');
    }

    public function legal_aid_request()
    {
        return view('WelfareCentre.WSC_Registered.legal_aid_request');
    }

    public function new_passport_request()
    {
        return view('WelfareCentre.WSC_Registered.passportNew.new_passport_request');
    }
    public function new_passport_payment()
    {
        return view('WelfareCentre.WSC_Registered.passportNew.new_passport_payment');
    }
    public function new_passport_status()
    {
        return view('WelfareCentre.WSC_Registered.passportNew.new_passport_status');
    }
    public function new_passport_delivery()
    {
        return view('WelfareCentre.WSC_Registered.passportNew.new_passport_delivery');
    }

    public function lost_passport_request()
    {
        return view('WelfareCentre.WSC_Registered.passportLost.lost_passport_request');
    }
    public function lost_passport_payment()
    {
        return view('WelfareCentre.WSC_Registered.passportLost.lost_passport_payment');
    }
    public function lost_passport_status()
    {
        return view('WelfareCentre.WSC_Registered.passportLost.lost_passport_status');
    }
    public function lost_passport_delivery()
    {
        return view('WelfareCentre.WSC_Registered.passportLost.lost_passport_delivery');
    }

    public function renew_passport_request()
    {
        return view('WelfareCentre.WSC_Registered.passportRenew.renew_passport_request');
    }
    public function renew_passport_payment()
    {
        return view('WelfareCentre.WSC_Registered.passportRenew.renew_passport_payment');
    }
    public function renew_passport_status()
    {
        return view('WelfareCentre.WSC_Registered.passportRenew.renew_passport_status');
    }
    public function renew_passport_delivery()
    {
        return view('WelfareCentre.WSC_Registered.passportRenew.renew_passport_delivery');
    }
}
