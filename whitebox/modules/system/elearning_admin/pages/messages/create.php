 <style type="text/css">
.search_input{
width: 87%;
padding: 4px;
border-radius: 5px;
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

   }
   #main_dash{
    min-height: 30px;
   
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
  
  min-height: 20px;
}
.img_hold{
  min-height: 50px;
  background-repeat: no-repeat;
  background-size: cover;
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
	min-height: 150px;
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
      

    <div class="col-sm-12 col-xs-12 no_padding" id="mail_holdar">
    	
    	<div class="col-xs-12 col-sm-12 no_padding">
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
       	Body:<textarea class="col-xs-12 col-sm-12" id="message_box" placeholder="Type Your Message Here"></textarea>
       </div>
       <div class="col-sm-12 col-xs-12 no_padding" id="send_sec">
      <div class="col-sm-4 col-xs-12"> 
      	Send to:
      	<select id="select_reciever">
      		<option>All Users</option>
      		<option>Innovators Only</option>
      		<option>Evaluating team Only</option>
      		<option>Executives Only</option>
            <option>Super Admins Only</option>
      		<option>All Whitebox Members</option>
      		<option>one person</option>
       </select>
   </div>
   
       <div class="col-sm-4 col-xs-12"><input type="file" id="attachment"></div>
       <div class="col-sm-4 col-xs-12"><span class="btn theme_bg" id="send_email">send</span></div>
       </div>
       <div class="col-sm-12 col-xs-12 " id="messageerror" style="text-align: center;"></div>




























  </div>
</div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
  $("#select_reciever").change(function(){
    var reciever=$(this).val();
    //alert(reciever)
    if(reciever=="one person"){
      $("#single_person").show();
    }else{
      $("#single_person").hide();
    }


  })
$("#send_email").click(function(){
	var loader=$("#loader").html();
	 $("#messageerror").html(loader);
var reciever=$("#reciever").val();
var message_box=$("#message_box").val();
var copy_email=$("#copy_email").val();
var select_reciever=$("#select_reciever").val();
var subject=$("#subject").val();
var attachment=$("#attachment").val()
$.post("modules/system/elearning_admin/pages/messages/send.php",{
  select_reciever:select_reciever,
  copy_email:copy_email,
  message_box:message_box,
  reciever:reciever,
  attachment:attachment,
  subject:subject
},function(data){
  $("#messageerror").html(data);
})

})


   })
 </script>