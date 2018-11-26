</script>

<nav>
    <div id="navbar">
        <?php 
    
            if (isset($_SESSION['user_id'])) {
              echo '<a href="index.php">Home</a>'; 
              echo '<a href="logout.php">Logout</a>'; 
            }
            else  
              echo '<a href="login.php">Login</a>'; 
            
        ?>
        
    
    </div>
    <div class="clear"></div>
</nav>

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