<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Services\UploadController;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customer.list')->with('customers', $customers);
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            if ($request->imageUrl == null)
                return back()->with(['error' => 'يرجى إرفاق الصورة']);
            $newCustomer = new Customer();
            $translationName = ['en' => $request->nameEn, 'ar' => $request->nameAr];
            $translationJob = ['en' => $request->jobEn, 'ar' => $request->jobAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $newCustomer->setTranslations('name', $translationName);
            $newCustomer->setTranslations('job', $translationJob);
            $newCustomer->setTranslations('description', $translationDescription);
            $newCustomer->image = $request->imageUrl;
            $newCustomer->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        // return $request;
        try{
        $uploadController = new UploadController();

            $updateCustomer = Customer::find($request->id);
            $translationName = ['en' => $request->nameEn, 'ar' => $request->nameAr];
            $translationJob = ['en' => $request->jobEn, 'ar' => $request->jobAr];
            $translationDescription = ['en' => $request->descriptionEn, 'ar' => $request->descriptionAr];
            $updateCustomer->setTranslations('name', $translationName);
            $updateCustomer->setTranslations('job', $translationJob);
            $updateCustomer->setTranslations('description', $translationDescription);
            if(!$request->imageUrl==null)
        {
            $uploadController->deleteImage($updateCustomer->image);
            $updateCustomer->image=$request->imageUrl;

        }
            $updateCustomer->image = $request->imageUrl;
            $updateCustomer->save();
            return back()->with(['success' => 'تمت إضافة البيانات بنجاح']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'لم يتم حفظ البيانات']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
