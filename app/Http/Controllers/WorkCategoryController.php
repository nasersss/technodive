<?php

namespace App\Http\Controllers;

use App\Models\WorkCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/** Dashboard: work categories (أقسام الأعمال). Same flow as the other dashboard sections. */
class WorkCategoryController extends Controller
{
    public function index()
    {
        return view('admin.work-category.list')->with(
            'categories', WorkCategory::withCount('works')->orderBy('id')->get()
        );
    }

    public function store(Request $request)
    {
        if ($invalid = $this->rejectInvalidNames($request)) {
            return $invalid;
        }

        $category = new WorkCategory();
        $category->setTranslations('name', ['ar' => $request->titleAr, 'en' => $request->titleEn]);
        $category->save();

        return redirect()->route('work_category_list')->with(['success' => 'تمت إضافة القسم بنجاح']);
    }

    public function update(Request $request)
    {
        if ($invalid = $this->rejectInvalidNames($request)) {
            return $invalid;
        }

        $category = WorkCategory::findOrFail($request->id);
        $category->setTranslations('name', ['ar' => $request->titleAr, 'en' => $request->titleEn]);
        $category->save();

        return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
    }

    /** Its works stay, without a category. Done here too because SQLite skips foreign keys added to an existing table. */
    public function destroy($id)
    {
        $category = WorkCategory::findOrFail($id);
        DB::transaction(function () use ($category) {
            $category->works()->update(['category_id' => null]);
            $category->delete();
        });

        return back()->with(['success' => 'تم حذف القسم، وأعماله صارت بدون قسم']);
    }

    public function toggle(Request $request)
    {
        $category = WorkCategory::findOrFail($request->id);
        $category->is_active *= -1;
        $category->save();

        return back()->with(['success' => 'تمت تحديث البيانات بنجاح']);
    }

    /** The dashboard only shows flash messages, so a missing name also comes back as an «error» message. */
    private function rejectInvalidNames(Request $request): ?RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'titleAr' => ['required', 'string', 'max:100'],
            'titleEn' => ['required', 'string', 'max:100'],
        ], [
            'titleAr.required' => 'يرجى إدخال اسم القسم بالعربي',
            'titleEn.required' => 'يرجى إدخال اسم القسم بالإنجليزية',
        ]);

        return $validator->fails()
            ? back()->withErrors($validator)->with('error', $validator->errors()->first())
            : null;
    }
}
