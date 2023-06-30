<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>chat history</title>
  </head>
  <body>
  <br>
    <a href="{{url('/')}}/adminpanel"><button class="btn btn-primary">back to home</button></a>
    <br>
    <div class="row">
    <h3 class="text-center">Chat History
    <form action="{{url('/')}}/clearHistory" method="post">
      @csrf
      <input type="submit" value="clear history" class="btn btn-danger" style="float:right;">
    </form>
    
    </h3>
    </div>
    
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

        <table class="table">
  <thead>
    <tr>
      <th scope="col">Enroll No</th>
      <th scope="col">Queries</th>
      <th scope="col">Date</th>
      <th scope="col">Local Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach($q1 as $row)
    <tr>
      <th scope="row">{{$row->enrollno}}</th>
      <td>{{$row->queries}}</td>
      <td>{{$row->dates}}</td>
      <td>{{$row->msgtime}}</td>
    </tr>
    
    @endforeach
  </tbody>
</table>

        </div>
        <div class="col-1"></div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>



        
        
    