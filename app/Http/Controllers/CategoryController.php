<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('courses')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function createPage()
    {
        return view('admin.category.create-category');
    }

    public function createCategory(Request $request)
    {
        $this->validateCategoryRequest($request);
        $data = $this->getRequestData($request);
        if ($request->hasFile('image')) {
            $data['image'] = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $data['image']);
        }

        Category::create($data);
        toastr()->success('A new category has been created!', 'Successful!');
        return redirect()->route('admin.category');
    }

    public function editCategory($id)
    {
        $chosenItem = Category::findOrFail($id);
        return view('admin.category.edit', compact('chosenItem'));
    }

    public function updateCategory(Request $request)
    {
        $this->validateCategoryRequest($request);

        $data = $this->getRequestData($request);

        if ($request->hasFile('image')) {
            $data['image'] = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $data['image']);
        }

        Category::where('id', $request->id)->update($data);

        toastr()->success('An existing category has been updated!', 'Action completed!');
        return redirect()->route('admin.category');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        toastr()->success('A category has been removed', 'Action Complete!');
        return back();
    }

    private function validateCategoryRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$request->id,
            'description' => 'required',
        ]);
    }

    private function getRequestData(Request $request)
    {
        return [
            'name' => $request->name,
            'description' => $request->description,
        ];
    }
}

