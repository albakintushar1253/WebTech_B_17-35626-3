<?php
session_start();
include('include/conn.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:login.php');
}
else{


include_once('include/header.php');
include_once('include/sidebar.php');

?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Admin Dashboard</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-6 ">
          <div class="widget-small primary coloured-icon"> <i class="icon fa fa-users fa-3x"> </i>
            <div class="info">
              <h4>Admin</h4>
              <p><b>

                <?php 

                  $admin=$dbh->prepare("SELECT count(id) FROM users");
                  $admin->execute();
                  $adminrow = $admin->fetch(PDO::FETCH_NUM);
                  $admincount = $adminrow[0];
                  echo $admincount;
                               
                ?>
                  
                  </b></p>
              </div>
            </div>
          </div>

        <div class="col-md-6 ">
          <div class="widget-small info coloured-icon"><i class=" icon fa fa-user-md"> </i>
            <div class="info">
              <h4>Doctor</h4>
              <p><b>
                
                 25

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-bed" aria-hidden="true"></i>
            <div class="info">
              <h4>Patient</h4>
              <p><b>89</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-plus-circle" aria-hidden="true"></i>
            <div class="info">
              <h4>pharmacist</h4>
              <p><b>30</b></p>
            </div>
          </div>
        </div>
      </div>
      
    </main>

<?php
include_once('include/footer.php');
include_once('include/Hfooter.php');
}
?> 