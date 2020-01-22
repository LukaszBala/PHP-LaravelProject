<head>
    <style>
        body{
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;
        }
        h2{
            color: #ebebeb;
        }
        form{
            color: #ebebeb;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="container-fluid mb-6"  >
                    <div class="row">
                        <div class="col-md-10" style="background: rgba(0,0,0,0.4); margin-top: 90px;  box-shadow: 1px 4px 40px black">
                            <div class=" md-12">
                                <div class="card-body text-center">
                                    <h2 style="margin-top: 2%">{{$student->name." ".$student->surname}}</h2>
                                    <h2>Email: {{$student->email}}</h2>
                                    <button style="color:#3f3f3f;background-color: #D3D3D3; margin: 5%; width: 50%" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#resetModal" onclick="document.getElementById('reset').disabled = true; document.getElementById('newpassword').value = ''">Reset password</button>
                                    <form method="POST" action="{{route('student.delete', $student->id)}}">
                                        @csrf
                                        {{ method_field('DELETE')  }}
                                        <input type="submit" value="Delete" name="delete">
                                    </form>
                                    <!-- Pop up modal -->
                                    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Reset student password</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Click randomize to create new password. It will appear here.</p>
                                                    <label>Password:</label><br>
                                                    <textarea id="newpassword" class="justify-content-center" style="width:70%" disabled></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <span class="pull-right">
                                                        <script>
                                                            function randPass(length) {
                                                                return (Math.random().toString(36).substr(2, length));
                                                            }
                                                        </script>
                                                        <form method="POST" action="{{ route('deaneries.student_resetPass', ['id' => $student->id]) }}">
                                                            @csrf
                                                            {{method_field('PATCH')}}
                                                            <input type='hidden' id="new" name='new'/>
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('newpassword').value = randPass(8); document.getElementById('reset').disabled = false; document.getElementById('new').value = document.getElementById('newpassword').value">Randomize</button>
                                                            <input type="submit" disabled id="reset" name="reset" class="btn btn-success" value="Reset">
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
