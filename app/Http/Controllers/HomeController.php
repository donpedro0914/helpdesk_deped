<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Tickets;
use App\Issues;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        if(Auth::user()->role == 'Administrator') {
            $allTickets = Tickets::count();
            $openTickets = Tickets::where('status', 'Open')->count();
            $progressTickets = Tickets::where('status', 'In-Progress')->count();
            $closedTickets = Tickets::where('status', 'Closed')->count();
        }

        if(Auth::user()->role == 'HelpDesk Agent') {
            $allTickets = Tickets::where('agent', Auth::user()->id)->count();
            $openTickets = Tickets::where('agent', Auth::user()->id)->where('status', 'Open')->count();
            $progressTickets = Tickets::where('agent', Auth::user()->id)->where('status', 'In-Progress')->count();
            $closedTickets = Tickets::where('agent', Auth::user()->id)->where('status', 'Closed')->count();
        }

        $month = Carbon::now()->format('F');
        $days = [];
        $allTicketsChart = [];
        $date = date('d');
        for($i=1; $i<=$date; $i++) {
            $days[] = $i;
            $allTicketsChart[] = Tickets::whereDay('created_at', '=', $i)->whereMonth('created_at', date('m'))->count();
        }

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels($days)
        ->datasets([
            [
                "label" => "Raised Tickets",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $allTicketsChart,
            ]
        ])
        ->options([]);

        $issues = Issues::select('type', 'id')->where('status', 1)->get();

        $issueLabels = [];
        $ticketCount = [];
        $backgroundColors = [];

        foreach($issues as $issue)
        {
            $issueLabels[] = $issue->type;
            $count = Tickets::where('issue_type', $issue->id)->count();
            $ticketCount[] = $count > 0 ? $count : 0;
            $backgroundColors[] = sprintf(
                'rgba(%d, %d, %d, 0.7)',
                rand(0, 255),
                rand(0, 255),
                rand(0, 255)
            );
        }

        // dd($ticketCount);

        $pie = app()->chartjs
        ->name('pieChart')
        ->type('pie')
        ->size(['width' => 400, 'height' => 400])
        ->labels($issueLabels)
        ->datasets([
            [
                "label" => "Issue Types",
                'backgroundColor' => $backgroundColors, // Apply dynamic colors
                'borderColor' => "#fff",
                'data' => $ticketCount,
            ]
        ])
        ->options([]);

        return view('dashboard', compact('chartjs', 'pie'), ['allTickets' => $allTickets, 'openTickets' => $openTickets, 'progressTickets' => $progressTickets, 'closedTickets' => $closedTickets, 'month' => $month]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $numericId = ltrim($query, '0');
        $results = Tickets::where('subject', 'LIKE', "%{$query}%") // Adjust the 'name' field to your needs
        ->orWhere('details', 'LIKE', "%{$query}%")
        ->orWhere('id', $numericId)
                             ->limit(5) // Limit results for performance
                             ->get();

        return response()->json($results);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
