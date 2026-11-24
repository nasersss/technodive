<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;

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
        // The landing page shows one row of equipment (4) and of testimonials (3)
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->take(4)->get();
        $customers = Customer::where('is_active', 1)->orderBy('id', 'DESC')->take(3)->get();
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
        return view('services_page')->with([
            'services' => Service::where('is_active', 1)->get(),
            'equipments' => Equipment::where('is_active', 1)->orderBy('id', 'DESC')->take(4)->get(),
        ]);
    }

    public function projects()
    {
        return view('projects_page')->with([
            'works' => Work::with('workImages')->where('is_active', 1)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function hardware()
    {
        return view('hardware_page')->with([
            'equipments' => Equipment::where('is_active', 1)->get(),
            'customers' => Customer::where('is_active', 1)->orderBy('id', 'DESC')->take(3)->get(),
        ]);
    }

    public function ourExpertise()
    {
        return view('our-expertise_page')->with([
            'certificates' => Certificate::where('is_active', 1)->orderBy('id', 'DESC')->get(),
        ]);
    }

    // The team and testimonials now live on the about page
    public function testimonial()
    {
        return redirect()->to(route('about') . '#testimonials');
    }

    public function team()
    {
        return redirect()->to(route('about') . '#team');
    }

    public function about()
    {
        return view('about_page')->with([
            'teams' => Team::where('is_active', 1)->get(),
            'customers' => Customer::where('is_active', 1)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function showSingleProject($id)
    {
        $work = Work::with('workImages')->where('is_active', 1)->findOrFail($id);
        $others = Work::with('workImages')->where('is_active', 1)->whereKeyNot($work->id)
            ->orderBy('id', 'DESC')->take(3)->get();

        return view('single_project')->with([
            'work' => $work,
            'others' => $others,
        ]);
    }
}
