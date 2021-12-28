<?php
  include 'dbh.inc.php';
  $sql = "select * from productdb";
  $result = $con->query($sql);

  while($row = $result->fetch_assoc()) {
    echo "<tr>";



    
    if ($row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="update.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="product_name" value="'.$row['product_name'].'"></td>';
      echo '<td><input type="number" class="form-control" name="product_price" value="'.$row['product_price'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="id" value="'.$row['id'].'">';
      echo '</form>';
    } else {
      echo "<td>" . $row['product_name'] . "</td>";
      echo "<td>" . $row['product_price'] . "</td>";
      echo '<td><a class="btn btn-primary" href="crud.php?id=' . $row['id'] . '" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
    echo "</tr>";

}

  $con->close();
?>