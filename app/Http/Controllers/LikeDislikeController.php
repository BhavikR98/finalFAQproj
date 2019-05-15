<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Answer;
use App\Like;
use App\Dislike;


class LikeDislikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function view($answer_id)
    {
        $answers = Answer::where('id', '=', $answer_id)->get();
        $ansId = Answer::find($answer_id);
        $likeCount = Like::where(['answer_id' => $ansId->id])->count();
        $dislikeCount = Dislike::where(['answer_id' => $ansId->id])->count();
        return view('answers.view',['answers' => $answers, 'likeCount' => $likeCount, 'dislikeCount' => $dislikeCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function like($id)
    {
        $user = Auth::user()->id;
        $liked = Like::where(['user_id' => $user, 'answer_id' => $id])->first();
        if (empty($liked->user_id)) {
            $user_id = Auth::user()->id;
            $answer_id = $id;
            $like = new Like;
            $like->user_id = $user_id;
            $like->answer_id = $answer_id;
            $like->save();
            return redirect()->back()->with('message', 'You Liked the Answer');
        } else {
            return redirect()->back()->with('message', 'You Liked the Answer');
        }
    }
    public function dislike($id)
    {
        $user = Auth::user()->id;
        $disliked = Dislike::where(['user_id' => $user, 'answer_id' => $id])->first();
        if (empty($disliked->user_id)) {
            $user_id = Auth::user()->id;
            $answer_id = $id;
            $dislike = new Dislike;
            $dislike->user_id = $user_id;
            $dislike->answer_id = $answer_id;
            $dislike->save();
            return redirect()->back()->with('message', 'You Disliked the Answer');
        } else {
            return redirect()->back()->with('message', 'You Disliked the Answer');
        }
    }
}
