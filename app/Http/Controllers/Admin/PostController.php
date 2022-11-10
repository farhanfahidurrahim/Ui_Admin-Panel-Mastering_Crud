<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Str;
use Image;
use File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $post=DB::table('posts')
            ->Join('categories','posts.category_id','categories.id')
            ->Join('subcategories','posts.subcategory_id','subcategories.id')
            ->Join('users','posts.user_id','users.id')
            ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
            ->get();
        return view('admin.post.post_index',compact('post'));
    }

    public function create()
    {   
        $cat=DB::table('categories')->get();
        // $subcat=DB::table('subcategories')->get();
        return view('admin.post.post_create',compact('cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id'=>'required',
            'title'=>'required',
            'tags'=>'required',
            'description'=>'required',
        ]);

        $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=Str::of($request->title)->slug('-');

        $data=array(
            'category_id'=>$categoryid,
            'subcategory_id'=>$request->subcategory_id,
            'title'=>$request->title,
            'slug'=>$slug,
            'post_date'=>$request->post_date,
            'tags'=>$request->tags,
            'description'=>$request->description,
            'user_id'=>Auth::id(),
            'status'=>$request->status,
        );

            $photo=$request->image;
            if ($photo) {
                    $photoname=$slug.'.'.$photo->getClientOriginalExtension();
                    Image::make($photo)->resize(600,360)->save('public/media/'.$photoname);
                    $data['image']='public/media/'.$photoname;
                    DB::table('posts')->insert($data);
                    $notification=array('messege' => 'Post Created [ With Image! ]', 'alert-type' => 'success');
                    return redirect()->back()->with($notification);

            }

                DB::table('posts')->insert($data);
                $notification=array('messege' => 'Post Created & No Image!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);

        //return response()->json($data);
    }

    public function destroy($id)
    {   
        $post_img=DB::table('posts')->where('id',$id)->first();
        if (File::exists($post_img->image)) {
            File::delete($post_img->image);
        }
        $post_img=DB::table('posts')->where('id',$id)->delete();

        $notification=array('messege' => 'Post Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $cat=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();
        // $subcat=DB::table('subcategories')->get();
        return view('admin.post.post_edit',compact('cat','post'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'subcategory_id'=>'required',
            'title'=>'required',
            'tags'=>'required',
            'description'=>'required',
        ]);

        $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=Str::of($request->title)->slug('-');

        $data=array(
            'category_id'=>$categoryid,
            'subcategory_id'=>$request->subcategory_id,
            'title'=>$request->title,
            'slug'=>$slug,
            'post_date'=>$request->post_date,
            'tags'=>$request->tags,
            'description'=>$request->description,
            'user_id'=>Auth::id(),
            'status'=>$request->status,
        );

            $photo=$request->image;
            if ($photo) {
                    $photoname=$slug.'.'.$photo->getClientOriginalExtension();
                    Image::make($photo)->resize(600,360)->save('public/media/'.$photoname);
                    $data['image']='public/media/'.$photoname;
                    DB::table('posts')->where('id',$id)->update($data);
                    //___Delete Old image___//
                    if (File::exists($request->old_image)) {
                       File::delete($request->old_image);
        }
                $notification=array('messege' => 'Post Updated [ With Image! ]', 'alert-type' => 'success');
                return redirect()->route('post.index')->with($notification);

            }

                DB::table('posts')->where('id',$id)->update($data);
                $notification=array('messege' => 'Post Updated & No Image!', 'alert-type' => 'success');
                return redirect()->route('post.index')->with($notification);
    }

}
