<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat service[Sir Gurudas Mahavidyalaya]</title>
    
    <link rel="icon" type="image/x-icon" href="girl.jpg">

    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



</head>
<body style="background-color:#6666ff">

    <div class="wrapper">
        <div class="title">Chat Assistant(disha)</div>
        <div class="form">
            <div class="bot-inbox inbox">
            <div class="icon">
                <img src="girl.jpg" class="icon">
                </div>
                <div class="msg-header">
                    <p>Hello, I'm Disha, how can I help you? You can ask me anything with respect to this site.</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>


    <!-- form -->
    <!-- The Modal -->
<div id="myModal" style="display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">

<!-- Modal content -->
<div style=" position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s">

  <div style=" padding: 2px 16px;
  background-color: green;
  color: white;">
      <span style=" color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;"><button onclick="spanAct()" style="background-color:green;color:white;" >&times;</button></span>  
    <h2>Enquiry Form</h2>
  </div>
  <div style="padding: 2px 16px;">
      <br>
      <br>

      <form id="enquiryFORM" name="enquiryFORM" method="POST">
          <div class="mb-3">
            <label for="fname" class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your full name ... " name="fname" id="fname" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter you 10 digit phone number ... " name="phone" id="phone" required>
          </div>
          <div class="mb-3">
          <label for="personIden">Your Occupation</label>
          <select class="form-select" name="personIden" id="personIden" aria-label="Default select example" required>
            <option value="visitor" selected>visitor</option>
            <option value="new student">new student</option>
            <option value="faculty">faculty(college staff)</option>
          </select>    
        </div>
          <div class="mb-3">
        <label for="uquery" class="form-label">Your Query/Message</label>
         <textarea class="form-control" id="uquery" name="uquery" placeholder="Enter your query/message for us...." rows="7" required></textarea>
        </div>
          <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
        <br>
        
  </div>
</div>

</div>


    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="girl.jpg" class="icon" style="background:green;"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
    

</body>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    console.log('button pressed!');
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
    function act(){
        console.log('button pressed!');
  modal.style.display = "block";
    }
    function spanAct(){
        modal.style.display = "none";   
    }
    function windowAct(event){
        if (event.target == modal) {
    modal.style.display = "none";
  }
    }
</script>

<script>
    $(document).ready(function(){
        $('#submit').click(function(e){
            e.preventDefault();

            let name = $('#fname').val();
            let phone = $('#phone').val();
            let personIden = $('#personIden').val();
            let query = $('#uquery').val();

            // indian phone number validity
            let NUM = parseInt(phone.charAt(0));
            // checks number start with 6/7/8/9
            if(phone.length==10){
               
             switch(NUM){
              case 9:

                $.ajax({
            url:"enquiryform.php",
            method:"POST",
            data:{name:name,phone:phone,enquery:query,iden:personIden},
            success:function(data){

                if(data){
                    alert(data);
                console.log(data);

                // reset all registration form fields
           $('#enquiryFORM')[0].reset();

           modal.style.display = "none";  

                }else{

                }
                
            }
        });

                break;
                case 8:

                  $.ajax({
            url:"enquiryform.php",
            method:"POST",
            data:{name:name,phone:phone,enquery:query,iden:personIden},
            success:function(data){

                if(data){
                    alert(data);
                console.log(data);

                // reset all registration form fields
           $('#enquiryFORM')[0].reset();

           modal.style.display = "none";  

                }else{

                }
                
            }
        });

                  break;
                  case 7:

                    $.ajax({
            url:"enquiryform.php",
            method:"POST",
            data:{name:name,phone:phone,enquery:query,iden:personIden},
            success:function(data){

                if(data){
                    alert(data);
                console.log(data);

                // reset all registration form fields
           $('#enquiryFORM')[0].reset();

           modal.style.display = "none";  

                }else{

                }
                
            }
        });


                    break;
                    case 6:

                      $.ajax({
            url:"enquiryform.php",
            method:"POST",
            data:{name:name,phone:phone,enquery:query,iden:personIden},
            success:function(data){

                if(data){
                    alert(data);
                console.log(data);

                // reset all registration form fields
           $('#enquiryFORM')[0].reset();

           modal.style.display = "none";  

                }else{

                }
                
            }
        });

        
                      break;
                      default:
                        alert("NUMBER MAY START WITH 9/8/7/6 ");
                        break;
             }

              }
              else{
                  alert('NUMBER LENGTH MUST BE 10 DIGIT!');
              }

        

        });
    });
</script>
</html>