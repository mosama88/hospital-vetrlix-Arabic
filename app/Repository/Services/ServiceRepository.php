<?php

namespace  App\Repository\Services;
use App\Interfaces\Services\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index(){
       return view ('dashboard.services.single-service-index');
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