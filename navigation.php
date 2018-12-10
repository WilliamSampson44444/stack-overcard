<script>
window.onscroll = function() {stickyBar()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function stickyBar() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="">Stack Overcard</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="javascript:void(0)" style="font-size:17px;cursor:pointer" onclick="openNav()"><i class="material-icons">menu</i></a></li>
        <?php 
  
          if (isset($_SESSION['user_id'])) {
            echo '<li><a href="index.php"><i class="material-icons">home</i></a></li>'; 
            echo '<li><a href="profile.php"><i class="material-icons">person</i></a></li>'; 
            echo '<li><a href="logout.php">Logout</a>'; 
          }
          else{ 
            echo '<li><a href="index.php"><i class="material-icons">home</i></a></li>'; 
            echo '<li><a href="login.php"><i class="material-icons">person</i></a>'; 
          }
        
      ?>
    </ul>
  </div>
</nav>