<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Issue;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Issue $issue)
    {
        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $issue->comments()->create(['body' => $attributes['body'], 'name' => auth()->user()->name]);

        if (request()->search) {
            return redirect()->route('issues.index', ['search' => request()->search]);
        }
        return redirect()->route('issues.index');
    }
}
