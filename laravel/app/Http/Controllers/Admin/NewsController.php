<?php

namespace App\Http\Controllers\Admin;

//use App\Services\FakeNewsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList = News::select()
        ->paginate(5);
        return view('admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        //dd($category);
        return view('admin.news.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->only(['title', 'description', 'info']);
        $data['slug'] = \Str::slug($data['title']);

        $create = News::create($data);
        if($create) {
            return redirect()->route('admin.news.index')->with('success', 'Новость добавлена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $category = Category::all();

        return view('admin.news.edit', ['news' => $news, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $data = $request->except(['slug']);
        $data['slug'] = \Str::slug($data['title']);

        $save = $news->fill($data)->save();
        if($save) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $delete = $news->delete();
        if($delete) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена.');
        }
        return back()->withInput()->with('errors', 'Ошибка');
    }
}
