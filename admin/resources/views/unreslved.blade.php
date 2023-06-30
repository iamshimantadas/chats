<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unresolved quesries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <br>
    <a href="{{url('/')}}/adminpanel"><button class="btn btn-primary">back to home</button></a>
    <br>
<p class="text-center" style="font-size:30px;color:blue;">Unresolved Quesries</p>
<br>

<div class="row">
    <!-- unresolved user's queries -->
<div class="col-1"></div>
<div class="col-10">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Query</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($rec as $rec)
    <tr>
      <th scope="row">{{ $rec->queries }}</th>
      <td>{{ $rec->dates }}</td>
      <td>{{ $rec->msgtime }}</td>
      <td> <form action="{{url('/')}}/unresolved_form" method="post"> @csrf <input type="hidden" value="{{ $rec->enrollno }}" name="queryid" id="queryid" required> <input type="hidden" value="{{ $rec->queries }}" name="msg" id="msg" required> <input type="submit" value="solve" class="btn btn-dark"> </form> </td>
    </tr> 
    @endforeach
  </tbody>
</table>

</div>
<div class="col-1"></div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>


    
    
