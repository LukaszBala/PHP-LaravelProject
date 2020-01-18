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


            <form method="POST" action="{{ route('teacher.update',['id' =>$teacher->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label>Current Password: <br><input type="password" name="previous"></label> <br>
                <label>New Password: <br><input type="password" name="new"></label> <br>
                <label>Retype Password: <br><input type="password" name="repeat"></label> <br>
                <input type="submit" name="update" value="Update">
            </form>

        </div>
    </div>
</div>
@endsection
