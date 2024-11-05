<?php

namespace App\Http\Controllers;

use App\Tickets;
use App\Uploads;
use App\Issues;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Mail;

class TicketsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Supervisor/Manager') {
        $tickets = Tickets::select('tickets.*', 'users.name as raised_by_name', 'agent_users.name as agent_name', 'issues.type')->leftJoin('users', 'tickets.raised_by', '=', 'users.id')->leftJoin('issues', 'tickets.issue_type', '=', 'issues.id')->leftJoin('users as agent_users', 'tickets.agent', '=', 'agent_users.id')->get();
        } else {
            $tickets = Tickets::select('tickets.*', 'users.name as raised_by_name', 'agent_users.name as agent_name', 'issues.type')->leftJoin('users', 'tickets.raised_by', '=', 'users.id')->leftJoin('issues', 'tickets.issue_type', '=', 'issues.id')->leftJoin('users as agent_users', 'tickets.agent', '=', 'agent_users.id')->where('tickets.agent', Auth::user()->id)->get();
        }
        $openTicketCount = Tickets::where('status', 'Open')->count();
        $resolvedTicktCount = Tickets::where('status', 'Closed')->count();
        return view('tickets', compact('tickets'), ['openTicketCount' => $openTicketCount, 'resolvedTicktCount' => $resolvedTicktCount]);
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
            $attachmentsPath = public_path().'/attachments/'.$ticket->slug.'/';
            if (!File::exists($attachmentsPath)) {
                File::makeDirectory($attachmentsPath, 0755, true);  // Permissions and recursive set to true
            }
            $file = $request->file('upload');
            $filename = $file->getClientOriginalName();
            $uploads = new Uploads;
            $uploads->slug = $ticket->slug;
            $uploads->filename = $filename;
            $uploads->path = $attachmentsPath;
            $file->move($attachmentsPath, $filename);
            $uploads->uploaded_by = Auth::user()->id;
            $uploads->save();
        }

        $data = array(
            'slug' => $ticket->slug
        );

        $users = User::where('role', 'Administrator')->where('role', 'Supervisor/Manager')->get();

        foreach($users as $user) {
            $mail = Mail::send('email.leadnote', $data, function ($message) {
    
                $subj = 'New Ticket has been generated';
                $sendto = $user->email;
    
                $message->to($sendto, $subj)->subject($subj);
                $message->from('no-reply@helpdesk.com', 'Admin');
            });
        }

        return ($ticket) ? redirect('tickets')->with('success', 'Ticket Created Successfully') :
                            redirect('tickets')->with('error', 'Something went wrong');
    }

    public function view($slug, Request $request)
    {
        $ticket = Tickets::where('slug', $slug)->first();
        $issues = Issues::where('status', '1')->pluck('type', 'id');
        $agents = User::where('role', 'HelpDesk Agent')->where('status', '1')->pluck('name', 'id')->prepend('-- Select Agent --', '');
        $uploads = Uploads::select('uploads.*', 'users.name')->leftJoin('users', 'uploads.uploaded_by', '=', 'users.id')->where('uploads.slug', $slug)->get();
        $assignedAgent = Auth::user()->name;
        return view('view-ticket', ['ticket' => $ticket, 'assignedAgent' => $assignedAgent], compact('issues', 'agents', 'uploads'));
    }

    public function download($filename, $slug)
    {
        $file = Uploads::where('filename', $filename)->where('slug', $slug)->first();
        $path = $file->path . $filename;
        $path = str_replace('\\', '/', $path);
        // dd($path);
        \Log::info($path);

        return response()->download($path);
    }

    public function update($slug, Request $request)
    {
        $ticket = Tickets::where('slug', $slug)->first();
        $user = Auth::user()->id;
        $name = Auth::user()->name;

        if (!empty($request->input('note'))) {

            $note = str_replace('{', '|', $request->input('note'));
            $note = str_replace('}', '|', $request->input('note'));
            $note = str_replace('[', '|', $request->input('note'));
            $note = str_replace(']', '|', $request->input('note'));
            $note = "{[" . $name . "][" . $request->input('note') . "][" . date('Y-m-d') . " " . date('H:i:s') . "]}" . $ticket->notes;

        } else {
            $note = $ticket->notes;
        }

        $ticket->notes = $note;
        $ticket->status = $request->status;
        if($request->status == 'In-Progress') {
            $ticket->in_progress_time = now();
        }
        if($request->status == 'Closed') {
            $ticket->closed_time = now();
        }
        $ticket->issue_type = $request->issue_type;
        $ticket->urgency = $request->urgency;
        $ticket->save();

        return ($ticket) ? back()->with('success', 'Ticket has been updated') :
                            back()->with('error', 'Something went wrong');
    }

    public function deletecomment($slug, Request $request)
    {
        $ticket = Tickets::where('slug', $slug)->first();
        $delete = request('note');

        $comments = str_replace("\n", "&space;", $ticket->notes);
        $comments = str_replace(array("\r", "\n"), '', $comments);
        $delete = str_replace("<br>", "&space;", $delete);
        $delete = str_replace(array("\r", "\n"), '', $delete);
        $newcomment = str_replace($delete, "", $comments);
        $newcomment = str_replace('&space;', "\n", $newcomment);

        $ticket->notes = $newcomment;
        $ticket->save();

        return response()->json($ticket);
    }

    public function assign_agent($slug, Request $request)
    {
        $ticket = Tickets::where('slug', $slug)->first();
        $ticket->agent = request('agent');
        $ticket->save();

        return response()->json($ticket);
    }

}
