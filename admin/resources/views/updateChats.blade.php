<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>update chat & reply</title>
  </head>
  <body>
    <br>
    <h3 class="text-center">Chat & Reply</h3>
    
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

        <table class="table">
  <thead>
    <tr>
      <th scope="col">Queries</th>
      <th scope="col">Type</th>
      <th scope="col">Edits</th>
    </tr>
  </thead>
  <tbody>
  @foreach($q1 as $row)
    <tr>
      <th scope="row">{{$row->queries}}</th>
      <td>{{$row->type}}</td>
      <form action="{{url('/')}}/UpdatebyID" method="get">
        @csrf
      <td><a href="{{$row->enrollno}}">
        <input type="hidden" name="enrollid" value="{{$row->enrollno}}">
            <button type="submit" class="btn btn-warning">Edit</button>
        </a>
         </td>
         </form>
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



        
        
    