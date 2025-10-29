<style>
    @media all and (max-width:768px){
.mobile_hidden{
	display: none;
}
.mobipdless{
 	padding: 4px  !important;
 }

}
@media all and (min-width: 768px){
.desktop_hidden{
	display: none;
}

}
#discription_pane{
  min-height: 100px;
  box-shadow: 0px 0px 2px #ccc;
  border-radius: 5px;
}
#tart_button{
  float: right;
  margin-top: 5px;
  margin-bottom: 5px;
}
#header_holder{
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#start_button").click(function(){
      $.get("signup.php",function(data){
        $("#discription_pane").html(data);
      })
    })
   })
 </script>
 <div class="ribbon">
    </div>
    <div class="container-fluid parentsd home_pages" id="elerning">
    <div class="row">
        <!-- Carousel -->

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 " id="header_holder">
    <div class="col-sm-10 col-xs-10">E-learning center</div>
    <div class="col-sm-2 col-xs-2"><span id="start_button" class="btn btn-block btn-primary">Sign-up/sign-in</span></div></div>
  <div class="col-sm-12 col-xs-12" id="discription_pane">
    <p>Fursa is an initiative spearheaded by the National Youth Council to build youth entrepreneurs to drive
economic growth and development. It is a platform where youth can access all youth initiatives
through vetted partners such as YuniTok and Whitebox, and is being built in partnership with Telkom.</p><p>
The National Youth Council undertakes an innovation challenge each year from June in the run – up
to the National Youth Week (6th-12th August) to facilitate the development of tech & non-tech
solutions to challenges businesses and our nation is facing. The theme for this year’s challenge is
Fursa vs Economic Recovery Challenge and the aim is to drive Youth engagement with businesses in a
strong and unifying platform that encourages the growth of a knowledgeable and innovative Youth
who will together with the business community confidently build a competitive and resilient
economy. This year’s challenge theme is Fursa vs Economic Recovery Challenge.</p><p>
Whitebox is an initiative of the Government of Kenya through the Ministry of Information,
Communications and Technology and the ICT Authority, geared towards catalysing the successful
growth of local ventures to global, world-class status. It is a platform with a vision to offer on-demand
training, mentorship, partnerships and linkages to investors to Kenyan startups and entrepreneurs.</p><p>
As the Fursa NYC platform launches, Whitebox will be one of the first partners to be onboarded to
run the Fursa vs Economic Recovery Challenge by providing access to content for early stage
entrepreneurs through the Whitebox platform, integrating the two platforms to deliver this youth
initiative with the support of the content available on Whitebox. We will develop the Whitebox
platform to have a user-friendly interface, to collect impact data and to track completion rates.
By leveraging the two platforms, The Kijiji will support the Fursa initiative to train 100 youth per
county across the 47 Counties in Kenya and to support youth in developing innovative ideas and
pitching their refined business ideas leveraging the Whitebox platform.</p>
  </div>

</div>

</div>
 