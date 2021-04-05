<?php
session_start();
include('include/conn.php');
    require_once('include/sql.php');

if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}
else{
$sql = 'SELECT * FROM `users`';
$message="";
if(isset($dbh)){
//connection check
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
include_once('include/header.php');
include_once('include/sidebar.php');
?>

<?php

$result1 = mysqli_query($conn,"SELECT * FROM users ");
if (mysqli_num_rows($result1) > 0) {

?>


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Profile list </h1>
     
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">admin profile</li>
      <li class="breadcrumb-item active"><a href="#">veiw profile</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Image</th>
                
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $i=0;
                while($row = mysqli_fetch_array($result1)) {
                ?>

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td><img src="<?php echo $row["image"]; ?>" alt="Document" style="height: 80px;width: 80px;"></td>

                
                  
                  <td align="center">
                    <a href="edit-profile.php ?id=<?php echo $value['id']; ?>" class="btn btn-success">
                      <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>

                 <?php
                  $i++;
                  }
                 ?>

              </tbody>
            </table>



            <?php
            }
            else{
            echo "No result found";
            }
          ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>




<?php
include_once('include/footer.php');
include_once('include/Hfooter.php');
}
}
?>