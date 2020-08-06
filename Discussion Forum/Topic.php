<?php
session_start();
include ('db.php');
  if ((!$_POST['Topic_Title']) || (!$_POST['post_text'])) {
     header("Location: home.html");
     exit;
}
 
if(isset($_POST['submit'])){
  $topic_title=$_POST['Topic_Title'];
  $post_text=$_POST['post_text'];
  $username=$_SESSION['username'];
 
 $add_topic ="INSERT INTO `topics`(`Topic_Title`,`Topic_Creator`) VALUES ('$topic_title','$username')";
  mysqli_query($con,$add_topic) or die(mysqli_error($con));
  
 
  $topic_id = mysqli_insert_id($con);
  
 
 $add_post = "INSERT INTO `posts`( `Topic ID`,`Post Text`,`Post Creator`) VALUES ('$topic_id','$post_text','$username')";
 mysqli_query($con,$add_post) or die(mysqli_error($con));
 
  
  $msg = "<h1>The <strong>$topic_title</strong> topic has been created.</h1>";
}
  ?>
  <html>
  <head>
    <style>
      body {background-color: powderblue;}
       h1   {color: blue; font-size: 40px;}
       .home p input[type=submit]{
        background-color: #e96710;
        border: none;
       color: white;
       padding: 16px 32px;
       text-decoration: none;
       margin: 4px 2px;
       cursor: pointer;
       font-size: 15px;
    
       }
</style>
  <title>New Topic Added</title>
  </head>
 <body >
  <h1>New Topic Added</h1>
  <?php print $msg; ?>
  <div class="home">
  <form method="POST" action="profile.php">
  <p><input type="submit" name="Home"  value="Return Home"></p>
</form>
</div>
  </body>
  </html>
  
   
    
    
      