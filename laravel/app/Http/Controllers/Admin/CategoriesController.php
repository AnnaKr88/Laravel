<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catList = Category::select()
            ->with('news')
            ->orderBy('id', 'asc')
            ->paginate(5);
        $list = $catList->only('id');
        dd($list);
        return view('admin.categories.index', ['catList' => $catList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->only(['title', 'description']);
        $data['slug'] = \Str::slug($data['title']);
        $create = Category::create($data);
        if($create) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория добавлена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->only(['title', 'description']);
        $data['slug'] = \Str::slug($data['title']);

        $save = $category->fill($data)->save();
        if($save) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно обновлена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = $category->delete();
        if($delete) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }
}
