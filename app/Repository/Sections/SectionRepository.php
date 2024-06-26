<?php

namespace  App\Repository\Sections;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\SectionRequest;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function index(){
        $sections = Section::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.sections.index',compact('sections'));
    }

    public function store(SectionRequest $request)
    {
        try{

            $section = new Section();
            $section->name = $request->name;
            $section->description = $request->description;
            $section->save();
            session()->flash('success', 'تم أضافة القسم بنجاح');
            return redirect()->route('dashboard.sections.index');
        }


        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id){
        $section = Section::find($id);

       return view('dashboard.sections.edit', ['section'=>$section ]);
   }

   public function update( $request)
   {
       $data = $request->validate([
        'name'=> 'required|string|min:2|max:100',
        'description'=> 'required|string|min:10|max:2000',
       ]);
       Section::findOrFail($request->id)->update($data);
       session()->flash('success', 'تم تعديل القسم بنجاح');
       return redirect()->route('dashboard.sections.index');
    }




    public function destroy( $request)
    {
        // Find the post by its ID
         Section::findOrFail($request->id)->delete();

         // Return a response indicating success
        session()->flash('success', 'تم حذف القسم بنجاح');
        return redirect()->route('dashboard.sections.index');
        }



        public function show( $id)
        {
            // Find the post by its ID
            $doctors = Section::findOrFail($id)->doctors;
            $section = Section::findOrFail($id);

             // Return a response indicating success
             return view ('dashboard.sections.show', compact('doctors', 'section'));
            }



//    public function ajax_search(Request $request){
//        if($request->ajax()){
//            $search_by_text=$request->search_by_text;
//            $section=Section::where('name','LIKE',"%{$search_by_text}%")->orderBy('id','DESC')->paginate(PAGINATION_COUNT);;
//            return view('dashboard.sections.ajax-search',['section'=>$section]);
//}
//    }


    public function search(Request $request){
        $search = $request->search;
        $sections = Section::where(function($query) use ($search) {
            $query->where('name', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
        })->get();
        return view('dashboard.sections.search', compact('search','sections'));
    }
}
