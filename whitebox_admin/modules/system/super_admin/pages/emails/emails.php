 <style type="text/css">
.search_input{
width: 87%;
padding: 4px;
border-radius: 5px;
border: 1px solid #908989;
position: absolute;
right: 0px;
margin: -6px 6px 0px;

   }
   .search_icon{
    color: #ccc;
position: absolute;
right: 13px;
padding: 3px;

   }
   #Dashboardhead li{
    color: #000;
    display: inline;
   }
   #Dashboardhead{
    min-height: 30px;
   }
   #outer_dash{

    box-shadow: 0 0 3px #dadada;
   }
   #main_dash{
    min-height: 30px;
    box-shadow: 0 0 2px #ccc;
    background-color: #ccc;
   }
   #lower_dash{
    background-color: #ededed;
   }
   li{
    display:inline;
    margin-right: 5px;
   }
   .online{
  min-height: 2px;
  border-radius:9px;
  background-color: green;
}
.bluesd{
  color: blue;
  cursor: pointer;
}
#lower_table_header{
  box-shadow: 0 0 2px #ccc;
  font-size: 14px;

}
#lower_table_data{
  background-color: #fff;
}
#lower_dash_footer{
  margin-top: 5px;
  background-color: #ededed;
}
.search_btns{
  box-shadow: 0 0 3px #ccc;
  min-height: 20px;
}
.img_hold{
  min-height: 50px;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: 0 0 3px #ccc;
  background-position: center;
  background-size:cover;

}
.table_display{

 border-bottom: 1px solid #ccc;
  background-color: #fff;
}
#send_sec{
    margin-top: 10px;
}
#email_headerr{
    text-align: center;
    border-bottom: 2px solid #ccc;
    border-radius:10px;
    font-style: italic;
    font-weight: bolder;
}
#message_box{
    min-height: 350px;
}
.error_repoerst{
    font-size:19px;
    font-weight:bold;
    text-align:center;
    color:red;
}
 </style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
     $.post("modules/system/register/register.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <?php
  include("../../../../../connect.php");
 ?>
 <section >
      <div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
           <span class="float_left">Emails</span>
             <span class="float_right " > Home>Emails</span>
        
      </div>
      <div id="outer_dash" class="no_padding col-sm-12 col-xs-12" >

      <div id="main_dash" class="no_padding col-sm-12 col-xs-12" ></div>

      <div id="lower_dash" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <!--<li class="float_left"><span class="online" >&nbsp;<i class="fa fa-plus" style="color: #fff;"></i>&nbsp;</span> <span class="bluesd" id="add_landloard">Add landlord</span></li>-->
              <li class="float_right " ><i class="fa fa-print"></i> <span class="bluesd">Print</span></li>
            <li class="float_right export_file" ><i class="fa fa-upload"></i><span class="bluesd"> Export</span></li>
          </ul>
      </div>
    <div class="col-sm-12 col-xs-12 no_padding" id="mail_holdar">
        
        <div class="col-xs-12 col-sm-12 no_padding">
            <span id="email_headerr" class="col-xs-12 col-sm-12" >Create an email</span>
        <div class="col-sm-2 col-xs-12 no_padding"></div>
        <div class="col-sm-8 col-xs-12 no_padding">
       <div class="col-sm-6 col-xs-12">
     
Subject:<input type="name" placeholder="e.g Meeting optional" class="splashinputs" id="subject">
</div>
       <div class="col-sm-6 col-xs-12">
        Cc:<input type="name" class="splashinputs" placeholder="email@example.com optional" id="copy_email">
       </div>
       <div class="col-sm-6 col-xs-12 not_shown" id="single_person">
        Email:<input type="name" class="splashinputs" placeholder="email@example.com" id="reciever">
       </div>
       <div class="col-sm-12 col-xs-12">
        Body:<textarea class="col-xs-12 col-sm-12" id="message_box" placeholder=" Compose your email here"></textarea>
       </div>
       <div class="col-sm-12 col-xs-12 no_padding" id="send_sec">
      <div class="col-sm-4 col-xs-12"> 
        Send to:
        <select id="select_reciever">
            <option>All</option>

<?php
/*
include("../../../../connect.php");
         $sqlg="SELECT * FROM wp_conference_participations";
                        $query_runpl=mysqli_query($con,$sqlg)or die($query_runpl."<br/><br/>".mysqli_error($con));

                        while($row=mysqli_fetch_array($query_runpl)){
                            $participationc=$row['participation'];
              ?>
              <option><?php echo $participationc?></option>
          <?php
        }
        */
          ?>
            <option>One person</option>
       </select>
   </div>
   
       <div class="col-sm-4 col-xs-12"><input type="file" id="attachment"></div>
       <div class="col-sm-4 col-xs-12"><span class="btn theme_bg" id="send_email">send</span></div>
       </div>
<div class="col-sm-12 col-xs-12" id="error_repoerst" style="text-align:center"></div>



























  </div>
</div>
</div>
     <!-- <div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">search</span><input type="text" name=""></li>

              <li class="float_left " ><select>
                <option>select all</option>
                <option>select few</option>
              </select></li>
              <li class="float_left " ><span class="search_btns">Search</span></li>
            <li class="float_right " ><span class="search_btns"> Clear filtering</span></li>
          </ul>
      </div>-->
      <!--<div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">Show</span>
          <select>
                <option>10</option>
                <option>5</option>
              </select></li>
              <li class="float_left " ><span class="">entries</span><i class="fa fa-previous"></i></li>
            <li class="float_right " ><span class=""></span></li>
          </ul>
      </div>-->
  </section>
  
 <script type="text/javascript">
   $(document).ready(function(){
  $("#select_reciever").change(function(){

    var reciever=$(this).val();
    //alert(reciever)
    if(reciever=="One person"){
      $("#single_person").show();
    }else{
      $("#single_person").hide();
    }


  })
$("#send_email").click(function(){
  var loader=$("#loader").html()
var user_email=$("#reciever").val();
var message_box=$("#message_box").val();
var copy_email=$("#copy_email").val();
var send_to=$("#select_reciever").val();
var subject=$("#subject").val();
//var attachment=$("#attachment").val()
if(message_box && subject){
  $("#error_repoerst").html("sending email.." + loader)
$.post("modules/system/super_admin/pages/emails/sendmail.php",{
  send_to:send_to,
  copy_email:copy_email,
  message_box:message_box,
  user_email:user_email,
 // attachment:attachment,
  subject:subject
},function(data){
  $("#error_repoerst").html(data);
  $("#reciever").val("");
$("#message_box").val("");
$("#copy_email").val("");
$("#subject").val("");
})
}else{
  $("#error_repoerst").html("Subject and email content required!");
}

})


   })
 </script>