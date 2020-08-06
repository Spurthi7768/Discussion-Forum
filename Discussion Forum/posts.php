<?php
 include ('db.php');
 session_start();
 $uname= $_SESSION['username'];
 $get_topics = "SELECT `Topic_ID`, `Topic_Title`, `Time`,`Topic_Creator` FROM `topics` WHERE `Topic_Creator` != '$uname' ";
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
  <html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/post.css">
  <title>Topics in Main Forum</title>
 </head>
  <body>
    <div class="List">
  <h1>Q2A Disussion Forum </h1>
 <h2>Topics in Main Forum</h2>
  <?php print $display_block; ?>
  <form method="POST">
  <p>Would you like to <a href="addtopic.html">add a topic</a>?</p>
  </form>
  <form method="POST" action="profile.php" class="home">
  <p><input type="submit" name="Home"  value="Return Home" ></p>
  </div>
  
</form>
  </body>
 </html>

