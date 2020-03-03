<?php

  require_once('../_config.php');

  require_once('../_includes/_utilities/_connect.php');
  $conn = connect();

  var_dump($_POST);
  exit;

  $res = mysqli_query($conn, "UPDATE midterm.comicbooks SET
  title = '{$_POST['title']}',
  description = '{$_POST['description']}',
  year = '{$_POST['year']}'
  WHERE id = {$_POST['id']}");

  session_start();

  if ($res) {
    // We were successful
    $_SESSION['notification'] = "The new data was created successfully.";
  } else {
    // We failed
    $_SESSION['notification'] = "There was an error creating the data: " . mysqli_error($conn);
  }
  header("Location: ../notification.php");
  exit;

    /*
    OBJECTIVE:
      1: Connect to the database and update the values from the passed form
      data (you must include the _connect.php and use the connect function).
      2: Set a session variable called 'notification' with a success message (if the update was successful)
      or an error message (if it failed).
      3: Redirect to notification.php.
  */

?>