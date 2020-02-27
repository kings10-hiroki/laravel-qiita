@extends('layouts.app')

@section('content')

<div class="item-page-wrapper">
    <div class="item-wrapper">
        <div class="item-header">
            <div class="date">{{ $article->created_at }}</div>
        </div>
        <div class="item-title">{{ $article->title }}</div>
        <div class="item-tags">
            <div class="item-tag">{{ $article->tag1 }}</div>
            @if ($article->tag2)
                <div class="item-tag">{{ $article->tag2 }}</div>
            @endif
            @if ($article->tag3)
                <div class="item-tag">{{ $article->tag3 }}</div>
            @endif
        </div>
        @if (Auth::check())
            @if ($like)
                {{ Form::model($article, array('action' => array('LikesController@destroy', $article->id, $like->id))) }}
                    <button type="submit">
                        <img src="/images/heart-pink.svg">
                        Like {{ $article->likes_count }}
                    </button>
                {!! Form::close() !!}
            @else
                {{ Form::model($article, array('action' => array('LikesController@store', $article->id))) }}
                    <button type="submit">
                        <img src="/images/heart-gray.svg">
                        Like {{ $article->likes_count }}
                    </button>
                {!! Form::close() !!}
            @endif
        @endif
        <div class="item-body">{{ $article->body }}</div>
    </div>
</div>
@endsection