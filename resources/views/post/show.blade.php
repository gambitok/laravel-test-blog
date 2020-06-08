@extends('layout')
@section('content')
    <h1>{{$post->name}}     <a href="{{route('post.edit',$post->id)}}" class="btn btn-secondary">Edit</a></h1>
    <div class="text-content jumbotron">
        {{$post->content}}
    </div>
    @if($post->file)
    <div class="post-file">
        <label>
            Download file
            <a href="{{Storage::url($post->file)}}">{{Arr::get(pathinfo($post->file),'filename')}}</a>
        </label>
    </div>
    @endif
    <hr/>
    <span class="comments__title">@lang('Comments')</span>
    @include('_partials.commentform',['type'=>'post','id'=>$post->id])
    @include('_partials.comments')
@endsection
