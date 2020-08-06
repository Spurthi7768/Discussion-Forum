<?php
 include ('db.php');
 $tid=$_GET['topic_id'];
    if (!$tid) {
    header("Location: posts.php");
      exit;
 }
 
 
 
  $verify_topic = "SELECT `Topic_ID`, `Topic_Title`, `Time`,`Topic_Creator` FROM `topics` WHERE `Topic_ID`= $tid";
  $verify_topic_res = mysqli_query($con,$verify_topic)
     or die(mysqli_error($con));
 
 if (mysqli_num_rows($verify_topic_res) < 1) {
      
    $display_block = "<P><em>You have selected an invalid topic.
      Please <a href=\"posts.php\">try again</a>.</em></p>";
  } else {
     
    $result=mysqli_fetch_array($verify_topic_res);
     $topic_title = stripslashes($result['Topic_Title']);
     

     $get_posts = "SELECT `Post ID`, `Topic ID`, `Post Text`, `Post Time`, `Post Creator` FROM `posts` WHERE `Topic ID` = $tid";
 
     $get_posts_res = mysqli_query($con,$get_posts) or die(mysqli_error($con));
  
 
     $display_block = "
     <p>Showing posts for the <strong>$topic_title</strong> topic:</p>
  
     <table>
     <tr>
     <th>AUTHOR</th>
     <th>POST</th>
     </tr>";
  
     while ($posts_info = mysqli_fetch_array($get_posts_res)) {
         $post_id = $posts_info['Post ID'];
         $post_text = nl2br(stripslashes($posts_info['Post Text']));
         $post_create_time = $posts_info['Post Time'];
         $post_owner = stripslashes($posts_info['Post Creator']);
 
      
         $display_block .= "
         <tr>
         <td width=35% valign=top>$post_owner<br>[$post_create_time]</td>
         <td width=65% valign=top>$post_text<br><br>
          <a href=\"reply.php?post_id=$post_id\"><strong>REPLY TO
         POST</strong></a></td>
         </tr>";
     }
 
 
     $display_block .= "</table>";
  }
 ?>
  <html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
       
        <link rel="stylesheet" href="css/display.css">
 <title>Posts in Topic</title>
  </head>
 <body>
  <h1>Q2A Discussion Forum</h1>
  <div class="tab">
  <?php print $display_block; ?>
</div>
  <form method="POST" action="profile.php" class="home">
   <p><input type="submit" name="Home"  value="Return Home"></p>
</form>
  </body>
 </html>