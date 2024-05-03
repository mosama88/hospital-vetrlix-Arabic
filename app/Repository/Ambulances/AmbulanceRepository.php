<?php

namespace App\Repository\Ambulances;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;
use App\Http\Requests\Dashboard\AmbulanceRequest;
use Illuminate\Support\Facades\DB;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{

    public function index(){
        $ambulances = Ambulance::orderBy('created_at', 'desc')->get();
        return view('dashboard.ambulances.index', compact('ambulances'));
    }


    public function create()
    {
        return view('dashboard.ambulances.add');
    }

    public function store(AmbulanceRequest $request)
    {

    $ambulance = new Ambulance();
    $ambulance->name = $request->name;
    $ambulance->car_number = $request->car_number;
    $ambulance->car_model = $request->car_model;
    $ambulance->car_year_model = $request->car_year_model;
    $ambulance->license_number = $request->license_number;
    $ambulance->phone = $request->phone;
    $ambulance->available = 1;
    $ambulance->type = $request->type;
    $ambulance->notes = $request->notes;
    $ambulance->save();
            session()->flash('success', 'تم أضافة سيارة الإسعاف بنجاح');
        return redirect()->route('dashboard.ambulances.index');
        }


    public function edit($id){
        $ambulance = Ambulance::findOrFail($id);
        return view('dashboard.ambulances.edit', compact('ambulance'));
    }
    public function update(AmbulanceRequest $request)
    {
        $ambulance = Ambulance::findOrFail($request->id);
        $ambulance->update($request->all());
        session()->flash('success', 'تم تعديل بيانات السيارة بنجاح');
        return redirect()->route('dashboard.ambulances.index');
    }




    public function destroy($request)
    {
        $ambulance = Ambulance::findOrFail($request->id);
        $ambulance->delete($request->id);
        session()->flash('success', 'تم حذف سيارة الإسعاف بنجاح');
        return back();
    }
}
