<?php

namespace  App\Repository\Services;
use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index(){
        $services = Service::all();
       return view ('dashboard.services.single-service.index', compact('services'));
    }

    public function store( $request)
    {
       //
    }



    public function edit($id){
       //
   }

   public function update( $request)
   {
       //
    }




    public function destroy( $request)
    {
        //
        }



        public function show( $id)
        {
            //
}

}
