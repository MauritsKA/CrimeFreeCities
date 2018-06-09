</body>
</html>


<script>
var open = false;
//// Events
$(function() {
  setnav();
});

$(window).resize(function() {
 setnav();
})

function setnav(){
	if ($(window).width() > 768) {
    $(".navbar-light").css("display", "none");
    $(".logoutnocollapse").css("display", "");
  } else{
    $(".navbar-light").css("display", "");
    $(".logoutnocollapse").css("display", "none");
  }  //Set new color depending on window size}
}

// Set background overlay in mobile mode 
function setcolor() {

  $(".navbar-light").css("background-color", ""); 

    if( open == true){
    $(".navbar-light").css( "background-color", "rgba(85,85,85,0.85)" )

    } else {
    $(".navbar-light").css("background-color", "");
    }
}

// Menu hamburger animation
function cross(x) {
  if (!$('.navbar-collapse').hasClass( "collapsing" )){
      if(open == false) {
        open = true;
        setcolor()
        $('.navbar').addClass('withBackground');
        x.classList.toggle("change")

      } else {
        open = false;
        setcolor()
        $('.navbar').removeClass('withBackground');
        x.classList.toggle("change")
      }
  } 
}


var fullscreen = $("a[title='Toggle Fullscreen (F11)']");
var sidebyside = $("a[title='Toggle Side by Side (F9)']");

fullscreen.click(function( event ){
    if(fullscreen.hasClass( "active" )){
      $('#navdiv').hide();
      $('#navtoggle').hide();
      }
    else {
      $('#navdiv').show();
      $('#navtoggle').show();
    }
});

sidebyside.click(function( event ){
    if(sidebyside.hasClass( "active" )){
      $('#navdiv').hide();
      $('#navtoggle').hide();
      }
    else if(fullscreen.hasClass( "active" )){
      $('#navdiv').hide();
      $('#navtoggle').hide();
    }
    else {
      $('#navdiv').show();
      $('#navtoggle').show();
    }
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