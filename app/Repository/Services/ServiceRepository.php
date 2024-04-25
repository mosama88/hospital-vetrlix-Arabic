<?php

namespace  App\Repository\Services;
use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Models\Section;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index(){
        $services = Service::all();
       return view ('dashboard.services.single-service.index', compact('services'));
    }

    public function store( $request)
    {
        $singleService = new Service();
        $singleService->name = $request->name;
        $singleService->price = $request->price;
        $singleService->description = $request->description;
        $singleService->status = 1;

        $singleService->save();
    session()->flash('add');
    return redirect()->route('dashboard.services.index');

    }



    public function edit($id){
       //
   }

   public function update( $request)
   {
       //
    }




    public function destroy($request)
    {
        // Find the post by its ID
        Service::findOrFail($request->id)->delete();

        // Return a response indicating success
        return redirect()->route('dashboard.services.index')->with('delete', 'تم حذف الخدمه بنجاح ');
    }



        public function show( $id)
        {
            //
}

}
