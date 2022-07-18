<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCategories()
    {
        //ELOQUENT variant
        // mi mar ma tvjetrat nfillim 
        // $categories=Category::all();
        $categories = Category::latest()->paginate(5);
        $trashed = Category::onlyTrashed()->latest()->paginate(3);

        //QERY BUILDER variant
        // $categories=DB::table('categories')->latest()->paginate(5);
        //join with QueryBuilder
        // $categories=DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);


        return view('admin.category.index', compact('categories', 'trashed'));
    }


    public function AddCategory(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:25',
            ],
            [
                'category_name.required' => 'Emri i kategorise duhet shenuar!',
                'category_name.max' => 'Emri i kategorise duhet kete me pak se 25 karaktere!',
            ]
        );
        //ELOQUENT way

        // here data should be inserted manually
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        //or but date is addedd automatically
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();


        //QUERY BUILDER way

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function Edit($id)
    {
        //eloquent
        // $categories = Category::find($id);

        //query buildes
        $categories = DB::table('categories')->where('id', $id)->first();

        return view('admin.category.edit', compact('categories'));
    }


    public function Update(Request $request, $id)
    {

        $request->validate(
            [
                'category_name' => 'required',
            ]
        );

        // Category::find($id)->Update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $toUpdated = DB::table('categories')->where('id', $id)->first();
        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category ' . $toUpdated->category_name . " is updated to " . $request->category_name,
            'alert-type' => 'warning'
        );

        return Redirect()->route('categories')->with($notification);
    }


    public function softDelete($id)
    {
        //eloquent
        $categories = Category::find($id)->delete();

        //query buildes
        // $categories = DB::table('categories')->where('id', $id)->first();

        $notification = array(
            'message' => 'Category moved to trash',
            'alert-type' => 'warning'
        );

        return Redirect()->back()->with($notification);
    }


    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Category restored Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }


    public function Delete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
