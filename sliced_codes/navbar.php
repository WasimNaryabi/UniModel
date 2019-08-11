

 <div class="topnav" id="myTopnav">
  <img src="images/logo.php">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars bg-danger"></i>
  </a>
</div>

 

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>