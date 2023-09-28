<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at')
        ->get();
        // dd($categories->toArray());
        return view('admin.category.index',compact('categories'));
    }

    public function createPage()
    {
        return view('admin.category.create-category');
    }

    public function createCategory(Request $request)
    {
        $data = $this->requestData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        Category::create($data);
        toastr()->success('A new category has been created!','Successful!');
        return back();
    }

    // edit
    public function editCategory($id)
    {
        $chosenItem = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('chosenItem'));
    }

    public function updateCategory(Request $request)
    {
        $data = $this->requestData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        Category::where('id',$request->id)->update($data);
        toastr()->success('An existing category has been updated!','Action completed!');
        return redirect()->route('admin.category');
    }

    // delete
    public function delete($id)
    {
        Category::where('id',$id)->delete();
        toastr()->danger('A category has been removed','Action Complete!');
        return back();
    }
    private function requestData($request)
    {
        return [
            'name' => $request->name,
            'description'=> $request->description
        ];
    }
}
