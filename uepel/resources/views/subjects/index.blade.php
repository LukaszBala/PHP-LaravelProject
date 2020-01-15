@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Subjects: </h2>
            <a href={{route('subject.create')}}>Create new...</a>
            <ul>
                @foreach ($teacher->subject as $subject)
                    <li><strong>{{ $subject->name }}</strong></li>
                    <a href="/Subjects/{{ $subject->sub_capacity }}">details</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
