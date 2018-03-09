 <footer>
  <a id="bottom"></a>
 	<div class="topfooter section">
    <div class="container">
      <div class="row">
      <div class="col-sm-6">
        <div class="contactleft">
      	   <h3>Say hi</h3>
      	   <p>Would you like to know more? I'd love to grab a coffee and discuss possible ideas and opportunities. I am open to any challenge in urban planning, safety and project management.</p>
        </div>
		  </div>
		  <div class="col-sm-6">
        <div class="contactright">
  			  <h3>Contact</h3>
          <div class="contactitem"> <span class="contactfeather" data-feather="search"></span> <span class="contacttext">KVK: 1234567</span></div>
          <div class="contactitem"> <span class="contactfeather" data-feather="mail"></span><span class="contacttext"><a href="mailto:hj@crimefreecities.com">hj@crimefreecities.com</a></span></div>
          <div class="contactitem"> <span class="contactfeather" data-feather="map-pin"></span><span class="contacttext"><a href="https://www.google.nl/maps/place/President+Kennedylaan+10,+3971+KP+Driebergen-Rijsenburg/@52.0514027,5.2889554,17z/data=!3m1!4b1!4m5!3m4!1s0x47c65ce081ff0293:0x557ae8943224e3ca!8m2!3d52.0514027!4d5.2911441">Driebergen, Nederland</a></span></div>
          <div class="contactitem"> <span class="contactfeather" data-feather="phone"> </span><a href="tel:+316 43216660"><span class="contacttext">06 43216660</a></span></div>
          <div class="contactitem"> <span class="contactfeather" data-feather="linkedin"> </span><span class="contacttext"><a href="https://www.linkedin.com/in/harmjankorthalsaltes/">Harm Jan</a></span></div>
        </div>
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
//// Events
$(function() {
  setheight(); // of carousel
});

$(document).ready(function () {
  menuColoring(); 
});

$(window).scroll(function () {
  menuColoring();

  $(".navbar-light").css("background-color", ""); 
  setcolor(); //resetcolor and instantly set new color
});

$(window).resize(function() {
  resetheight();

  if ($(window).width() > 768) {
    $(".navbar-light").css("background-color", "");
  } else{
    setcolor();
  }  //Set new color depending on window size

});

//// Actions
$("#locale option[value='{{\App::getLocale()}}']").attr("selected","selected");

$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

$("a[href='#bottom']").click(function() {

  //window.location.href = "http://localhost/crimefreecities/public/contact";
  $("html, body").animate({ scrollTop:  $(document).height() - $( window ).height() }, "slow");
  return false;
});

//// Functions

// Menu scroll up & down color 
var menuBackground = false;

function menuColoring() {
    var scrollPosition = $(window).scrollTop();
    var menu = $('.navbar');

    if (!menuBackground && scrollPosition > 0) {
        menuBackground = true;
        menu.addClass('withBackground');
    }

    if (menuBackground && scrollPosition === 0) {
        menuBackground = false;
        menu.removeClass('withBackground');
    }
}  

// Set background overlay in mobile mode 
function setcolor() {
    if ($(window).scrollTop() == 0){
    if( open == true && $(window).width() < 768){
    $(".navbar-light").css( "background-color", "rgba(85,85,85,0.85)" )
    } else {
    $(".navbar-light").css("background-color", "");
    }
  }
}

// Menu hamburger animation
var open = false;
function cross(x) {
    x.classList.toggle("change");
    if(open == true) {open = false} else {open = true}
    setcolor()
}

// Height management for carousel
function setheight(){
  var height = Math.max.apply(Math, $(".carousel-item").map(function () {
    return $(this).height(); 
  })); 
  $('.carousel-item').css('min-height',height);
}

function resetheight(){
  $('.carousel-item').css('min-height',"");
  setheight();
}
</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>