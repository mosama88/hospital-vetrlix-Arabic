<?php

namespace  App\Repository\Patients;
use App\Models\Address;
use App\Models\Patient;
use App\Http\Requests\Dashboard\PatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PatientRepository implements PatientRepositoryInterface
{

    public function index(){
        $patients = Patient::get();
        return view('dashboard.patients.index',compact('patients'));
    }

    public function create()
    {
        $addresses = Address::get();
        return view('dashboard.patients.add',compact('addresses'));
    }

    public function store(PatientRequest $request)
    {
        try{
        $patients = new Patient();
        $patients->nation_number = $request->nation_number;
        $patients->name = $request->name;
        $patients->email = $request->email;
        $patients->password = $request->password;
        $patients->phone = $request->phone;
        $patients->birth_date = $request->birth_date;
        $patients->type_blood = $request->type_blood;
        $patients->gender = $request->gender;
        $patients->sick_history = $request->sick_history;
        $patients->address_id = $request->address_id;
        $patients->save();

            session()->flash('success', 'تم أضافة المريض بنجاح');
        return redirect()->route('dashboard.patients.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function edit($id){
        $patient = Patient::findOrFail($id);
        $addresses = Address::get();
        return view('dashboard.patients.edit',compact('addresses','patient'));

    }


    public function update(PatientRequest $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->update($request->all());
        session()->flash('success', 'تم تعديل بيانات المريض بنجاح');
        return redirect()->route('dashboard.patients.index');
    }




    public function destroy($request)
    {
        $patients = Patient::findOrFail($request->id);
        $patients->delete($patients);
        session()->flash('success', 'تم حذف المريض بنجاح');
        return back();
    }



}
