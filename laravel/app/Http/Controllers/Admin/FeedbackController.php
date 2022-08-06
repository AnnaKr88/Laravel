<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback= Feedback::select()
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('admin.feedback.index', ['feedbackList' => $feedback]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $data = $request->all();
        $create = Feedback::create($data);

        if($create)
        {
            return redirect()->route('feedback')->with('success', 'Сообщение отправлено');
        }
        return back()->with('errors', 'Ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return view('admin.feedback.show', ['feedback' => $feedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $delete = $feedback->delete();
        if($delete){
            return redirect()->route('admin.feedback.index')->with('success', 'Сообщение удалено');
        }
        return back()->with('errors', 'Ошибка');
    }
}
