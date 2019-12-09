<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <h1><a href="#" id="bksv" data-value="32">กดเพือทดสอบ Ajax</a></h1> 
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">





                    <script
                    src="https://code.jquery.com/jquery-3.2.1.js"
                    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                    crossorigin="anonymous"></script>
                    <script type="text/javascript">

                    $(document).ready(function() {
                        $("#bksv").click(function(e){
                            e.preventDefault();
                                var data = $("#bksv").data().value;
                                console.log(data);

                                $.ajax({
                                    url: '/save-book',
                                    data: {'id': data, "_token": $('#token').val()},
                                    type: 'POST',


                                    success: function (response) {
                                        //document.write(response);
                                        //document.getElementById("msd").innerHTM = response;
                                        $('#msd').html(response);
                                    },
                                    error: function (response) {

                                    }
                                });



                            });
                    });



                    </script>

                    <div id="msd"></div> <!-----------------แสดงผล-->

                    <form action="{{url('/save-book3')}}" method="POST">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="text" name="id">
                        <input type="submit" value="กด">
                    </form>


            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{URL::to('/2')}}">input Text</a>
                
                </div>
            </div>
        </div>
    </body>
</html>
