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
    public function services()
    {
        $services = Service::where('is_active',1)->get();
        return view('services_page')->with('services',$services);

    }
    public function projects()
    
    {
        $works = Work::with('workImage')->where('is_active',1)->get();
        return view('projects_page')->with('works',$works);
    }
    public function hardware()
    {
        $equipments = Equipment::where('is_active',1)->get();
        return view('hardware_page')->with('equipments ',$equipments);
    }
    public function ourExpertise()
    {
        $certificates = Certificate::where('is_active',1)->get();
        return view('our-expertise_page')->with('certificates ',$certificates);
    }
    public function testimonial()
    {
        $testimonials = Customer::where('is_active',1)->get();
        return view('testimonial_page')->with('testimonials ',$testimonials);
    }
    public function team()
    {
        $teams = Team::where('is_active',1)->get();
        return view('team_page')->with('teams ',$teams);
    }
}
