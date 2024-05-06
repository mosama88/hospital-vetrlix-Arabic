<?php

namespace  App\Repository\Services;
use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Models\Section;
use App\Http\Requests\Dashboard\ServiceRequest;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index(){
        $services = Service::paginate(5);
       return view ('dashboard.services.single-service.index', compact('services'));
    }

    public function store(ServiceRequest $request)
    {
        $singleService = new Service();
        $singleService->name = $request->name;
        $singleService->price = $request->price;
        $singleService->description = $request->description;
        $singleService->status = 1;

        $singleService->save();
        session()->flash('success', 'تم إضافة الخدمة بنجاح');
    return redirect()->route('dashboard.services.index');

    }



    public function edit($request){

        $service = Service::findOrFail($request->id);
        return view ('dashboard.services.single-service.edit', compact('service'));
   }

   public function update( $request)
   {
       $singleService = Service::findOrFail($request->id);
       $singleService->name = $request->name;
       $singleService->price = $request->price;
       $singleService->description = $request->description;
       $singleService->status = $request->status;

       $singleService->save();
       session()->flash('success', 'تم تعديل الخدمة بنجاح');
       return redirect()->route('dashboard.services.index');
    }




    public function destroy($request)
    {
        // Find the post by its ID
        Service::findOrFail($request->id)->delete();

        session()->flash('success', 'تم حذف الخدمة بنجاح');
        // Return a response indicating success
        return back();
    }



        public function show( $id)
        {
            //
        }


    public function search($request){
        $search = $request->search;
        $services = Service::where(function($query) use ($search) {
            $query->where('name', 'like', "%$search%")->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%");
        })->get();
        return view('dashboard.services.single-service.search', compact('search','services'));
    }

}
