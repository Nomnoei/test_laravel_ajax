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



            <h1> <a href="testapi2/create" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">เพิ่มข้อมูล</a> </h1>

            <div class="content">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>City</th>
                  <th>status</th>
                </tr>


                {{-- {{print_r($data2)}} --}}
                @foreach ($data2 as $key => $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->city}}</td>
                    <td> <a href="{{URL::to('/testapi2/delete/'.$data->id)}}" class="btn btn-danger">ลบ</a>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edtiModal{{$data->id}}">แก้ไข</a>
                    </td>
                  </tr>

                  <div class="modal fade" id="edtiModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Memder</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>



                              </div>
                              <div class="modal-body">
                                <form class="" action="{{url('/testapi2/updateapi/')}}" method="post">

                                    <div class="form-group">
                                        <label for="name">ชื่อ : </label>
                                        <input type="text" name="name" value="{{$data->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">เมือง : </label>
                                        <select class="" name="city">


                                      @foreach ($provinces as $province)
                                        @if ($data->city == $province->PROVINCE_NAME)
                                            <?php $selected = "selected"; ?>
                                        @else
                                          <?php $selected = ""; ?>
                                        @endif
                                          <option value="{{$province->PROVINCE_NAME}}" {{$selected}}>{{$province->PROVINCE_NAME}}</option>
                                      @endforeach
                                      </select>
                                        {{-- <input type="text" name="city" value="{{$data->city}}"> --}}
                                    </div>
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn btn-warning" name="" value="กดเพื่อเพิ่มข้อมูลลง API ">

                                </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                              </div>
                          </div>
                      </div>
                  </div>
                  <script>
                      $('#edtiModal{{$data->id}}').on('show.bs.modal', function(event) {
                          var button = $(event.relatedTarget) // Button that triggered the modal
                          var recipient = button.data('whatever') // Extract info from data-* attributes
                          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                          var modal = $(this)
                          modal.find('.modal-title').text('New message to ' + recipient)
                          modal.find('.modal-body input').val(recipient)
                      })
                  </script>



                @endforeach

                </table>
                <div class="title m-b-md">

                </div>
            </div>
        </div>

        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Memder</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>



                    </div>
                    <div class="modal-body">
                      <form class="" action="{{url('/testapi2/insert')}}" method="post">

                          <div class="form-group">
                              <label for="name">ชื่อ : </label>
                              <input type="text" name="name" value="">
                          </div>
                          <div class="form-group">
                              <label for="city">เมือง : </label>
                              <select class="" name="city">


                            @foreach ($provinces as $province)
                                <option value="{{$province->PROVINCE_NAME}}">{{$province->PROVINCE_NAME}}</option>
                            @endforeach
                            </select>
                              {{-- <input type="text" name="city" value="{{$data->city}}"> --}}
                          </div>
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="submit" class="btn btn-primary" name="" value="กดเพื่อเพิ่มข้อมูลลง API ">

                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#insertModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
            })
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
