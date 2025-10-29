
<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #e6b234;
}
</style>
<h5>loaging out, please wait! 
<div class="col-sm-12 col-xs-12" id="myProgress">
  <div id="myBar"></div>
</div>
<div class="col-sm-12 col-xs-12" id="loding">
  
</div>

<script>
	$(document).ready(function(){
		var loader=$("#loader").html();
		$("#loding").html(loader)
		move()
	})
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 5);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
$("#global_u_email").val("");
$(".splashinputs").val("");
$("#landingpage").hide().html("");
$("#splashpage").show();



    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}
</script>

