<?php

namespace  App\Repository\Insurances;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceRepository implements InsuranceRepositoryInterface
{

    public function index(){
        $insurances = Insurance::get();
        return view('dashboard.insurances.index',compact('insurances'));
    }

    public function store($request)
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
   public function update($request)
   {
       DB::beginTransaction();

       try {
        if(!$request->has('status')){
        $request->request->add(['status' =>0]);
        }else{
            $request->request->add(['status' =>1]);
        }
       $insurances = Insurance::findOrFail($request->id);
       $insurances->update($request->all());
       $insurances->save();
           DB::commit();

           session()->flash('success', 'تم تعديل شركة التأمين بنجاح');
       return redirect()->route('dashboard.insurances.index');
       }
       catch (\Exception $e) {
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
   }




    public function destroy( $request)
    {
        //
    }



}
