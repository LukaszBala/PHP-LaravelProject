@extends('layouts.app')

@section('content')

            <script>
                function displayDegree(i) {
                    let val = 'val' + i;
                    let range = 'range' + i;
                    document.getElementById(val).value = document.getElementById(range).value;
                }

                function showSlider(i) {
                    let span = 'span' + i;
                    let btn = 'showSlider' + i;
                    document.getElementById(span).style.display = "block";
                    document.getElementById(btn).style.display = "none";
                }

                function showCheck(i) {
                    let span = 'szpan' + i;
                    let btn = 'showCheck' + i;
                    document.getElementById(span).style.display = "block";
                    document.getElementById(btn).style.display = "none";
                }
            </script>
            <style>
                label, input, button, form {
                    display: inline;
                    margin: 5px;
                }
            </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1></h1>
                <h2>Subject: {{$subject->name}} </h2>
                <h2>Student: {{$student->name}} {{$student->surname}}</h2>
                <ol type = "1">
                    <?php $j = 0; $i = 0; $g = 0; $avg = 0; ?>
                    @foreach ($subject->lesson as $lessons)
                        @foreach($student->degree as $degrees)
                            @if($degrees->lesson_number == $lessons->id)
                                <li>
                                    {{$lessons->title}} Degree:

                                    <?php
                                        if(!is_null($degrees->degree))
                                            {
                                                echo $degrees->degree;
                                                $avg = $avg + $degrees->degree;
                                                $j = $j+1;
                                            }
                                        else
                                            {
                                                echo 'No Degree';
                                            }

                                    ?>
                                    <div class="row">
                                        <button onclick="showSlider({{$i}})" id="showSlider{{$i}}">Edit Degree</button>
                                        <span style="display:none" id="span{{$i}}">
                                    <form method="POST" action="{{route('lesson.addDegree',$degrees->id)}}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                    <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                    <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                    <button type="submit">Update degree</button></form></span>
                                    </div>
                                </li>
                                <br>
                                <?php $i = $i+1?>
                            @endif
                        @endforeach
                        @foreach($student->presence as $presences)
                                @if($presences->lesson_number == $lessons->id)
                                    Presence:
                                    @if(is_null($presences->presence))
                                        Not Checked
                                    @elseif($presences->presence == 0)
                                        Absent
                                    @else
                                        Present

                                    @endif
                                    <div class = "row">
                                        <button onclick="showCheck({{$g}})" id="showCheck{{$g}}">Edit Presence</button>
                                        <span style="display:none" id="szpan{{$g}}">
                                                <form method="POST" action="{{route('lesson.addPresence',$presences->id)}}">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                <label>Presence: </label><input type="checkbox" name="presence">
                                                <button type="submit">Update Presence</button></form></span>
                                    </div>
                                    <?php $g = $g + 1?>
                                @endif
                            @endforeach
                    @endforeach
                </ol>

                <?php if ($avg != 0)
                    $avg = $avg / $j;
                ?>


                Average:
                <?php
                if ($avg != 0)
                    echo $avg;
                ?>
                    <br>
                        Ocena koncowa:
                                    <?php
                                    if(!is_null($subjectDegree->degree))
                                    {
                                        echo $subjectDegree->degree;
                                    }
                                    else
                                    {
                                        echo 'No Degree';
                                    }

                                    ?>
                        <div class="row">
                                            <button onclick="showSlider({{$i}})" id="showSlider{{$i}}">Edit Degree</button>
                                            <span style="display:none" id="span{{$i}}">
                                                            <form method="POST" action="{{route('subject.addDegree',$subjectDegree->id)}}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}
                                                            <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                                            <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                                            <button type="submit">Update degree</button></form></span>
                                        </div>


            </div>
        </div>
    </div>
@endsection
