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
        try{
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
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }}

    public function edit($id){
        //
    }
    public function update($request)
    {
        //
    }




    public function destroy( $request)
    {
        //
    }
}
