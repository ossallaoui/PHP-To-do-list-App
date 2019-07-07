<!DOCTYPE html>

<?php include 'db.php'; 

$id= (int)$_GET['id'];

$sql = "select * from tasks where id='$id'";

$rows = $db->query($sql);

$row= $rows->fetch_assoc();
if(isset($_POST['send'])){

$task = htmlspecialchars($_POST['task']);

$sql2 ="update tasks set name='$task' where id ='$id'";

$db->query($sql2);

header('location: index.php');

}

?>

</html>

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
        <center ><h1>Update task</h1></center><br>
        <div class="row" >
          <div class="col-md-10 col-md-offset-1">
            
             <form method="post" >
                  <div class="form-group">
                    <label>Task Name</label>
                    <input type="text" required name="task" value="<?php echo $row['name'];?>" class="form-control">
                      </div>
                   <input type="submit" name="send" value="Add Task" class="btn btn-success">&nbsp;
                 <a href="index.php" class="btn btn-warning">Back</a>
              </form>
            
          </div>
        </div>
      </div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>