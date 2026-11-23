<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkImage;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Http\Controllers\Services\UploadController;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::with('workImages')->get();
        return view('admin.works.list')->with('works', $works);
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
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        try {

            if ($request->imageUrl == null) {
                return redirect()->route('work_list')->with(['error' => 'يرجى إرفاق الصورة']);
            }

            $work = new Work();
            $titleTranslations = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $descriptionTranslations = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $work->setTranslations('title', $titleTranslations);
            $work->setTranslations('description', $descriptionTranslations);
            $work->save();
                if ($request->imageUrl != "") {foreach (explode(',', $request->imageUrl) as $image) {
                    $workImage = new WorkImage();
                    $workImage->image = $image;
                    $workImage->work_id = $work->id;
                    $workImage->save();
                }
            }
            return redirect()->route('work_list')->with(['success'=> 'تمت عملية الاضافة بنجاح']);
        } catch (\Throwable$th) {
            return redirect()->route('work_list')->with(['error' => 'لم يتم حفظ البيانات']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function showImages($workId)
    {
        // return $workId;
        // return Work::with('workImages')->find($workId);
            $images = WorkImage::where('work_id',$workId)->get();
        return view('admin.works.shows-image')->with('images',$images);
    }
    public function deleteImage($imageId)
    {
        $uploadController = new UploadController();
        $image= WorkImage::find($imageId);
        $uploadController->deleteImage($image->image);
        $image->delete();
        return back()->with(['success'=>'تمت عملية الحذف بنجاح ']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        // return $request;
        try{
         $work = Work::find($request->id);
            $titleTranslations = ['en' => $request->titleEn, 'ar' => $request->titleAr];
            $descriptionTranslations = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $work->setTranslations('title', $titleTranslations);
            $work->setTranslations('description', $descriptionTranslations);
            $work->save();
                if ($request->imageUrl != "") {foreach (explode(',', $request->imageUrl) as $image) {
                    $workImage = new WorkImage();
                    $workImage->image = $image;
                    $workImage->work_id = $work->id;
                    $workImage->save();
                }
               
            }
            return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم تحديث البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work,$id)
    {
        try{
            
            $uploadController = new UploadController();
            $images = WorkImage::where('work_id',$id)->get();
            foreach ( $images as $image) {
                 $uploadController->deleteImage($image->image);
            }
            Work::find($id)->delete();
            return back()->with(['success'=>'تمت حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error'=>'لم يتم حذف البيانات ']);
        }
    
        
    }

    public function toggle(Request $request)
    {
        try {
            $work = Work::find($request->id);
            $work->is_active *= -1;
            $work->save();
            return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم تحديث البيانات']);
        }
    }
}
