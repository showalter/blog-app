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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection