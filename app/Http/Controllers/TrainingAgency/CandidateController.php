<?php

namespace App\Http\Controllers\TrainingAgency;

use App\Http\Controllers\Controller;
use App\OfferedCandidate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CandidateController extends Controller
{
    function new () {
        $offeredCandidates = OfferedCandidate::where('post_training_id', Auth::user()->id)->where('result_status', 'Post-Processing')->orderBy('id', 'DESC')->get();
        return view('TrainingAgency.candidate.new', compact('offeredCandidates'));
    }

    public function show($id)
    {
        $offeredCandidate = OfferedCandidate::findOrFail($id);
        return view('TrainingAgency.candidate.show-profile', compact('offeredCandidate'));
    }

    public function post_training_report($id)
    {
        $offeredCandidate = OfferedCandidate::findOrFail($id);

        return view('TrainingAgency.candidate.post_training_report', compact('offeredCandidate'));
    }
    public function add_training_report(Request $request, $id)
    {
        $offeredCandidate = OfferedCandidate::findOrFail($id);
        $offeredCandidate->post_training_status = $request->post_training_status;
        $offeredCandidate->post_training_comments = $request->post_training_comments;

        if ($request->hasFile('post_training_report')) {
            $image = $request->file('post_training_report');
            $folder_path = 'uploads/candidate/post_training_report/';
            $image_new_name = Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path . $image_new_name);
            $offeredCandidate->post_training_report = $folder_path . $image_new_name;
        }

        try {
            $offeredCandidate->save();
            return back()->withToastSuccess('Successfully saved.');
        } catch (\Exception $exception) {
            return back()->withErrors('Something going wrong. ' . $exception->getMessage());
        }
    }

    public function reported()
    {
        $offeredCandidates = OfferedCandidate::where('post_training_status', '!=', 'New')->where('post_training_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('TrainingAgency.candidate.reported', compact('offeredCandidates'));
    }
}
