<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Google analytics with Laravel</title>

        <!-- Fonts -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" />
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var SITE_URL = "{{ env('APP_URL') }}";
            
        </script>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    </head>
    <body>
        <div class="container">
          <div class="lds-ellipsis" style="display: none"><div></div><div></div><div></div><div></div></div>
          <h2>Google Analytics Data With Laravel 5.6</h2>
          <p>Select a date range to filter data:</p>   
          <div class="input-group">
            <input type="text" class="form-control col-md-6 mb-4"  name="daterange" value="" />         
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Page Title</th>
                <th>Visitors</th>
                <th>Page Views</th>
              </tr>
            </thead>
            <tbody id="analytics">
              
            </tbody>
          </table>
        </div>
    </body>
</html>
