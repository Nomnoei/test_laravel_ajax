<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    </head>
    <body>
        <div class="container">
            <h1>เพิ่มข้อมูลลง API</h1>
            <form class="" action="{{url('/testapi2/insert')}}" method="post">

                <div class="form-group">
                    <label for="name">ชื่อ : </label>
                    <input type="text" name="name" value="">
                </div>

                <div class="form-group">
                    <label for="city">เมือง : </label>
                    <input type="text" name="city" value="">
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="btn btn-primary" name="" value="กดเพื่อเพิ่มข้อมูลลง API ">

            </form>
        </div>
    </body>
</html>
