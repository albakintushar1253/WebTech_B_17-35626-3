<?php
session_start();
include('include/conn.php');
include_once('include/sql.php');

if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}
else{
$message="";
if(isset($dbh)){
//connection check
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users ";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $profile = $statement->fetch(PDO::FETCH_ASSOC);
    extract($profile);
}



include_once('include/header.php');
include_once('include/sidebar.php');
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-users"></i> Admin Profile</h1>
			
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Dashbord</li>
			
		</ul>
	</div>
	<div class="row">
		
		<div class="col-md-5 m-auto">
			<div class="tile">
				<h3 class="tile-title">My Profile</h3>
				<div class="tile-body">
					<form action="action/update-profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">

						<input type="hidden" name="id" value="<?php echo $id ?>">

						
						<div class="form-group row">
							<label class="control-label col-md-3" for="name">Name <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<?php echo $_SESSION["name"] ?>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="name">User id <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<?php echo $_SESSION["id"] ?>
							</div>
						</div>
<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="email">Email <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<?php echo $_SESSION["alogin"] ?>

								
							</div>
						</div>
<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="mobile">Mobile <span class="text-danger">*</span></label>
							<div class="col-md-9">

								<?php echo $_SESSION["mobile"] ?>
							</div>
						</div>
<hr>


						<div class="form-group row">
							<label class="control-label col-md-3" for="image"> Image <span class="text-danger">*</span></label>
							<div class="col-md-9">
								
								<img  src="<?php echo $_SESSION["image"];  ?>" alt="User Image" style="height: 70px; width: 70px;">
								
							</div>
						</div>
						
					</div>
					
				</form>
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