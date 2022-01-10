<?php 
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
  # echo "The current page name is: ".$curPageName;
?>
<nav class="navbar navbar-inverse navbar-fixed-top topnavbar">

<input type="hidden" class="pageLoaded" value="<?php echo $curPageName ; ?>"/>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Mongo PHP Inventory</a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php">Inventory</a></li>
          <li><a href="brands">Brands</a></li>
          <li><a href="categories.php">Categories</a></li>
        </ul>
      </li>
      <li><a href="users.php">Users</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register_user.php">Register</a></li>
    </ul>
  </div>
</nav>