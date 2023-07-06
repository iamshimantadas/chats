<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enquieries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
   <br>
   <a href="{{url('/')}}/adminpanel">
    <button class="btn btn-primary" style="float:left;position:left;margin-left:30px;">
        back to home
    </button>
   </a>

   <a href="{{url('/')}}/clear_all_enq">
    <button class="btn btn-danger" style="float:right;position:right;margin-right:30px;">
        clear all
    </button>
   </a>

  <br>
  <br>
  <br>


  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">

    <table class="table table-bordered border-primary">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">User Type</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>

  @foreach($rec as $rec)
    <tr>
      <td scope="row">{{$rec->name}}</td>
      <td scope="row">{{$rec->phone}}</td>
      <td scope="row">{{$rec->usertype}}</td>
      <td scope="row">{{$rec->msg}}</td>
      <td scope="row">{{$rec->date}}</td>
      <td scope="row">{{$rec->time}}</td>  
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
