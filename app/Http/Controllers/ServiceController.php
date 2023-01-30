<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.service.list')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        try{
       if($request->imageUrl==null)
        return redirect()->route('service_list')->with(['error'=>'يرجى إرفاق الصورة']);
        $newService = new Service();
        $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
        $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
        $newService->setTranslations('title', $translationTitle);
        $newService->setTranslations('description', $translationDescription);
        $newService->image=$request->imageUrl;
        $newService->save();
        return redirect()->route('service_list')->with(['success'=>'تمت إضافة البيانات بنجاح']);
    } catch (\Throwable $th) {
        return redirect()->route('service_list')->with(['error'=>'لم يتم حفظ البيانات']);

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
