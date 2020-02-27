<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('auth.drafts.new');
    }

    public function showTopPage()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('top', compact('articles'));
    }

    public function search(Request $request)
    {
        // 「バリデーション」
        $request->validate([
            'search' => 'required|max:255',
        ]);

        // 「本文にキーワードが含まれる記事を取り出す」
        $articles = Post::where('title','like','%'.$request->search.'%')->get();

        // 「その記事をビューに返す」
        return view('top', compact('articles'));
    }

    public function postArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'tags' => 'required|string',
            'article' => 'required|string',
        ]);

        $tags = explode(' ', $request->tags);
        $tag1 = $tags[0];
        $tag2 = (isset($tags[1])) ? $tags[1] : null;
        $tag3 = (isset($tags[2])) ? $tags[2] : null;

        $article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'body' => $request->article,
        ]);
        return redirect("/drafts/{$article->id}");
    }

    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();

        $like = $article->likes()->where('user_id', Auth::user()->id)->first();
        return view('auth.item', compact('article', 'like'));
    }
}
