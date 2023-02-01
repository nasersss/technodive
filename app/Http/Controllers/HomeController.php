<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Work;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Certificate;
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
        return view('home');
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
