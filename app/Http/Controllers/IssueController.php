<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if ($query = request()->search) {
            $issues = Issue::where('sku', 'LIKE', '%' . $query . '%')
                ->orWhere('name', 'LIKE', '%' . $query . '%')
                ->orWhere('order_id', 'LIKE', '%' . $query . '%')
                ->orWhere('phone', 'LIKE', '%' . $query . '%')
                ->with('images')
                ->with('comments')
                ->latest()
                ->paginate(25);
        } else {
            $issues = Issue::with('images')->with('comments')->latest()->paginate(25);
        }

        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        return view('issues.create');
    }

    public function store()
    {
        request()->validate([
            'sku' => 'required|exists:products,sku',
            'issue' => 'required',
            'name' => 'nullable',
            'phone' => 'nullable',
            'order_id' => 'nullable',
            'images' => 'nullable',
            'images.*' => 'mimes:jpeg,png|max:10240'
        ]);
        $issue = auth()->user()->issues()->create(request()->only(['sku', 'issue', 'name', 'phone', 'order_id']));

        if (request('images')) {
            foreach (request('images') as $image) {
                $path = Storage::putFile('images/issues', new File($image));
                $issue->images()->create(['source' => $path]);
            }
        }
        return redirect()->route('issues.index');
    }

    public function update(Issue $issue)
    {
        $issue->closed = !$issue->closed;
        $issue->save();
        if (request()->search) {
            return redirect()->route('issues.index', ['search' => request()->search]);
        }

        return redirect()->route('issues.index');
    }
}
