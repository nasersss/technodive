<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::where('is_active', 1)->orderBy('id', 'DESC')->paginate(3);
        $works = Work::with('workImages')->where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        $teams = Team::where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        $customers = Customer::where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        return view('index')->with([
            "services" => $services,
            "works" => $works,
            "equipments" => $equipments,
            "teams" => $teams,
            "customers" => $customers,
            "certificates" => $certificates,


        ]);
    }
}
