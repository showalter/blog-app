@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/post" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

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

                    <h2 style="margin-bottom:5px; margin-top:5px">Your Posts</h2>
                    @foreach ($posts as $post)
                    <a href="/post/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>

                    {{ $post->body }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
