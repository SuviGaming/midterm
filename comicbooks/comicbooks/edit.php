<?php require_once('../_config.php') ?>

<?php include_once('../_includes/_partials/_header.php') ?>

<?php

  require_once('_utilities/_connect.php');
  $conn = connect();

  $result = mysqli_query($conn, "SELECT * FROM midterm.comicbooks");
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  var_dump($rows);

?>

<!--
  OBJECTIVE:
    1: Include the header and footer files (I have provided you the _config.php).
    2: Select the row using the provided ID.
    3: Add the missing hidden field.
    4: Pre-populate the form with the values from the selected row.
    5: Ensure you're sending the form data to the update.php page.
-->

<header>
  <h1 class="display-1">Edit Comicbooks</h1>
  <hr>
</header>

<form action='<?= BASE_PATH ?>/comicbooks/update.php' method='post'>

	<input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>

	<div class='form-group'>
		<label>Title</label>
		<input class="form-control" type="text" name="title" value="<?php echo $row['title']; ?>">
	</div>

	<div class='form-group'>
		<label>Description</label>
		<input class="form-control" type="text" name="description" value="<?php echo $row['description']; ?>">
	</div>

	<div class='form-group'>
		<label>Year</label>
		<input class="form-control" type="number" name="year" value="<?php echo $row['year']; ?>">
	</div>

	<button class="btn btn-primary" type="submit">Update</button>
</form>

<?php include_once('../_includes/_partials/_footer.php') ?>