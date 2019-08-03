<?php include('server.php') ?>
<html>
<head>
 <title>Registration</title>

 <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

 </head>
 <body>


   <div class="container">
      <div >
 <ul>
  
   <li><a href="login.php">Home</a></li>

   <li><a href="contact.php">contact</a></li>

   
</ul>
</div>
   <br>
   <form action="registration1.php" method="post">
   
   <?php include('errors.php') ?>
    
<?php  $errors = array(); ?>
   
   <h2>Captcha generator</h2>
   <div>
       <label for="username">Username:</label>
       <input type="text" id="user" name="username" required>
    </div>
 
   <button  type="submit" onclick="captcha()" name="generate" >Generate Captcha</button>
     
  <div id="resul" style="color:black;">


  </div>

<div id="cool" style="color:black;">

</div>

   </form>
   </div>
   </body>
   </html>

<script>
 
 function captcha()
{
 
  $.ajax({
  
    url:"generate1.php",
    method:"post",
    dataType:"text",
    success:function(data){
    $('#resul').html(data);
  }
  
  })
}


function check()
{
   var name=document.getElementById("user").value;
   var answer=document.getElementById("answer").value;
   $.ajax({
  
  url:"check.php",
  method:"post",
  data:{
      
        name: name,
        answer: answer
  },
  dataType:"text",
  success:function(data){
  $('#cool').html(data);
}

})
}


</script>
   