<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Job::class, 'my_job');
    }

    public function index()
    {
        return view(
            'my_job.index',
            [
                'jobs' => auth()->user()->employer->jobs()->with('employer')->get()
            ]
        );
    }

    public function create()
    {
        return view('my_job.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ]);

        $job = $request->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }

    public function edit(Job $myJob)
    {
        return view('my_job.edit', ['job' => $myJob]);
    }

    public function update(Request $request, Job $myJob)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ]);

        $myJob->update($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted successfully.');
    }
}