<?php
 include ('db.php');
 session_start();
 if (!$_POST) {
    
    if (!isset($_GET['post_id'])) {
    header("Location: topiclist.php");
    exit;
    }
   
    
    $safe_post_id = mysqli_real_escape_string($con, $_GET['post_id']);
   
    
    $verify_sql = "SELECT `Topic_ID`, `Topic_Title` FROM `posts`
     LEFT JOIN `topics`  ON `Topic ID` =
    `Topic_ID` WHERE `Post ID` = $safe_post_id";
   
    $verify_res = mysqli_query($con, $verify_sql)
    or die(mysqli_error($con));
   
    if (mysqli_num_rows($verify_res) < 1) {
   
    header("Location: topiclist.php");
    exit;
    } else {
    
    while($topic_info = mysqli_fetch_array($verify_res)) {
    $topic_id = $topic_info['Topic_ID'];
    $topic_title = stripslashes($topic_info['Topic_Title']);
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/reply.css">
    <title>Post Your Reply in <?php echo $topic_title; ?></title>
    </head>
    <body>
    <h1>Q2A Discussion Forum</h1>
       <div class="reply">          
    <h1>Post Your Reply in <?php echo $topic_title; ?></h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p><label for="post_owner">Your Username:</label><br></p>
   <input type="text" id="post_owner" name="post_owner" size="40"
      maxlength="150" required="required" style="background:none"></p>
    <p><label for="post_text">Post Text:</label><br/>
    <textarea id="post_text" name="post_text" rows="8" cols="40"
    required="required" style="background:none"></textarea></p>
    <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
    <button type="submit" name="submit" value="submit">Add Post</button>
    </div>
    </form>
    <form method="POST" action="profile.php" class="home">
    <p><input type="submit" name="Home"  value="Return Home"></p>
   </form>
    </body>
    </html>
    <?php
    }
    
    mysqli_free_result($verify_res);
   
    
    mysqli_close($con);
   
    } else if ($_POST) {
    
    if ((!$_POST['topic_id']) || (!$_POST['post_text']) ||
    (!$_POST['post_owner'])) {
    header("Location: displaytopic.php");
    exit;
    }
   
   
    $safe_topic_id = mysqli_real_escape_string($con, $_POST['topic_id']);
    $safe_post_text = mysqli_real_escape_string($con, $_POST['post_text']);
    $safe_post_owner = mysqli_real_escape_string($con, $_POST['post_owner']);
   
    
    $add_post_sql = "INSERT INTO `posts` (`Topic ID`,`Post Text`,
    `Post Time`,`Post Creator`) VALUES
 ('".$safe_topic_id."', '".$safe_post_text."',
 now(),'".$safe_post_owner."')";
 $add_post_res = mysqli_query($con, $add_post_sql)
 or die(mysqli_error($con));


 mysqli_close($con);

 
 header("Location: displaytopic.php?topic_id=".$_POST['topic_id']);
    exit;
    }
    ?>