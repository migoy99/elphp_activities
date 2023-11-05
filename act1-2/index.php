<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function openModal(id, name, desc, price) {
      document.getElementById("updateId").value = id;
      document.getElementById("updateName").value = name;
      document.getElementById("updateDesc").value = desc;
      document.getElementById("updatePrice").value = price;
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    $('#updateModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); 
      var id = button.data('id');
      var name = button.data('name');
      var desc = button.data('desc');
      var price = button.data('price');

      var modal = $(this);
      modal.find('#modalUpdateId').val(id);
      modal.find('#modalUpdateName').val(name);
      modal.find('#modalUpdateDesc').val(desc);
      modal.find('#modalUpdatePrice').val(price);
    });
  </script>
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
            echo "<td>" . $pos['menu_name'] . "</td>";
            echo "<td>" . $pos['menu_desc'] . "</td>";
            echo "<td>" . $pos['price'] . "</td>";
            echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal"
                    data-id="' . $pos['id'] . '"
                    data-name="' . $pos['menu_name'] . '"
                    data-desc="' . $pos['menu_desc'] . '"
                    data-price="' . $pos['price'] . '">
                    Update
                  </button></td>';
            echo "<td><a href=" . "process-form.php?id=" . $pos['id'] . ">delete</a></td>";
            echo "<tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Update form -->
          <form action="process-form.php?action=update" method="post">
            <input type="hidden" name="id" id="modalUpdateId">
            <div class="form-group">
              <label for="modalUpdateName">Menu Name:</label>
              <input type="text" class="form-control" name="name" id="modalUpdateName" required>
            </div>
            <div class="form-group">
              <label for="modalUpdateDesc">Menu Description:</label>
              <input type="text" class="form-control" name="desc" id="modalUpdateDesc" required>
            </div>
            <div class="form-group">
              <label for="modalUpdatePrice">Price:</label>
              <input type="text" class="form-control" name="price" id="modalUpdatePrice" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" form="updateForm" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JavaScript and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>