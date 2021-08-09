<?php

namespace App\Http\Controllers\OneStopService_Child;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\OfferedCandidate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class BiometricController extends Controller
{
    public function required(){
        $offeredCandidates = OfferedCandidate::where('result_status', 'Recommended')
                                             ->where('selected_osc_id', Auth::user()->id)
                                             ->orderBy('id','DESC')->get();
        return view('OneStopService_Child.biometric.required', compact('offeredCandidates'));
    }

    public function completed(){
        return view('OneStopService_Child.biometric.completed');
    }

    public function showPaidCandidateProfile($offered_candidate_id){
        $offeredCandidate = OfferedCandidate::findOrFail($offered_candidate_id);
        return view('OneStopService_Child.biometric.show-paid-candidate-profile', compact('offeredCandidate'));
    }

    public function uploadBiometric($offered_candidate_id){
        $offeredCandidate = OfferedCandidate::findOrFail($offered_candidate_id);
        return view('OneStopService_Child.biometric.upload-biometric', compact('offeredCandidate'));
    }

    public function uploadBiometricStore(Request $request, $offered_candidate_id)
    {
        $offeredCandidate = OfferedCandidate::findOrFail($offered_candidate_id);
        $offeredCandidate->result_status = 'Bio-Completed';
        $offeredCandidate->biometric_fee = $request->biometricFees;
        $offeredCandidate->bio_status = 'Success';

        if ($request->hasFile('biometric')) {
            $image             = $request->file('biometric');
            $folder_path       = 'uploads/biometric/';
            $image_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path . $image_new_name);
            $offeredCandidate->bio_report   = $folder_path . $image_new_name;
        }
        try {
            $offeredCandidate->save();
            return back()->withToastSuccess('Successfully saved.');
        } catch (\Exception $exception) {
            return back()->withErrors('Something going wrong. ' . $exception->getMessage());
        }
    }



}
