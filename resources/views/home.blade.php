@extends('layouts.layout')

@section('content')

<h1>新着バンドメンバー募集・バンド加入希望</h1>
@foreach($posts as $post)

<div class="post">
    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
        <div class="update-time">投稿日時：{{ $post->updated_at->format('Y年m月d日 H時i分') }}</div>
        <div class="post-top">
            @if($post->post_type == 1)
            <p class="post-type recruitment">募集</p>
            @else
            <p class="post-type join">加入</p>
            @endif
            <h2 class="title">
                {{ $post->title }}
            </h2>
        </div>
        <!-- <div class="post-middle">
            <p class="body">{{ $post->body }}</p>
        </div> -->
        <div class="post-bottom">
            <p class="user-info">投稿者：{{ \App\User::find($post->user_id)->name }}
                @foreach(\App\User::AREA as $key => $val)
                    @if(\App\User::find($post->user_id)->residence == $key)
                    ({{$val['label']}})
                    @endif
                @endforeach
            </p>
            @foreach(\App\User::GENDER as $key => $val)
                @if(\App\User::find($post->user_id)->gender == $key)
                <p class="user-info">{{ $val['label'] }}</p>
                @endif
            @endforeach
            <p class="user-info">{{ \App\User::age($post->user_id) }}
            </p>
            @foreach(\App\Post::STANCE as $key => $val)
                @if($post->stance == $key)
                <p class="user-info">活動方針：{{ $val['label'] }}</p>
                @endif
            @endforeach
        </div>
    </a>
</div>

@endforeach

<div>{{ $posts->links() }}</div>

@endsection