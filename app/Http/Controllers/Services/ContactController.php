<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Equipment;
use App\Models\Team;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function contact()
    {
        $equipments = Equipment::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        $certificates = Certificate::where('is_active', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('contact_page')->with([
            'equipments' => $equipments,
            'certificates' => $certificates,
        ]);
    }
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ],
            [
                'name.required' => 'يجب تعبية هذا الحقل',
                'email.required' => 'يجب تعبية هذا الحقل',
                'subject.required' => 'يجب تعبية هذا الحقل',
                'message.required' => 'يجب تعبية هذا الحقل',

            ]
        );

        try {
            Mail::send('email.contact', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_query' => $request->get('message'),
            ), function ($message) use ($request) {
                $message->to('amas701111367@gmail.com', 'Admin')->subject($request->get('subject'));
            });
            return back()->with('success', __('contact.thankMessuage'));
        } catch (\Throwable $th) {
            return back()->with('error', __('contact.errorMessuage'));
        }
    }
}
