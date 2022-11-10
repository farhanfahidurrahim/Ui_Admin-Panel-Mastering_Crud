<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use DB;
use Str; 

class SubCategoryController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        //_____QB____
        $subcat=DB::table('subcategories')
            ->leftjoin('categories','subcategories.category_id','categories.id')->select('subcategories.*','categories.category_name')->get();

        //____ORM
        //$subcat=SubCategory::all();
        
        return view('admin.subcategory.subcat_index',compact('subcat'));
    }

    public function create()
    {   
        //___QB___
        //$cat=DB::table('categories')->get();
        //___ORM__
        $cat=Category::all();
        return view('admin.subcategory.subcat_create',compact('cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required|unique:subcategories|max:155',
        ]);

        //____QB__
        // $data=array(
        //     'category_id'=>$request->category_id,
        //     'subcategory_name'=>$request->subcategory_name,
        //     'subcategory_slug'=>Str::of($request->subcategory_name)->slug('-'),
        // );
        // DB::table('subcategories')->insert($data);

        //_____Insert__
        // Subcategory::insert([
        //     'category_id'=>$request->category_id,
        //     'subcategory_name'=>$request->subcategory_name,
        //     'subcategory_slug'=>Str::of($request->subcategory_name)->slug('-'),
        // ]);

        //_____Model__
        $subcat=new Subcategory;
        $subcat->category_id=$request->category_id;
        $subcat->subcategory_name=$request->subcategory_name;
        $subcat->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcat->save();

        $notification=array('messege' => 'Sub-Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function show(SubCategory $subCategory)
    {
        //
    }

    public function edit($id)
    {   
        $subcat=DB::table('subcategories')->where('id',$id)->first();
        return view('admin.subcategory.subcat_edit',compact('subcat'));
    }

    public function update(Request $request,$id)
    {
        //__QueryBilder___
        $request->validate([
            'subcategory_name'=>'required|unique:subcategories|max:255',
        ]);

        $data=array(
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>Str::of($request->subcategory_name)->slug('-'),
        );

        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array('messege' => 'Sub-Category Updated!', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }

    public function destroy($id)
    {
        //___QB___
        //DB::table('subcategories')->where('id',$id)->delete();

        Subcategory::destroy($id);
        $notification=array('messege' => 'Sub-Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
