<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MyJobCvController extends Controller
{
    public function show(JobApplication $jobApplication)
    {
        $this->authorize('downloadCv', $jobApplication->job);
        $path = $jobApplication->cv_path;

        if (!Storage::disk('private')->exists($path)) {
            abort(Response::HTTP_NOT_FOUND, 'CV not found.');
        }

        $downloadName = 'cv-' . $jobApplication->id . '.pdf';

        return Storage::disk('private')->download($path, $downloadName);
    }
}