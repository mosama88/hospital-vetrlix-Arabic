<?php

namespace  App\Repository\Doctors;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Appointment;
// use Illuminate\Http\Request;
use App\Traits\UploadTrait;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\Dashboard\DoctorRequest;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Doctors\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{

    use UploadTrait;
    public function index(){
        $doctors = Doctor::orderBy('created_at', 'desc')->get();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function store($request)
    {

        DB::beginTransaction();
        $request->validate([
            'name'=> 'required|string|min:3| max:50',
            'email'=> 'required|string|min:5| max:50',
            'phone'=> 'required|string|min:1| max:18',
            'price'=> 'required|string|min:1| max:10',
            'status'=> 'required|in:active,inactive',
            'appointment_id'=> 'required|exists:appointments,id',
            'section_id'=> 'required|exists:sections,id'
        ]);
            $doctors = new Doctor();
            $doctors->email =$request->email;
            $doctors['password'] = $request->has('password') ? bcrypt( $request->password) :
            $doctors->password;
            $doctors->section_id =$request->section_id;
            $doctors->phone = $request->phone;
            $doctors->price =$request->price;
            $doctors->status =$request->status;
            //Store Translate
            $doctors->name = $request->name;
            $doctors->appointment_id =$request->appointment_id;
            $doctors->save();
            //Upload img
            $this->verifyAndStoreImage($request,'photo','doctors','upload_image',$doctors->id,'App\Models\Doctor');
DB::commit();
            // Doctor::create($doctors);
            return redirect()->route('dashboard.doctors.index')->with('add', 'تم أضافة دكتور ');
    }



    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('dashboard.doctors.add', compact('sections','appointments'));
    }




    public function edit($id){
        $doctor = Doctor::find($id);

       return view('dashboard.doctors.edit', ['doctor'=>$doctor ]);
   }

   public function update( $request)
   {
       $data = $request->validate([
        'name'=> 'required|string|min:2|max:100',
       ]);
       $name = $request->name;
       Doctor::findOrFail($request->id)->update($data);
       return redirect()->route('dashboard.doctors.index')->with('edit', 'تم تعديل الدكتور الى '. $name);
    }




    public function destroy( $request)
    {
        if($request->page_id==1){

            if($request->filename){
                $this->Delete_attachment('upload_image', 'doctors/'.$request->filename,$request->id, $request->filename);
            }
            {
                Doctor::destroy($request->id);
                return back()->with('delete', 'تم حذف الدكتور ');
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
                  return back()->with('delete', 'تم حذف الدكتور ');


        }
}
