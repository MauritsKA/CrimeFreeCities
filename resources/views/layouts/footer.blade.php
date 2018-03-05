 <footer>
 	<div class="topfooter section">
      <div class="container">
      	<div class="row">
      	<div class="col-6" style="text-align: left;">
	   <h3>Say hi</h3>
	    <p>I'd like to drink a cup of coffee </p>
	    <a href="contact">Contact!</a>
		</div>
		<div class="col-6"  style="text-align: right;">
			  <h3>Contact</h3>
	    <p>KVK: 1234567  tel: 06 123456789 <br> mail: hj@crimefreecities.com <br> adres: President Kennedylaan 10

	    </p>
		</div>
  		</div>
   </div>  
 </div>
 	<div class="subfooter">
      <div class="container">
        
          <span> &copy; 2018 <a href="https://www.linkedin.com/in/mauritskorthalsaltes">Maurits</a></span>
          
   
        <span style="float:right"><a href="#top" class="up">    <span data-feather="chevrons-up"></span></a></span>
      </div>
   </div>      
</footer>   


</body>
</html>

<!-- General functionalities -->
<script>
var open = false;
function cross(x) {
    x.classList.toggle("change");
    if(open == true) {open = false} else {open = true}
    setcolor()
}

function setcolor() {
    if ($(window).scrollTop() == 0){
    if( open == true && $(window).width() < 750){
    $(".navbar-light").css( "background-color", "rgba(85,85,85,0.85)" )
    } else {
    $(".navbar-light").css("background-color", "");
    }
  }
}

$(window).scroll(function() {
  $(".navbar-light").css("background-color", "");
  setcolor()
});

$(window).resize(function() {

  if ($(window).width() > 750) {
    //if the window is greater than 440px wide then turn on jScrollPane..
    $(".navbar-light").css("background-color", "");
  } else{
    setcolor()
  }
});

$("#locale option[value='{{\App::getLocale()}}']").attr("selected","selected");

$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>