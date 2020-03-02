<?php require_once('./_config.php') ?>

<?php include_once('./_includes/_partials/_header.php') ?>

<?php include_once('./_includes/_partials/_footer.php') ?>

<?php

  include_once('./_includes/_utilities/_connect.php');
  $conn = connect();

  $result = mysqli_query($conn, "SELECT * FROM comicbooks WHERE id = {$_GET['id']}");
  $row = mysqli_fetch_assoc($result);

?>

<!--
  OBJECTIVE:
    1: Include the header and footer files (I have provided you the _config.php).
    2: Fetch all the comicbooks rows from the database and display them in a table.
    3: Create two links for each row that point to the edit.php and delete.php files. These links must provide a query parameter called 'id' with the row's id column's value.
-->

<header>
  <h1 class="display-1">Comicbooks</h1>
  <hr>
</header>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
			<th>Description</th>
			<th>Year</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
            <?php
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['year']}</td>";
            echo "<td>{$row['actions']}</td>";
            echo "<td>";
            echo "<a href='./comicbooks/edit.php?id={$row['id']}'>edit</a>";
            echo " | ";
            echo "<a href='./comicbooks/delete.php?id={$row['id']}'>delete</a>";
            echo"</td>";
            echo "</tr>";
          }
        ?>
  </tbody>
</table>