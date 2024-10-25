<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Employer::class);
        return view('employer.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Employer::class);
        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')
            ->with('success', 'Your employer account was created!');
    }
}