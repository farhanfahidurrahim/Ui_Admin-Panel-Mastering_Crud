<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //___QueryBuilder___
        $cat=DB::table('categories')->orderBy('category_name','ASC')->get();

        //__Eloquent_ORM___
        //$cat=Category::all();
        return view('admin.category.cat_index',compact('cat'));
    }

    public function create()
    {
        return view('admin.category.cat_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|unique:categories|max:255',
        ]);

        //__Eloquent_ORM___
        // $cat=new Category;
        // $cat->category_name=$request->category_name;
        // $cat->category_slug=Str::of($request->category_name)->slug('-');
        // $cat->save();

        //insert
        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ]);

        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

        //__QueryBilder___
        // $data=array(
        //     'category_name'=>$request->category_name,
        //     'category_slug'=>Str::of($request->category_name)->slug('-'),
        // );
        // DB::table('categories')->insert($data);
    }

    public function destroy($id)
    {
        //__QueryBilder___
        //DB::table('categories')->where('id',$id)->delete();

        //__Eloquent_ORM___
        //$cat=Category::find($id);
        //$cat->delete();

        //destroy
        Category::destroy($id);
        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
        //return redirect()->back()->with('status','Delete Successfully');
    }

    public function edit($id)
    {   
        //__QueryBilder___
        //$cat=DB::table('categories')->where('id',$id)->first();

        //__Eloquent_ORM___
        //$cat=Category::where('id',$id)->first();
        $cat=Category::find($id);

        return view('admin.category.cat_edit',compact('cat'));
    }

    public function update(Request $request, $id)
    {
        //__QueryBilder___
        $request->validate([
            'category_name'=>'required|unique:categories|max:255',
        ]);

        $data=array(
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        );

        DB::table('categories')->where('id',$id)->update($data);
        $notification=array('messege' => 'Category Updated!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
        //return redirect()->back()->with('status','Category Update Successfully');
    }










}



