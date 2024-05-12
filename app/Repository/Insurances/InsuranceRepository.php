<?php

namespace  App\Repository\Insurances;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Dashboard\InsuranceRequest;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceRepository implements InsuranceRepositoryInterface
{

    public function index(){
        $insurances = Insurance::orderBy('created_at', 'desc')->get();
        return view('dashboard.insurances.index',compact('insurances'));
    }

    public function store(InsuranceRequest $request)
    {
        $insurances = new Insurance();
        $insurances->name = $request->name;
        $insurances->notes = $request->notes;
        $insurances->insurance_code = $request->insurance_code;
        $insurances->discount_percentage = $request->discount_percentage;
        $insurances->company_rate = $request->company_rate;
        $insurances->status = 1;
        $insurances->save();
        session()->flash('success', 'تم أضافة شركة التأمين بنجاح');
        return redirect()->route('dashboard.insurances.index');
    }

    public function create()
    {
        return view('dashboard.insurances.add',);

    }


    public function edit($id){
        $insurance = Insurance::findOrFail($id);
        return view('dashboard.insurances.edit',compact('insurance'));

    }


   public function update(InsuranceRequest $request)
   {

       if (!$request->has('status'))
           $request->request->add(['status' => 0]);
       else
           $request->request->add(['status' => 1]);

       $insurances = insurance::findOrFail($request->id);
       $insurances->update($request->all());

           session()->flash('success', 'تم تعديل شركة التأمين بنجاح');
       return redirect()->route('dashboard.insurances.index');

   }




    public function destroy( $request)
    {
        $insurance = insurance::findOrFail($request->id);

        $insurance->delete($request->id);
        session()->flash('success', 'تم حذف شركة التأمين بنجاح');
        return back();
    }



}
