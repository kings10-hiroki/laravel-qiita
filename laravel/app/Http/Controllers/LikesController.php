<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Request $request, $id)
    {
        Like::create(
            array(
                'user_id' => Auth::user()->id,
                'post_id' => $id
            )
        );

        $post = Post::findOrFail($id);

        return redirect()->action('Auth\PostController@showArticle', $post->id);
    }

    public function destroy($id, $like)
    {
        $post = Post::findOrFail($id);
        $post->like_by()->findOrFail($like)->delete();

        return redirect()->action('Auth\PostController@showArticle', $post->id);
    }


}
