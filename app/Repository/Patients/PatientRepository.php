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
        $patients['birth_date'] = date('Y-m-d', strtotime('1918-10-17'));
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
        //

    }


    public function update($request)
    {

        //
    }




    public function destroy($request)
    {
        //
    }



}
