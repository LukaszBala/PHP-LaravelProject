@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>{{$student->name." ".$student->surname}}</h1>

                <h2>Email: {{$student->email}}</h2>

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#resetModal">Reset password</button>
                <!-- Pop up modal -->
                <div class="modal fade" id="resetModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Reset password</h4>
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
                                    <?php  $new = 'haslo888'; ?>
                                    <form method="POST" action="{{ route('deaneries.student_resetPass', ['id' => $student->id]) }}">
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <input type='hidden' name='new' value='<?php echo "$new";?>'/>
                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('newpassword').value = randPass(8); document.getElementById('reset').disabled = false; ">Randomize</button>
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
@endsection
