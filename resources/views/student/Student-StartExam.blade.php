@extends('layouts/student.app')
@section('content')
    <!--content start-->
    <div class="content" id="c">
        <br><br><br><br><br>

        <div class="container">


            <div class="jumbotron my-4" style="background-color:#F0F0F0;margin-top:-20px;">

                @foreach($questions as $question)

                    <form class="form">
                        <h3 class="text-info">{{$question->question_title}}</h3><h4 style="text-align: right;color:#484848;">[{{$question->mark}} Marks]</h4>

                        <div class="form-check mx-4">
                            <input class="form-check-input" type="radio" name="option" id="option1" value=" {{($question->option_one=="0")? "checked" : ""}}">
                            <label class="form-check-label" for="option1">
                                {{$question->option_one}}
                            </label>
                        </div>

                        <div class="form-check mx-4">
                            <input class="form-check-input" type="radio" name="option" id="option2" value=" {{($question->option_two=="0")? "checked" : ""}}">
                            <label class="form-check-label" for="option2">
                                {{$question->option_two}}
                            </label>
                        </div>

                        <div class="form-check mx-4">
                            <input class="form-check-input" type="radio" name="option" id="option3" value=" {{($question->option_three=="0")? "checked" : ""}}">
                            <label class="form-check-label" for="option3">
                                {{$question->option_three}}
                            </label>
                        </div>

                        <div class="form-check mx-4">
                            <input class="form-check-input" type="radio" name="option" id="option4" value="{{($question->option_four=="0")? "checked" : ""}}">
                            <label class="form-check-label" for="option4">
                                {{$question->option_four}}
                            </label>
                        </div>
                    </form>
                @endforeach
                <a href="{{ route('submitexamStudent') }}" class="Submit_btn">Submit</a>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->


    <!--PopUp box Start-->
    <div class="card open" id="pupup">
        <img src="images/mark.png" />
        <h1>Time Over!</h1>
        <button onclick="hide_pupup()">Ok</button>
    </div>
    <!--PopUp box End-->


    <!--JS code start-->
    <script src="{{asset('js/AdminBase.js')}}"></script>
    <script>
        var s =  5;
        var m = 0;

        var time = setInterval(function() { timer() }, 1000);

        function timer() {
            s--;
            if (s == -1) {
                m--;
                s = 59;

                if (m == -1) {
                    m = 0;
                    s = 0;

                    clearInterval(time);
                    alert("Time Over !");
                    show_pupup();
                }
            }

            document.getElementById("m").innerHTML = m;
            document.getElementById("s").innerHTML = s;
        }

        function show_pupup() {

            var x = document.getElementById("c");
            x.style.visibility = "hidden";

            var y = document.getElementById("pupup");
            y.style.opacity = "1";
            y.style.top = "30%";

            document.getElementById("pupup").classList.add('card');

        }

        function hide_pupup() {
            document.getElementById("pupup").classList.remove('card');
            window.open("{{asset('Student-ExamResult.html')}}","_self");
        }

    </script>
    <!--JS code end-->
@endsection
