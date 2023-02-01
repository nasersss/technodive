<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UploadController;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::get();
        return view('admin.certificate.list')->with('certificates', $certificates);
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
     * @param  \App\Http\Requests\StoreCertificateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateRequest $request)
    {
        try {
            if ($request->imageUrl == null)
                return back()->with(['error' => 'يرجى إرفاق الصورة']);
            $type = explode('-', $request->type);
            $newCertificate = new Certificate();
            $translationType = ['en' => $type[1], 'ar' => $type[0]];
            $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $newCertificate->setTranslations('title', $translationTitle);
            $newCertificate->setTranslations('description', $translationDescription);
            $newCertificate->setTranslations('type', $translationType);
            $newCertificate->image = $request->imageUrl;
            $newCertificate->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateRequest  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        try {
            $type = explode('-', $request->type);
            $uploadController = new UploadController();
            $updateCertificate = Certificate::find($request->id);
            $translationTitle = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $updateCertificate->setTranslations('title', $translationTitle);
            $updateCertificate->setTranslations('description', $translationDescription);
            $translationType = ['en' => $type[1], 'ar' => $type[0]];
            $updateCertificate->setTranslations('type', $translationType);
            if (!$request->imageUrl == null) {
                $uploadController->deleteImage($updateCertificate->image);
                $updateCertificate->image = $request->imageUrl;
            }
            $updateCertificate->update();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate,$id)
    {
        try{
            ;
            $uploadController = new UploadController();
            $uploadController->deleteImage(Certificate::find($id)->image);
            Certificate::find($id)->delete();
            return back()->with(['success'=>'تمت حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error'=>'لم يتم حذف البيانات ']);
        }
    }

    public function toggle(Request $request)
    {
        try {
            $certificate = Certificate::find($request->id);
            $certificate->is_active *= -1;
            $certificate->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }
}
