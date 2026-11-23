<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::where('is_active', 1)->orderBy('id', 'DESC')->get();
        $works = Work::with('workImages')->where('is_active', 1)->orderBy('id', 'DESC')->paginate(4);
        $teams = Team::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
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
    public function services()
    {
        $services = Service::where('is_active', 1)->get();
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('services_page')->with([
            'services' => $services,
            'certificates' => $certificates,
            'equipments' => $equipments
        ]);
    }
    public function projects()

    {
        $works = Work::with('workImages')->where('is_active', 1)->get();
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('projects_page')->with([
            'works' => $works,
            'certificates' => $certificates,
            'equipments' => $equipments
        ]);
    }
    public function hardware()
    {
        $equipments  = Equipment::where('is_active', 1)->get();
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $customers = Customer::where('is_active', 1)->get();
        return view('hardware_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
            'customers' => $customers
        ]);
    }
    public function ourExpertise()
    {
        $certificates = Certificate::where('is_active', 1)->get();
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('our-expertise_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
        ]);
    }
    public function testimonial()
    {
        $customers  = Customer::where('is_active', 1)->get();
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('testimonial_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
            'customers' => $customers,
        ]);
    }
    public function team()
    {
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $teams = Team::where('is_active', 1)->get();
        return view('team_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
            'teams' => $teams,
        ]);
    }
    public function about()
    {
        $teams = Team::where('is_active', 1)->get();
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('about_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
            "teams" => $teams,
        ]);
    }

    public function showSingleProject($id)
    {
        
         $work = Work::with('workImages')->find($id);
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('single_project')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
            'work'=>$work

        ]);
       
    }
}
