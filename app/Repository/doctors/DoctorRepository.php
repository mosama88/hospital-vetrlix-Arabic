<?php

namespace  App\Repository\Doctors;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Appointment;
use App\Traits\UploadTrait;
 use App\Http\Requests\Dashboard\DoctorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Doctors\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{

    use UploadTrait;
    public function index(){
        $doctors = Doctor::orderBy('created_at', 'desc')->with('doctorappointments')->get();
        return view('dashboard.doctors.index', compact('doctors'));
    }


    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('dashboard.doctors.add', compact('sections','appointments'));
    }

    public function store(DoctorRequest $request)
    {

        DB::beginTransaction();
        try{
                $doctors = new Doctor();
                $doctors->email =$request->email;
                $doctors['password'] = $request->has('password') ? bcrypt( $request->password) :
                $doctors->password;
                $doctors->section_id =$request->section_id;
                $doctors->phone = $request->phone;
                $doctors->status =$request->status;
                //Store Translate
                $doctors->name = $request->name;
                $doctors->save();
                $doctors->doctorappointments()->attach($request->appointments);
                // $doctors->doctorappointments()->sync($request->appointment);

                //Upload img
                $this->verifyAndStoreImage($request,'photo','doctors','upload_image',$doctors->id,'App\Models\Doctor');
    DB::commit();
            session()->flash('success', 'تم أضافة الطبيب بنجاح');
                // Doctor::create($doctors);
                return redirect()->route('dashboard.doctors.index');
        }


    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }


    public function edit($id){
        $doctors = Doctor::find($id);
        $sections = Section::all();
        $appointments = Appointment::all();
       return view('dashboard.doctors.edit', compact('sections','doctors','appointments'));
   }
   public function update(DoctorRequest $request)
   {
       DB::beginTransaction();

       try {

        $doctors = Doctor::findorfail($request->id);

        $doctors->name = $request->name;
        $doctors->email = $request->email;
        $doctors->section_id = $request->section_id;
        $doctors->phone = $request->phone;
        $doctors->status = $request->status;

        // update pivot tABLE
        $doctors->doctorappointments()->sync($request->appointments);
        $doctors->save();

           // update photo
           if ($request->has('photo')){
               // Delete old photo
               if ($doctors->image){
                   $old_img = $doctors->image->filename;
                   $this->Delete_attachment('upload_image','doctors/'.$old_img,$request->id);
               }
               //Upload img
               $this->verifyAndStoreImage($request,'photo','doctors','upload_image',$request->id,'App\Models\Doctor');
           }




        DB::commit();
           session()->flash('success', 'تم تعديل الطبيب بنجاح');
        return redirect()->route('dashboard.doctors.index');

    }
    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}




    public function destroy( $request)
    {
        if($request->page_id==1){

            if($request->filename){
                $this->Delete_attachment('upload_image', 'doctors/'.$request->filename,$request->id, $request->filename);
            }
            {
                Doctor::destroy($request->id);
                session()->flash('success', 'تم حذف الطبيب بنجاح');
                return back();
            }
//----------------------------------------------
        }
                  // delete selector doctor
                $delete_select_id = explode(",", $request->delete_select_id);
                foreach ($delete_select_id as $ids_doctors){
                    $doctor = Doctor::findorfail($ids_doctors);
                    if($doctor->image){
                    $this->Delete_attachment('upload_image','doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);
                    }
                }

                Doctor::destroy($delete_select_id);
        session()->flash('success', 'تم حذف الطبيب بنجاح');
        return back();


        }


        public function update_password($request)
        {
            try {
                $request->validate([
                    'password' => "required|string|min:3|max:20",
                    'password_confirmation' => "required|string|min:3|max:20",
                ]);
                $doctor = Doctor::findorfail($request->id);
                $doctor->update([
                    'password'=>Hash::make($request->password)
                ]);

                session()->flash('changePassword');
                return redirect()->back();
            }

            catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }


        public function update_status($request)
        {
            try {

                $data = $request->validate([
                    'status' => "required|in:active,inactive",
                ]);
                $doctor = Doctor::findorfail($request->id);
                $doctor->status = $request->status;
                $doctor->update($data);


                session()->flash('edit_status');
                return redirect()->back();
            }

            catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }


}
