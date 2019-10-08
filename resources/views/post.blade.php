@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{ $post->title }}</h3>
                    
                    <h5>Written by: {{ $post->user->name }}</h5>
                    {{ $post->body }}

                    <form action="/post/{{ $post-> id}}/comment" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="body">Body</label>
                            <input type="text" class="form-control" id="body" name="body">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h4>Comments</h4>
                    @forelse ($post->comments as $comment)
                    {{ $comment->body }}</br>
                    @empty
                    No comments</br>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection