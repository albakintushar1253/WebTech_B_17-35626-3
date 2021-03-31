<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <?php
    if(isset($_SESSION["image"])){
      ?>
      <img class="app-sidebar__user-avatar" src="<?php echo $_SESSION["image"];  ?>" alt="User Image" style="height: 50px; width: 50px;">
      <?php
    }
    else{
      ?>
    <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
   <?php  }?>
    <div>
      <?php
      if(isset($_SESSION["name"])){
        echo "<p class='app-sidebar__user-name'>".$_SESSION["name"]."</p>";
      }
      else{
      ?>
      <p class="app-sidebar__user-name">Name problem!</p>
      <?php
      }
      ?>
      <p class="app-sidebar__user-designation bg-danger">Admin</p>
    </div>
  </div>
  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="dashboard.php">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>


      <li class="treeview ">
        <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">Admin Profile </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="view-profile.php">
                <i class="icon fa fa-desktop"></i> Veiw Profile</a>
            </li>
            

            <li>
              <a class="treeview-item" href="add-admin.php">
                <i class="icon fa fa-book"></i> Add Admin</a>
            </li>
          </ul>
        </li>

        <li class="treeview ">
        <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">Doctor Profile </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="view-profile.php">
                <i class="icon fa fa-desktop"></i> Veiw Profile</a>
            </li>
            

            <li>
              <a class="treeview-item" href="#">
                <i class="icon fa fa-book"></i> Add Doctor</a>
            </li>
          </ul>
        </li>

        <li class="treeview ">
        <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">Patient Profile </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="view-profile.php">
                <i class="icon fa fa-desktop"></i> Veiw Profile</a>
            </li>
            

            <li>
              <a class="treeview-item" href="#">
                <i class="icon fa fa-book"></i> Add Patient</a>
            </li>
          </ul>
        </li>

        <li class="treeview ">
        <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">Pharmacist  Profile </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="view-profile.php">
                <i class="icon fa fa-desktop"></i> Veiw Profile</a>
            </li>
            

            <li>
              <a class="treeview-item" href="#">
                <i class="icon fa fa-book"></i> Add Pharmacist</a>
            </li>
          </ul>
        </li>

       


  </ul>
</aside>