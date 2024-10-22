<?php

namespace App\Http\Controllers;

use App\Tickets;
use App\Uploads;
use App\Issues;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;

class TicketsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $tickets = Tickets::all();
        $tickets = Tickets::select('tickets.*', 'users.name', 'issues.type')->leftJoin('users', 'tickets.raised_by', '=', 'users.id')->leftJoin('issues', 'tickets.issue_type', '=', 'issues.id')->get();
        return view('tickets', compact('tickets'));
    }

    public function create()
    {
        $issue_types = Issues::where('status', '1')->get();
        return view('add-ticket', compact('issue_types'));
    }

    public function store(Request $request)
    {
        // dd($request->file('upload'));
        $ticket = new Tickets;

        $ticket->slug = str_random(25);
        $ticket->subject = $request->subject;
        $ticket->issue_type = $request->issue_type;
        $ticket->urgency = $request->urgency;
        $ticket->details = $request->details;
        $ticket->raised_by = Auth::user()->id;
        $ticket->status = "Open";
        $ticket->save();

        if($request->hasFile('upload')) {
            $attachmentsPath = public_path('storage/attachments');
            if (!File::exists($attachmentsPath)) {
                File::makeDirectory($attachmentsPath, 0755, true);  // Permissions and recursive set to true
            }

            $filePath = $request->file('upload')->store('attachments', 'public');
            $file = $request->file('upload');
            $filename = time().$file->getClientOriginalName();
            $uploads = new Uploads;
            $uploads->slug = $ticket->slug;
            $uploads->filename = $filename;
            $uploads->path = $filePath;
            $file->move($filePath, $filename);
            $uploads->uploaded_by = Auth::user()->id;
            $uploads->save();
        }

        return ($ticket) ? redirect('tickets')->with('success', 'Ticket Created Successfully') :
                            redirect('tickets')->with('error', 'Something went wrong');
    }

    public function view($slug, Request $request)
    {
        $ticket = Tickets::where('slug', $slug)->first();
        $issues = Issues::where('status', '1')->pluck('type', 'id');
        $agents = User::where('role', 'HelpDesk Agent')->where('status', '1')->pluck('name', 'id');
        return view('view-ticket', ['ticket' => $ticket], compact('issues', 'agents'));
    }

}
