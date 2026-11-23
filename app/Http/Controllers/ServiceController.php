<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UploadController;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

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
        try {
            if ($request->imageUrl == null) {
                return redirect()->route('service_list')->with(['error' => 'يرجى إرفاق الصورة']);
            }

            if ($request->typeImage == 'array') {
                $uploadController = new UploadController();
                $uploadController->deleteImage($request->imageUrl);
                return redirect()->route('service_list')->with(['error' => 'يرجى إرفاق صورة واحدة فقط']);
            }
            $newService = new Service();
            $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $newService->setTranslations('title', $translationTitle);
            $newService->setTranslations('description', $translationDescription);
            $newService->image = $request->imageUrl;
            $newService->save();
            return redirect()->route('service_list')->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable$th) {
            return redirect()->route('service_list')->with(['error' => 'لم يتم حفظ البيانات']);

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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $uploadController = new UploadController();
            $updateService = Service::find($request->id);
            $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $updateService->setTranslations('title', $translationTitle);
            $updateService->setTranslations('description', $translationDescription);
            if (!$request->imageUrl == null) {
                if ($request->typeImage == 'array') {
                    $uploadController = new UploadController();
                    $uploadController->deleteImage($request->imageUrl);
                    return redirect()->route('service_list')->with(['error' => 'يرجى إرفاق صورة واحدة فقط']);
                }
                $uploadController->deleteImage($updateService->image);
                $updateService->image = $request->imageUrl;
            }
            $updateService->update();
            return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم تحديث البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        try {
            ;
            $uploadController = new UploadController();
            $uploadController->deleteImage(Service::find($id)->image);
            Service::find($id)->delete();
            return back()->with(['success' => 'تمت حذف البيانات بنجاح']);
        } catch (\Throwable$th) {
            return back()->with(['error' => 'لم يتم حذف البيانات ']);
        }
    }

    public function toggle(Request $request)
    {
        try {
            $service = Service::find($request->id);
            $service->is_active *= -1;
            $service->save();
            return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم تحديث البيانات']);
        }
    }
}
