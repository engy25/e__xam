@extends('layouts/student.app')
@section('content')
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/css/Student-StartExam.css') }}"/>


<div class="content">
        <br><br><br><br><br>

        <div class="container">


            <div class="jumbotron my-4" style="background-color:#F0F0F0;margin-top:-50px;">

                <form class="form"  method="post" action= "{{route('storeAnsweres')}}">
                    @csrf 

                    <h1 style="text-align: center;color:#484848;margin-top:-9px;font-size:45px;">Exam</h1>
                    @foreach($questions as $question)
                    <input type="hidden" name="questions[{{ $question->id }}]" value="">

                    <h3 class="text-info" >{{$question->question_title}}</h3><h4 style="text-align: right;color:#484848;">{{$question->mark}}</h4>

                    
                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option1" value="{{$question->option_one}}">
                        <label class="form-check-label" for="option1">
                        {{$question->option_one}}
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option2" value="{{$question->option_two}}">
                        <label class="form-check-label" for="option2">
                        {{$question->option_two}}
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option3" value="{{$question->option_three}}">
                        <label class="form-check-label" for="option3">
                        {{$question->option_three}}
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option4" value="{{$question->option_four}}">
                        <label class="form-check-label" for="option4">
                        {{$question->option_four}}
                        </label>
                    </div>
            
@endforeach

<h1 style="text-align: center;color:#484848;"></h1>
                    @foreach($questiontF as $question)
                    <input type="hidden" name="questiontF[{{ $question->id }}]" value="">

                    <h3 class="text-info" >{{$question->question_title}}</h3><h4 style="text-align: right;color:#484848;">{{$question->mark}}</h4>

                    
                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questiontF[{{ $question->id }}]" id="true" value="T">
                        <label class="form-check-label" for="option1">
                        {{$question->op_true}}
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="questiontF[{{ $question->id }}]" id="false" value="F">
                        <label class="form-check-label" for="option2">
                        {{$question->op_false}}
                        </label>
                    </div>

                   @endforeach






<button type="submit" class="submitbtn"> Submit</button>
                </form>
                
            </div>

        </div>

        <br><br><br>
    </div>


<!--PopUp box Start-->
<div class="card open" id="pupup">
    <img src="images/mark.png" />
    <h1>Time Over!</h1>
    <button onclick="hide_pupup()">Ok</button>
</div>
<!--PopUp box End-->



    <script>
        // const TIME_LIMIT =document.getElementById('timer').Value;
        const TIME_LIMIT ={{$timer}};

        let timePassed = 0;
        let timeLeft = TIME_LIMIT;

        const FULL_DASH_ARRAY = 283;


        
        
        const WARNING_THRESHOLD = 10;

        const ALERT_THRESHOLD = 5;

        const COLOR_CODES = {
            info: {
                color: "green"
            },
            warning: {
                color: "orange",
                threshold: WARNING_THRESHOLD
            },
            alert: {
                color: "red",
                threshold: ALERT_THRESHOLD
            }
        };

        let remainingPathColor = COLOR_CODES.info.color;


        function formatTimeLeft(time) {
            /*  formatting minutes:
                we format minutes by getting the round integer less than or equal to the result of 'time / 60'
            */ 
            const hours = Math.floor(time / 60 / 60);

            time = time - (hours*60*60);

            const minutes = Math.floor(time / 60);

            /* formatting seconds:
               we format seconds by getting the remainder of the time divided by 60 using the modulus operator
            */
            let seconds = time % 60;

            // if value of seconds < 10 then add '0' before it
            if (seconds < 10 ) {
                seconds = `0${seconds}`;
            }

            // return the result in MM:SS format
            return `${hours}:${minutes}:${seconds}`;
        }
        document.getElementById('base-timer-label').innerHTML = formatTimeLeft(timeLeft);

        let timerInterval = null;

        function startTimer() {
        timerInterval = setInterval(() => {
            
            // The amount of time passed increments by one
            timePassed += 1;
            timeLeft = TIME_LIMIT - timePassed;

           
            // The time left label is updated
            document.getElementById("base-timer-label").innerHTML = formatTimeLeft(timeLeft);

            setCircleDasharray();
            setRemainingPathColor(timeLeft);
            
             if (timeLeft === 0) {
                clearInterval(timerInterval);
                // alert( "Time is up, You can no longer submit your answer" );
                // document.getElementById('finish').disabled = true;
                document.getElementById('myquiz').submit();

                 window.location.href = "{{route('storeAnsweres')}}";
            }
        }, 1000);
        }

        startTimer(); // we must call the function

        // Add the current path color to path element style
        document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;


        function calculateTimeFraction() {
            const rawTimeFraction = timeLeft / TIME_LIMIT;
            return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }
            
        // Change the value of dasharray as time passes, starting from 283
        function setCircleDasharray() {
            const circleDasharray = `${(
                calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 283`;
            document.getElementById("base-timer-path-remaining").setAttribute("stroke-dasharray", circleDasharray);
        }

        function setRemainingPathColor(timeLeft) {
            const { alert, warning, info } = COLOR_CODES;

            
            if (timeLeft <= alert.threshold) {
                // Change the color of remaining path to alert
                remainingPathColor = COLOR_CODES.alert.color;
                document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;

            
            } else if (timeLeft <= warning.threshold) {
                // Change the color of remaining path to warning
                remainingPathColor = COLOR_CODES.warning.color;
                document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;
            }
        }

//statr functions of pupup
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
            window.open("Student-ExamResult.html","_self");
        }

//end functions of pupup
    </script>
@endsection