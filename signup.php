<?php

include("connect.php");

?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-2 col-xs-12"></div>	
	<div class="col-sm-8 col-xs-12" style="background-color: #ccc;">


<div class="aux-parallax-section elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-30b6864a" data-id="30b6864a" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-76529ae0 elementor-widget elementor-widget-text-editor" data-id="76529ae0" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
								<div class="elementor-text-editor elementor-clearfix">
					<p>The National Youth Council is accepting applications from startups and innovators for the Fursathon 2021 Program. Please note that due to COVID-19, we are running all training programs virtually.</p><p>This program will provide you with access to virtual content on business support to help you develop your business idea, starting with a business plan, validation <span>


						<a class="reads" id="read_more">Read more</a><a id="read_less" style="display:none" class="reads">Read less</a></span>
</p><div class="read_div" id="" style="display: none;">
	<p></p>
	<p>At Fursathon 2021, finalists will pitch their startup idea to a panel of judges. Ten regional winners will receive tailormade training from the international entrepreneurship company ILT Studios, as well as exciting prizes!</p>
	<p>The program will take place between June 15th and July 28th. You will receive access to one module per week, and they must all be completed by July 28th after which the Fursathon 2021 will be held. You will have the opportunity to pitch your business to a panel of judges who will select one winner per county. You will submit a video with your pitch by July 19th which will be used for judging.
	</p>
	<p>We encourage you to apply by the end of day Sunday June 14th, 2020 to make the most of the time available to complete the program. However, applications will be open until June 30th.
	</p>
	<p>Good luck, and thank you for your interest!
	</p>
	<p>Please note that although this program comes at no cost to the participants, it does require a substantial commitment in time and effort. If accepted into the program, you are committing to spend 4-8 hours per week on completing the modules and working on your startup.
	</p>
	<p>Working on a startup will take a lot of time (and we mean *a lot* of time). Our goal is to set you and your team up for success by training you in the skills of startup entrepreneurship. At the same time, we’ll guide you around the stumbling blocks that often befall new startup entrepreneurs.
	</p>
	<p>By design, this application process will push you to deeply consider your business idea.&nbsp; Please do spend the time to fill this application in as much detail as you can. If you do not know the answer to a particular question, “IDK (I don’t know)” is an acceptable answer.
	</p>
	<p>What does your team look like? If you have a team in place, please describe your core team, whether they are co-founders or employees, whether they work part-time or full-time as well as their skills and experiences. 
	</p>
</div>
<p>
	
</p>					</div>
						</div>
				</div>
				<div class="col-sm-12 col-xs-12" >
				<div class="elementor-widget-container" style="border-radius:5px">
					<div class="elementor-shortcode"><div role="form" class="wpcf7" id="wpcf7-f585-p589-o1" dir="ltr" lang="en-US">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form action="" method="post" class="wpcf7-form init cf7mls-no-scroll cf7mls-no-moving-animation" novalidate="novalidate" data-status="init" >

<p>Your Name<br>
    <span class="col-sm-12 col-xs-12"><input class="splashinputs" type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span>
</p>
<p>Gender<br>
    <span class="col-sm-12 col-xs-12"><select  name="Your-Gender" class="splashinputs" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Male">Male</option><option value="Female">Female</option></select></span>

</p>
<p>Date of Birth<br>
<span class="col-sm-12 col-xs-12"><input type="date" name="Date-OfBirth" value="" class="splashinputs" min="1986-01-01" aria-required="true" aria-invalid="false" placeholder="D.O.B"></span>

</p>
<p>Age Bracket<br>
<span class="col-sm-12 col-xs-12"><select name="menu-age" class="splashinputs" aria-required="true" aria-invalid="false"><option value="">---</option><option value="18 - 25">18 - 25</option><option value="26 - 30">26 - 30</option><option value="31 - 35">31 - 35</option></select></span></p>
<p> ID Number<br>
 <span class="col-sm-12 col-xs-12"><input type="text" name="Your-IDNO" value="" size="40" class="splashinputs" aria-required="true" aria-invalid="false"></span></p>
<p>Your Email<br>
    <span class="col-sm-12 col-xs-12"><input type="email" name="your-email" value="" size="40" class="splashinputs" aria-required="true" aria-invalid="false"></span></p>
<p>Phone No.<br>
   <span class="col-sm-12 col-xs-12"><input type="text" name="text-phone" value="" size="40" class="splashinputs" aria-required="true" aria-invalid="false"></span></p>
<p>Your County<br>
<span class="col-sm-12 col-xs-12"><select name="Your-County" class="splashinputs" aria-required="true" aria-invalid="false">
	<?php

$sql="SELECT * FROM counties where id<='47'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $county_name=$row['county_name'];
            ?>

<option><?php echo $county_name ?></option>
<?php
}
?>



</select></span></p>
<p>Your Sub-County<br>
<span class="col-sm-12 col-xs-12"><input type="text" name="text-439" value="" size="40" class="splashinputs" aria-required="true" aria-invalid="false"></span></p>
<p>Are you in school?<br>
<span class="col-sm-12 col-xs-12"><select name="In-School" class="splashinputs" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Yes">Yes</option><option value="No">No</option></select></span></p>
<p>If Yes;Which one?<br>
<span class="col-sm-12 col-xs-12"><input type="text" name="Which-School" value="" size="40" class="splashinputs" aria-invalid="false" placeholder="Your School"></span></p>
<p style="color:red;">STARTUP</p>
<p>1.What is the name of your business?<br>
<span class="col-sm-12 col-xs-12"><input type="text" name="Business-Name" value="" size="40" class="splashinputs" aria-required="true" aria-invalid="false"></span></p>
<p>2.In what industry is your business (idea)? (please select all that may apply)<br>
<span class="col-sm-12 col-xs-12">
	<span class="col-sm-12 col-xs-12">
		<span class="wpcf7-list-item first">
			<input type="checkbox" name="Field-Interested[]" class="splashinputs" value="Skills Development"><span class="col-sm-12 col-xs-12">Skills Development</span>


		</span>

		<span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Economic/Enterprise Development"><span class="wpcf7-list-item-label">Economic/Enterprise Development</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Value Character Development"><span class="wpcf7-list-item-label">Value Character Development</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Civic Engagement"><span class="wpcf7-list-item-label">Civic Engagement</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Drug &amp; Crime Free"><span class="wpcf7-list-item-label">Drug &amp; Crime Free</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Creative Economy"><span class="wpcf7-list-item-label">Creative Economy</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Health"><span class="wpcf7-list-item-label">Health</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Environment"><span class="wpcf7-list-item-label">Environment</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Technology"><span class="wpcf7-list-item-label">Technology</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Manufacturing"><span class="wpcf7-list-item-label">Manufacturing</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Field-Interested[]" value="Agriculture"><span class="wpcf7-list-item-label">Agriculture</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Field-Interested[]" value="Education"><span class="wpcf7-list-item-label">Education</span></label></span></span></span></p>
<p>3.What does your business do? Please describe your product or service in detail.<br>
<span class="wpcf7-form-control-wrap Business-Description"><textarea name="Business-Description" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p>4.Who will your business serve? Please describe the customers of this product.<br>
<span class="wpcf7-form-control-wrap Business-Customers"><textarea name="Business-Customers" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p>5.What customer problems will the product solve?<br>
<span class="wpcf7-form-control-wrap Product-Solution"><textarea name="Product-Solution" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p style="color:red;">PROGRESS</p>
<p>6.How old is your company?<br>
<span class="wpcf7-form-control-wrap Company-Age"><select name="Company-Age" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="0-6 months">0-6 months</option><option value="6-12 months">6-12 months</option><option value="1-2 years">1-2 years</option><option value="More than 2 years">More than 2 years</option></select></span></p>
<p>7.How much revenue has your company generated so far?<br>
<span class="wpcf7-form-control-wrap Revenue-Generation"><span class="wpcf7-form-control wpcf7-radio"><span class="wpcf7-list-item first"><label><input type="radio" name="Revenue-Generation" value="None" checked="checked"><span class="wpcf7-list-item-label">None</span></label></span><span class="wpcf7-list-item"><label><input type="radio" name="Revenue-Generation" value="Less than ksh 50,000"><span class="wpcf7-list-item-label">Less than ksh 50,000</span></label></span><span class="wpcf7-list-item"><label><input type="radio" name="Revenue-Generation" value="ksh 50,000-100,000"><span class="wpcf7-list-item-label">ksh 50,000-100,000</span></label></span><span class="wpcf7-list-item"><label><input type="radio" name="Revenue-Generation" value="100,000-500,000"><span class="wpcf7-list-item-label">100,000-500,000</span></label></span><span class="wpcf7-list-item last"><label><input type="radio" name="Revenue-Generation" value="500,000-1,000,000"><span class="wpcf7-list-item-label">500,000-1,000,000</span></label></span></span></span></p>
<p>8.What is the biggest challenge facing your business right now?<br>
<span class="wpcf7-form-control-wrap Business-Challenge"><textarea name="Business-Challenge" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p>9.Have you already participated or committed to participate in an “incubator,” "accelerator," or "pre-accelerator" program? If yes, please tell us which program.<br>
<span class="wpcf7-form-control-wrap Participation-InCompetition"><select name="Participation-InCompetition" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="No">No</option><option value="Yes - Please specify below">Yes - Please specify below</option></select></span></p>
<p><span class="wpcf7-form-control-wrap Specify-36"><input type="text" name="Specify-36" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></p>
<p style="color:red;">THE PROGRAM</p>
<p>10.What support would you like to have from this programme?<br>
<span class="wpcf7-form-control-wrap Programme-Benefit"><textarea name="Programme-Benefit" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p>11.Please select how you heard about this program: (please check all that apply)<br>
Other:----------------------<span class="wpcf7-form-control-wrap Reffered-By"><span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required"><span class="wpcf7-list-item first"><label><input type="checkbox" name="Reffered-By[]" value="Referred by someone"><span class="wpcf7-list-item-label">Referred by someone</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="Attended an info-session"><span class="wpcf7-list-item-label">Attended an info-session</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="LinkedIn post"><span class="wpcf7-list-item-label">LinkedIn post</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="Facebook post"><span class="wpcf7-list-item-label">Facebook post</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="From National Youth Council"><span class="wpcf7-list-item-label">From National Youth Council</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="Press/Media Mention (newspaper, radio or TV) or Blog Article"><span class="wpcf7-list-item-label">Press/Media Mention (newspaper, radio or TV) or Blog Article</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Reffered-By[]" value="Online Search (ie Google)"><span class="wpcf7-list-item-label">Online Search (ie Google)</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Reffered-By[]" value="Word of Mouth"><span class="wpcf7-list-item-label">Word of Mouth</span></label></span></span></span><br>
Others <span class="wpcf7-form-control-wrap Other-36"><input type="text" name="Other-36" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></p>
<p style="color:red;">OUR CURIOSITY</p>
<p>12.In your opinion what could National Youth Council do to increase youth participation in all Youth initiatives<br>
<span class="wpcf7-form-control-wrap Programme-Participation"><textarea name="Programme-Participation" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p>13.How do you prefer to be engaged:<br>
<span class="wpcf7-form-control-wrap Engamenet-Ways"><span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required"><span class="wpcf7-list-item first"><label><input type="checkbox" name="Engamenet-Ways[]" value="Voluntary work"><span class="wpcf7-list-item-label">Voluntary work</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Engamenet-Ways[]" value="Internships and work placements"><span class="wpcf7-list-item-label">Internships and work placements</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Engamenet-Ways[]" value="Training"><span class="wpcf7-list-item-label">Training</span></label></span></span></span><br>
Others <span class="wpcf7-form-control-wrap Other-Ways"><input type="text" name="Other-Ways" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></p>
<p>14.What is your preferred platform to hear about available opportunities?<br>
<span class="wpcf7-form-control-wrap Engagement-Platforms"><span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required"><span class="wpcf7-list-item first"><label><input type="checkbox" name="Engagement-Platforms[]" value="SMS"><span class="wpcf7-list-item-label">SMS</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Engagement-Platforms[]" value="Radio"><span class="wpcf7-list-item-label">Radio</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Engagement-Platforms[]" value="TV"><span class="wpcf7-list-item-label">TV</span></label></span></span></span><br>
Others <span class="wpcf7-form-control-wrap Other-Platforms"><input type="text" name="Other-Platforms" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></p>
<p>15.What opportunities are you interested in participating in?<br>
<span class="wpcf7-form-control-wrap Programs-Interested"><span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required"><span class="wpcf7-list-item first"><label><input type="checkbox" name="Programs-Interested[]" value="Skills Development"><span class="wpcf7-list-item-label">Skills Development</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Economic/Enterprise Development"><span class="wpcf7-list-item-label">Economic/Enterprise Development</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Value Character Development"><span class="wpcf7-list-item-label">Value Character Development</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Civic Engagement"><span class="wpcf7-list-item-label">Civic Engagement</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Drug &amp; Crime Free"><span class="wpcf7-list-item-label">Drug &amp; Crime Free</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Creative Economy"><span class="wpcf7-list-item-label">Creative Economy</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Health"><span class="wpcf7-list-item-label">Health</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Environment"><span class="wpcf7-list-item-label">Environment</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Technology"><span class="wpcf7-list-item-label">Technology</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Manufacturing"><span class="wpcf7-list-item-label">Manufacturing</span></label></span><span class="wpcf7-list-item"><label><input type="checkbox" name="Programs-Interested[]" value="Agriculture"><span class="wpcf7-list-item-label">Agriculture</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Programs-Interested[]" value="Education"><span class="wpcf7-list-item-label">Education</span></label></span></span></span></p>
<p>16.In your opinion what measures should be implemented to better coordinate Youth initiatives, in your county and subsequently the entire country.<br>
<span class="wpcf7-form-control-wrap Programme-Measures"><textarea name="Programme-Measures" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span></p>
<p style="color:red;">Terms &amp; Conditions</p>
<p>Fursathon 2021 Terms &amp; Conditions (By checking the following boxes, I agree I have met the following requirements for program participation </p>
<p>I am at least 18 years of age or older<br>
<span class="wpcf7-form-control-wrap Age-Certify"><select name="Age-Certify" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Yes">Yes</option><option value="No">No</option></select></span></p>
<p>I have regular access to internet through a computer and/or mobile phone (you can still apply even if your access to internet is not regular)<br>
<span class="wpcf7-form-control-wrap Internet-Access"><select name="Internet-Access" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Yes">Yes</option><option value="No">No</option></select></span></p>
<p>I am able to dedicate 4-8 hours per week to participating in this program<br>
<span class="wpcf7-form-control-wrap Commitment-Hours"><select name="Commitment-Hours" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Yes">Yes</option><option value="No">No</option></select></span></p>
<p>I will abide with the National Youth Council code of conduct<br>
<span class="wpcf7-form-control-wrap Conduct-Code"><select name="Conduct-Code" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Yes">Yes</option><option value="No">No</option></select></span></p>
<p>I consent to National Youth Council sharing the diversity information that I have provided above with third-party investors who are seeking to invest in companies with diverse leadership, and to receiving communications from such third-party investors, the National Youth Council regarding this program and future investment opportunities.</p>
<p>Please note you may opt-out of communications and withdraw your consent to the processing and sharing of your information at any time without penalty. If you do decide to withdraw consent at a later date, your withdrawal will not change the fact that the National Youth Council had a lawful basis to share your data prior to that point.</p>
<p>By clicking Register, you are consenting to National Youth Council Privacy Policy, code of conduct and Terms of Use.</p>
<p><input type="submit" value="REGISTER" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
<div class="wpcf7-response-output" aria-hidden="true"></div></form></div></div>
				</div>
				</div>
						</div>
					</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
$("#read_more").click(function(){
	$(".read_div").show();
	$(".reads").hide();
	$("#read_less").show();

})
$("#read_less").click(function(){
	$(".read_div").hide();
	$(".reads").hide();
	$("#read_more").show();

})
	})
</script>