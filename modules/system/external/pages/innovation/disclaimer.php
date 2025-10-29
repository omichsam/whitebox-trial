<style type="text/css">
	#diaclaimer_header{
		text-align: center;
		border-bottom:2px solid #ccc;
	}
#radion_btn{
	min-height: 20px;
}
.input_ipc {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.input_ipc input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
	opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.input_ipc:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.input_ipc input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.input_ipc input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.input_ipc .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>


<div class="col-sm-12 col-xs-12">
<div class="col-xs-12 col-sm-12">
	<h4 id="diaclaimer_header">Terms and Conditions on the use of the Innovation Portal</h4>
<div class="col-xs-12 col-sm-12">
	<p class="col-sm-12 col-xs-12">
	The Participants agree that by submitting their idea, innovation or product to the Innovation Portal they agree to the following terms and conditions which constitute a legally binding agreement between National Museums of Kenya and the Participants. Further, the Participants in registering with the Service confirm that they have read and fully understood and accepted these terms and conditions.
 </p>
 <p class="col-sm-12 col-xs-12">
 	<span class="col-xs-1 col-sm-1">1.</span>
 	<span class="col-xs-11 col-sm-11">
National Museums of Kenya is under no obligation to take up the idea, innovation or the product or apply it in any manner whatsoever.
</span>
 </p>
 <p class="col-sm-12 col-xs-12">
 	<span class="col-xs-1 col-sm-1">2.</span>
 	<span class="col-xs-11 col-sm-11">
National Museums of Kenya is not responsible for the protection of the intellectual property rights for the idea, innovation or the product and neither does it guarantee any such protection within the Innovation Portal. The Participants are advised to follow through with the appropriate institutions for the protection of their intellectual property rights.
</span>
 </p>
  <p class="col-sm-12 col-xs-12">
  	<span class="col-xs-1 col-sm-1">3.</span>
 	<span class="col-xs-11 col-sm-11">
The Participants agree that they are voluntarily engaging with the Innovation Portal and fully understand its mode of operation. Their engagement with the National Museums of Kenya and its partners is not compulsory and they can choose to opt out at any given time.
</span>
 </p>
  <p class="col-sm-12 col-xs-12">
  	<span class="col-xs-1 col-sm-1">4.</span>
 	<span class="col-xs-11 col-sm-11">
The Participants acknowledge that National Museums of Kenya is not responsible for any contracts that the Participants may enter with any of the service partners. Any such contractual engagements or dealings are willingly entered by the Participants and they do not create any privity with National Museums of Kenya.
</span>
 </p>
  <p class="col-sm-12 col-xs-12">
  	<span class="col-xs-1 col-sm-1">5.</span>
 	<span class="col-xs-11 col-sm-11">
The Participants fully understand the objectives of Innovation Portal and as such the Participants have without any inducement or coercion submitted their ideas, innovations and products to the Service and this participation does not create any binding legal obligations with the National Museums of Kenya.
 </span>
 </p>
  <p class="col-sm-12 col-xs-12">
&nbsp;
 </p>
<div class="col-sm-12 col-xs-12">
<div class="col-xs-4 col-sm-8 no_padding">
<label class="input_ipc">
Agree
  <input type="checkbox" id="agree">
  <span class="checkmark"></span>
  
</label>
</div>
<div class="col-xs-8 col-sm-4">
<span class="btn theme_bg span_disclamer" role="cancel">Cancel</span>
<span class="btn theme_bg span_disclamer" id="btn_agreed" role="agree">Agree</span>
</div>
</div>
<div class="col-sm-12 col-xs-12 " id="disclaimer_error"></div>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
$(".span_disclamer").click(function(){
	var my_id=$("#global_u_email").val();
var my_role=$(this).attr("role");
//alert(my_role)
if(my_role=="agree"){
	


	if($("#agree").prop("checked")){
$.post("modules/system/external/pages/submit.php",{
          
		},function(data){
			$("#div_displayer").html(data)
		})




	}else{

$("#disclaimer_error").html("Agree to the terms and conditions first!")


	}


}else{
	$.post("modules/system/external/pages/profile.php",{
    my_id:my_id
	},function(data){
$("#home").html(data);

})

} 

})

/*$("#agree").click(function(){
	if($("#agree").prop("checked")){
 $("#btn_agreed").show()
	}else{
$("#btn_agreed").hide()
	}
})*/


	})
</script>