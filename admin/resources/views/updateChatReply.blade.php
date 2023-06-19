
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE QUERY & REPLY</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="{{asset('ckeditor\ckeditor.js')}}"></script>

<body>
@foreach($q1 as $row)

<br>
<h4 class="text-center">Update Query & Reply</h4>
<br>

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">

    <form action="{{url('/')}}/UPDATEbyIDChatReply" method="post">
    @csrf
    <div> <input type="hidden" name="id" value="{{$row->enrollno}}"> </div>
    <div class="mb-3">
    <label for="uquery" class="form-label">Query</label>
    <input value="{{$row->queries}}" type="text" class="form-control" id="uquery" name="uquery" required>
  </div>

    <div class="mb-3">
    <label for="umode" class="form-label">Mode</label>
    <input value="{{$row->type}}" type="text" value="simple" class="form-control" id="umode" name="umode" required>
  </div>

  <textarea value="" name="editor" id="editor" cols="30" rows="10">
  {{$row->replies}}
  </textarea>
  
  <input type="submit" name="submit" value="submit" class="btn btn-success">
</form>

<script>
CKEDITOR.replace('editor');
</script>


    </div>
    <div class="col-1"></div>
</div>


@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>