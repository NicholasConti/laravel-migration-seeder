<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Trains</title>
         @vite('resources/js/app.js')
    </head>
    <body>
        <div class="container">
            <h1>ALL TRAINS:</h1>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">Company</th>
                    <th scope="col">Departure Statioon</th>
                    <th scope="col">Arrival Station</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Train Code</th>
                    <th scope="col">Number Wagons</th>
                    <th scope="col">In Time (Y/N)</th>
                    <th scope="col">Cancelled (Y/N)</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr>
                        <td>{{$train->company}}</td>
                        <td>{{$train->station_departure}}</td>
                        <td>{{$train->station_arrival}}</td>
                        <td>{{$train->departure_time}}</td>
                        <td>{{$train->arrival_time}}</td>
                        <td>{{$train->train_code}}</td>
                        <td>{{$train->n_wagons}}</td>
                        <td>{{$train->in_time == 1 ?'Yes' : 'No'}}</td>
                        <td>{{$train->cancelled== 1 ?'Yes' : 'No'}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>              
                  
              {{-- <h1>{{(today())}}</h1> --}}

              <h1>ALL TRAINS:</h1>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">Company</th>
                    <th scope="col">Departure Statioon</th>
                    <th scope="col">Arrival Station</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Train Code</th>
                    <th scope="col">Number Wagons</th>
                    <th scope="col">In Time (Y/N)</th>
                    <th scope="col">Cancelled (Y/N)</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($today_trains as $today_train)
                    <tr>
                        <td>{{$today_train->company}}</td>
                        <td>{{$today_train->station_departure}}</td>
                        <td>{{$today_train->station_arrival}}</td>
                        <td>{{$today_train->departure_time}}</td>
                        <td>{{$today_train->arrival_time}}</td>
                        <td>{{$today_train->train_code}}</td>
                        <td>{{$today_train->n_wagons}}</td>
                        <td>{{$today_train->in_time == 1 ?'Yes' : 'No'}}</td>
                        <td>{{$today_train->cancelled== 1 ?'Yes' : 'No'}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </body>
</html>