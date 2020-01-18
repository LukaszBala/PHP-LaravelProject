@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit subject:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('subject.update',['id' =>$subject->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label>Current Name: {{$subject->name}}<br>Name: <input type="text" name="name"></label> <br>
                <label>Current Description: {{$subject->description}}<br>Description: <input type="text" name="description"  ></label> <br>
                <label>Current Capacity: {{$subject->signup_capacity}}   Current Signup Students number: {{$subject->signup_current}}<br>Capacity: <input type="text" name="capacity"></label> <br>
                <input type="submit" name="update" value="Update">
            </form>
            <form method="POST" action="{{route('subject.delete', $subject->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <input type="submit" value="Delete" name="delete">
            </form>
        </div>
    </div>
</div>
@endsection
