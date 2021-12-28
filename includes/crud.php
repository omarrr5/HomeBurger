<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<section id="title">
<div class="container">
  <h1>Menu Management</h1>
  <p>Add, update and delete Menu below</p>

  <table class="table">
    <tbody>
      <?php include 'read.php'; ?>
    </tbody>
  </table>
  
  <form class="form-inline m-2" action="create.php" method="POST">
    <label for="name">product Name:</label>
    <input type="text" class="form-control m-2" id="product_name" name="product_name">
    <label for="price">price:</label>
    <input type="number" class="form-control m-2" id="product_price" name="product_price">
    <label for="image">product image:</label>
    <input type="file" class="form-control m-2" id="image" name="image">
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
</body>
</html>