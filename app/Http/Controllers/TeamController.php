<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Controllers\Services\UploadController;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get();
        return view('admin.team.list')->with('teams', $teams);
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
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        try {
            if ($request->imageUrl == null)
                return back()->with(['error' => 'يرجى إرفاق الصورة']);
            $newTeam = new Team();
            $translationName = ['en' => $request->nameEn, 'ar' => $request->nameAr];
            $translationJob = ['en' => $request->jobEn, 'ar' => $request->jobAr];
            $newTeam->setTranslations('name', $translationName);
            $newTeam->setTranslations('job', $translationJob);
            $newTeam->image = $request->imageUrl;
            $newTeam->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
      
        try{
        $uploadController = new UploadController();
        $updateTeam =  Team::find($request->id);
        $translationName = ['en' => $request->nameEn, 'ar' => $request->nameAr];
        $translationJob = ['en' => $request->jobEn, 'ar' => $request->jobAr];
        $updateTeam->setTranslations('name', $translationName);
        $updateTeam->setTranslations('job', $translationJob);
        if(!$request->imageUrl==null)
        {
            $uploadController->deleteImage($updateTeam->image);
            $updateTeam->image=$request->imageUrl;

        }
        $updateTeam->update();
        return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
    } catch (\Throwable $th) {
        return back()->with(['error' => 'لم يتم حفظ البيانات']);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team,$id)
    {
        try{
            
            $uploadController = new UploadController();
            $uploadController->deleteImage(Team::find($id)->image);
            Team::find($id)->delete();
            return back()->with(['success'=>'تمت حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error'=>'لم يتم حذف البيانات ']);
        }
    }
    
    public function toggle(Request $request)
    {
        try {
            $team = Team::find($request->id);
            $team->is_active *= -1;
            $team->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }
}
