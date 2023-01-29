<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;

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
        return view('admin.works.list')->with('works',$works);
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
        $newItem = new Work();
        $translations = ['en' => 'hello', 'ar' => 'hola'];
        $newItem->setTranslations('title', $translations);

        $translations = ['en' => 'hello hello hello', 'ar' => 'hola hola hola'];

        $newItem->setTranslations('description', $translations);

        $newItem->save();

        $newWork = new Work();
        Work::create([
            'title' => [
                'en' => 'title in English',
                'ar' => 'العنوان عربي'
            ],
            'description' => [
                'en' => 'description,description description description in English',
                'ar' => 'الوصف عربي الوصف عرب لوصف عربي الوصف عربي'
            ],
            'image' => 'image.png'
        ]);

        return Work::get();
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
