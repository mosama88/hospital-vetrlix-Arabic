<?php

namespace  App\Repository\Sections;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function index(){
        $sections = Section::orderBy('created_at', 'desc')->get();
        return view('dashboard.sections.index',compact('sections'));
    }

    public function store( $request)
    {
        try{
            $section = $request->validate([
                'name'=> 'required|string|min:2|max:100',
                'description'=> 'required|string|min:10|max:2000',
            ]);

            Section::create($section);
            return redirect()->route('dashboard.sections.index')->with('add', 'تم أضافة قسم ');
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
       return redirect()->route('dashboard.sections.index')->with('edit', 'تم تعديل القسم  ');
    }




    public function destroy( $request)
    {
        // Find the post by its ID
         Section::findOrFail($request->id)->delete();

         // Return a response indicating success
         return redirect()->route('dashboard.sections.index')->with('delete', 'تم حذف القسم بنجاح ');
        }
}

