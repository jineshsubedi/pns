<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-category', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-category',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-category',   ['only' => ['destroy']]);
        $this->middleware('permission:read-category',   ['only' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title')->paginate(30);
        return view('Admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'title.*' => ['required', 'unique:categories,title'],
            'icon.*' => ['sometimes'],
        ])->validate();
        foreach ($request->title as $k=>$title) {
            Category::create(['title' => $title, 'icon' => request('icon')[$k]]);
        }
        return redirect()->route('admin.category.index')->with('success', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());
        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfully');
    }
}
