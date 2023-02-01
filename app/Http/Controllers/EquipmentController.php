<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Controllers\Services\UploadController;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::get();
        return view('admin.equipment.list')->with('equipments', $equipments);
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
     * @param  \App\Http\Requests\StoreEquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentRequest $request)
    {
        try {
            if ($request->imageUrl == null)
                return back()->with(['error' => 'يرجى إرفاق الصورة']);
            $newEquipment = new Equipment();
            $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $newEquipment->setTranslations('title', $translationTitle);
            $newEquipment->setTranslations('description', $translationDescription);
            $newEquipment->image = $request->imageUrl;
            $newEquipment->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentRequest  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
    
        try{
        $uploadController = new UploadController();
        $updateEquipment = Equipment::find($request->id);
        $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
        $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
        $updateEquipment->setTranslations('title', $translationTitle);
        $updateEquipment->setTranslations('description', $translationDescription);
        if(!$request->imageUrl==null)
        {
            $uploadController->deleteImage($updateEquipment->image);
            $updateEquipment->image=$request->imageUrl;

        }
        $updateEquipment->update();
        return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
    } catch (\Throwable $th) {
        return back()->with(['error' => 'لم يتم حفظ البيانات']);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment,$id)
    {
        try{
            ;
            $uploadController = new UploadController();
            $uploadController->deleteImage(Equipment::find($id)->image);
            Equipment::find($id)->delete();
            return back()->with(['success'=>'تمت حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error'=>'لم يتم حذف البيانات ']);
        }
    }
}
