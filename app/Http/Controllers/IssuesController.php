<?php

namespace App\Http\Controllers;

use App\Issues;
use Illuminate\Http\Request;
use DB;

class IssuesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkissue(Request $request)
    {
        $checkissue = Issues::where('type', request('type'))->first();

        if($checkissue) {
            return response()->json($checkissue);
        }
    }

    public function index()
    {
        $issues = Issues::get();
        return view('admin.issue', compact('issues'));
    }

    public function store(Request $request)
    {
        $issue = new Issues;
        $issue->type = $request->type;
        $issue->save();

        return ($issue) ? back()->with('success', 'Issue Type Successfuly Added') :
                            back()->with('error', 'Something went wrong');
    }

    public function edit($id, Request $request)
    {
        $issue = Issues::findOrFail($id);
        return view('admin.edit.issue_type', ['issue' => $issue]);
    }

    public function update($id, Request $request)
    {
        $issue = Issues::findOrFail($id);
        $issue->type = $request->type;
        $issue->status = $request->status;
        $issue->save();

        return ($issue) ? redirect('admin/issue/type')->with('success', 'Issue Type Updated') :
                            redirect('admin/issue/type')->with('error', 'Something went wrong');

    }
}
