<!DOCTYPE html>
<html language="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <h1 class="heading">Q2A Disussion Forum</h1>
        <div class ="na">
            <ul>
            <li><a href="addtopic.html">ADD A TOPIC</a></li>
            <li><a href="posts.php">OTHER'S TOPICS</a></li>
            <li><a class="logout" href="login.html?logout='1'" >LOGOUT</a></li>
            </ul>
            </div>
        <form>
           <div class="profile">
               <h1> Profile </h1>
            

<?php

include('db.php');
session_start();
if(isset(($_POST['Submit'])))
{
   
   $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM `user_data` WHERE `username`= '$username' AND  `password`='$password'";
    $run = mysqli_query($con,$query);
    
   
    
    $row=mysqli_num_rows($run);
    if($row==1){
        $user_row=mysqli_fetch_assoc($run);
        $_SESSION['username']=$username;
        $_SESSION['uid']=$user_row['user_id'];
        $_SESSION['fname']=$user_row['First Name'];
        $_SESSION['lname']=$user_row['Last Name'];
        $_SESSION['email']=$user_row['email ID'];
        $_SESSION['prof']=$user_row['Profession'];


        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "User ID:" . "</h3>" .  "<h3 class='echo2'>" . $user_row['user_id'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "User Name: " . "</h3>" .  "<h3 class='echo2'>" . $user_row['username'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "First Name: " . "</h3>" .   "<h3 class='echo2'>" . $user_row['First Name'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>'. "<h3 class='echo1'>" . "Last Name: " . "</h3>" .  "<h3 class='echo2'>" . $user_row['Last Name'] . "</h3>" . "<br>";
        echo   '<i class="fa fa-envelope" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "Email ID: ". "</h3>" .  "<h3 class='echo2'>" . $user_row['email ID'] . "</h3>" . "<br>";
        echo   '<i class="fa fa-briefcase" aria-hidden="true" ></i>'. "<h3 class='echo1'>" . "Profession: ". "</h3>" .   "<h3 class='echo2'>" . $user_row['Profession'] . "</h3>" . "<br>";
       
    }
    else{
        echo "<h3>No record found</h3>";
    }
      
}

else{
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "User ID:" . "</h3>" .  "<h3 class='echo2'>" . $_SESSION['uid'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "User Name: " . "</h3>" .  "<h3 class='echo2'>" . $_SESSION['username'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "First Name: " . "</h3>" .   "<h3 class='echo2'>" . $_SESSION['fname'] . "</h3>" . "<br>";
        echo  '<i class="fa fa-user" aria-hidden="true" ></i>'. "<h3 class='echo1'>" . "Last Name: " . "</h3>" .  "<h3 class='echo2'>" . $_SESSION['lname'] . "</h3>" . "<br>";
        echo   '<i class="fa fa-envelope" aria-hidden="true" ></i>' . "<h3 class='echo1'>" . "Email ID: ". "</h3>" .  "<h3 class='echo2'>" . $_SESSION['email'] . "</h3>" . "<br>";
        echo   '<i class="fa fa-briefcase" aria-hidden="true" ></i>'. "<h3 class='echo1'>" . "Profession: ". "</h3>" .   "<h3 class='echo2'>" . $_SESSION['prof'] . "</h3>" . "<br>";
    
}

?>

</div>

<div class="posts">
<?php
 include ('db.php');
 $uname= $_SESSION['username'];
 $get_topics = "SELECT `Topic_ID`, `Topic_Title`, `Time`,`Topic_Creator` FROM `topics`  WHERE `Topic_Creator`='$uname'";
  $get_topics_res = mysqli_query($con,$get_topics,) or die(mysqli_error($con));
 if (mysqli_num_rows($get_topics_res) < 1) {
        $display_block = "<P><em>No topics exist.</em></p>";
  } else {
 
    $display_block = "
   <table>
   <tr>
    <th>TOPIC TITLE</th>
    <th># of POSTS</th>
     </tr>";

     while ($topic_info = mysqli_fetch_array($get_topics_res)) {
       $topic_id = $topic_info['Topic_ID'];
        $topic_title = stripslashes($topic_info['Topic_Title']);
        $topic_create_time = $topic_info['Time'];
        $topic_owner = stripslashes($topic_info['Topic_Creator']);
  
     
         $get_num_posts = "SELECT `Post ID`, `Topic ID`, `Post Text`, `Post Time`, `Post Creator` FROM `posts` WHERE `Topic ID`= $topic_id";
         $get_num_posts_res = mysqli_query($con,$get_num_posts)
              or die(mysqli_error($con));
        $num_posts = mysqli_num_rows($get_num_posts_res);
 

         $display_block .= "
        <tr>
         <td><a href=\"displaytopic.php?topic_id=$topic_id\">
       <strong>$topic_title</strong></a><br>
        Created on $topic_create_time by $topic_owner</td>
        <td align=center>$num_posts</td>
         </tr>";
    }
 

   $display_block .= "</table>";
  }
  ?>
 
 <h1>Topics in My Forum</h1>
  <?php print $display_block; ?>
 
</div>
  
       
</form>
</body>
</html>