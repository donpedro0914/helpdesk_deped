<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Campaigns;
use App\JobFile;
use App\User;
use App\Notifications;
use App\Uploads;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

}
