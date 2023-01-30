<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;
use App\Models\WorkImage;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::get();
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
            if ($request->typeImage == 'array') {
                if ($request->imageUrl != "") {foreach (explode(',', $request->imageUrl) as $image) {
                    $workImage = new WorkImage();
                    $workImage->image = $image;
                    $workImage->work_id = $work->id;
                    $workImage->save();
                }
                }
            }
            return redirect()->route('work_list')->with(['success', 'تمت عملية الاضافة بنجاح']);
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
    public function show(Work $work)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
