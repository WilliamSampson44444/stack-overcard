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

<nav>
    <div id="navbar">
      <a href="javascript:void(0)" style="font-size:17px;cursor:pointer" onclick="openNav()"><i class="material-icons">menu</i></a>
      
      <?php 
  
          if (isset($_SESSION['user_id'])) {
            echo '<a href="index.php"><i class="material-icons">home</i></a>'; 
            echo '<a href="logout.php">Logout</a>'; 
          }
          else{ 
            echo '<a href="index.php"><i class="material-icons">home</i></a>'; 
            echo '<a href="login.php"><i class="material-icons">person</i></a>'; 
          }
        
      ?>
      <div id="navTitle">Stack Overcard</div>
    </div>
    <div class="clear"></div>
</nav>