<!DOCTYPE html>
<?php include 'db.php';

if (isset($_POST['search'])) {

$name = htmlspecialchars($_POST['search']);

$sql = "select * from tasks where name like '%$name%' ";

$rows = $db->query($sql);
}
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>To do list</title>
</head>
<body>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>To do list</title>
    </head>
    <body >
      <div class="container">
        <center ><h1>To do list</h1></center><br>
        <div class="row" >
          <div class="col-md-10 col-md-offset-1">
            <table class="table">
              <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-success ">Add Task</button>
              <button type="button" class="btn btn-light" onclick="print()">Print</button>
              <hr><br>
              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Task</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="add.php">
                        <div class="form-group">
                          <label>Task Name</label>
                          <input type="text" required name="task" class="form-control">
                        </div>
                        <input type="submit" name="send" value="Add" class="btn btn-success">
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <p>Search</p>
                <form action="search.php" method="post" class="form-group">
                    <input type="text" placeholder="Search" name="search" class="form-control">

                </form>
              </div>
              <?php if(mysqli_num_rows($rows) < 1 ): ?>
                
              <h2 class="text-danger text-cener">Nothing found</h2>
              <a href="index.php"></a>
              <?php else: ?>
              <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Task</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php while ($row = $rows->fetch_assoc()):?>
                  <th scope="row"><?php echo $row['id'] ?></th>
                  <td class="col-md-10"><?php echo $row['name']?></td>
                  <td><a href="edit.php?id=<?php echo$row['id'];?>" class="btn btn-success">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
                 </table>
              <?php endif ?>
         
            
            </table>
          </div>
        </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>