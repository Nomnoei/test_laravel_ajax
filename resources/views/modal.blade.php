<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php session_start();?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

</head>

<body>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New houes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>



                    </div>
                    <div class="modal-body">
                        <form action="{{url('/modal/add')}}" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">houes:</label>
                                <input type="text" name="houes" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alley:</label>
                                <input type="text" name="Alley" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">moo:</label>
                                <input type="text" name="moo" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">district:</label>
                                <textarea class="form-control" name="district" id="message-text"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-primary">save houe</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>






        <div class="container">
          <button type="button" class="btn btn-primary mt-5 mb-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for
              @mdo</button>
              <a href="{{URL::to('modal/deleteall')}}" class="btn btn-danger">Delete Sesstion</a>

            @empty ($_SESSION["houes"])
            <h1>ไม่มีข้อมูล</h1>
            @endempty


            @isset($_SESSION["houes"])
            <table class="table">
                <tr>
                    <th>houes</th>
                    <th>Alley</th>
                    <th>moo</th>
                    <th>district</th>
                    <th>Status</th>
                </tr>

                <?php
                        $count = count($_SESSION["houes"]);
                    ?>

                @foreach ($_SESSION["houes"] as $key => $i)
                <td>{{$_SESSION["houes"][$key]}}</td>
                <td>{{$_SESSION["Alley"][$key]}}</td>
                <td>{{$_SESSION["moo"][$key]}}</td>
                <td>{{$_SESSION["district"][$key]}}</td>
                <?php
                        $num = $key;
                      ?>

                <td>
                    {{-- <a href="{{URL::to('modal/edit/'.$num )}}" class="btn btn-warning mr-1">แก้ไข</a> --}}
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$key}}" data-whatever="@mdo">แก้ไข</button>

                    <a href="{{URL::to('modal/delete/'.$num )}}" class="btn btn-danger">ลบ</a> </td>
                </tr>


                {{----------------------------------- modal -----------------------------------}}
                <div class="modal fade" id="editModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit houes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>



                            </div>
                            <div class="modal-body">
                                <form action="{{url('/modal/add')}}" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">houes:</label>
                                        <input type="text" name="houes" class="form-control" id="recipient-name" value="{{$_SESSION["houes"][$num]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Alley:</label>
                                        <input type="text" name="Alley" class="form-control" id="recipient-name" value="{{$_SESSION["Alley"][$num]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">moo:</label>
                                        <input type="text" name="moo" class="form-control" id="recipient-name" value="{{$_SESSION["moo"][$num]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">district:</label>
                                        <textarea class="form-control" name="district" id="message-text">{{$_SESSION["district"][$num]}}</textarea>
                                    </div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="num" value="{{$num}}">
                                    <button type="submit" class="btn btn-primary">save houe</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#editModal{{$key}}').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    })
                </script>
                {{----------------------------------- modal -----------------------------------}}

                @endforeach

            </table>
            @endisset




        </div>










        <script>
            $('#exampleModal').on('show.bs.modal', function(event) {
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
