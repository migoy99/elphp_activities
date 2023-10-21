<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <div class="container" style="margin-top: 20px;">
    <form role="form" method="post" action="process-form.php">
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputDesc" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputDesc" name="desc" placeholder="Description">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPrice" name="price" placeholder="Price">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <input type="submit" value="Save" name="submit" class="btn btn-primary" />
        </div>
      </div>
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <!-- <th scope="col">#</th> -->
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_SESSION['posData'])) {
          foreach ($posData as $pos) {
            echo "<tr>";
            // echo "<td>" . $pos['id'] . "</td>";
            echo "<td>" . $pos['menu_name'] . "</td>";
            echo "<td>" . $pos['menu_desc'] . "</td>";
            echo "<td>" . $pos['price'] . "</td>";
            echo "<td><button href=" . "process-form.php?id=" . $pos['id'] . ">delete</button></td>";
            echo "<td><button>asdasdasd</button></td>";
            echo "<tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>