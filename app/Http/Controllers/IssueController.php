<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $issues = Issue::latest()->paginate(50);
        return view('issues.index', compact('issues'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'sku' => 'required',
            'issue' => 'required',
            'name' => 'nullable',
            'phone' => 'nullable',
            'platform' => 'required'
        ]);
        Issue::create($attributes);
        return redirect()->route('issues.index');
    }

    public function update(Issue $issue)
    {
        $issue->closed = !$issue->closed;
        $issue->save();
        return redirect()->route('issues.index');
    }
}
