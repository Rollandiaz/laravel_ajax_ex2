<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
            <div class="col-lg-6">
                @yield('form')
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        function getData() {
            $.getJSON( "{{ url('/ajax/get_data') }}", function( data ) {
                var items = [];
                var number = 1;
                $.each( data.data, function( key, val ) {
                    items.push( `<tr><td>${number}</td><td>${val.name}</td><td>${val.address}</td><td>${val.phone_number}</td><td>${val.email}</td></tr>` )
                    number += 1
                });

                $(".table .loadData").html(items);
            });
        }
        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            getData()

            $('.ajaxForm').on('submit',(e)=>{
                var input = $("#nameInput").val()
                e.preventDefault()
                $.post( "{{ url('/ajax/create') }}",{ name: input}, function( data ) {
                    getData()
                    $("#nameInput").val('')
                });
            })
        });
    </script>
  </body>
</html>