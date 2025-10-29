<?php
session_start();
$_SESSION['chattype']="loggedin";

?>

 <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/js/animate.css"> 
 
 
  <style>
  .foms_contri{
      background-color: #fff;
border: 1px solid #D6D4D4;
width: 100%;
padding: 10px 16px;
font-size: 18px;
line-height: 1.3333333;
border-radius: 6px;
  }
.splashinputs{
width: 100%;
padding: 6px;
border: none;
border: 1px solid #ccc;
margin-bottom: 4px;
color: #6a8d96;

}
    #open_presentas{
   background: #fff;
min-height: 50px;
right:0px;
min-width: 50px;
position: absolute;
z-index: 99;
top:4%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;  
border-radius:40px 0 0 40px;
}
    #social_presentas{
 background: #fff;
min-height: 200px;
right:0px;
position: absolute;
z-index: 99;
top:4%;
overflow:auto;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;

}
#message_ereas{
    min-height:250px;
    max-height:300px;
    overflow:auto;
}
#message_stater{
    min-height:250px;
}
      
  </style>

<audio id="myAudio">
  <source src="tones/succes.mp3" type="audio/mpeg">
</audio>
<?php
include "../../../connect.php";
include("../../functions/security.php");
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
//echo "this is email".$my_id;
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$first_name=$geter['first_name'];
$Last_name=$geter['Last_name'];
}else{
$Last_name=""; 
$Last_name="";   
}

?>

  <!--<div class="col-md-12 no_padding  parentsd contacts_pages">-->
<!--
<div class="" id="open_presentas">
 <span class="btn " id="open_pres" style="color:green;cursor:pointer;" > <i class="fa fa-comment fa-2x"></i></span>
    </div>-->
      







  <div class="container">
        <div class="row">
            <!-- Contact form Section Start -->
            <h3 class="border-primary text-center">
            <span class="btn btn-success " id="open_process" style="float:left;display:none">New chat</span> 
             <span class="btn btn-success" id="open_preses" style="float:left">New chat</span> <span class="heading_border bg-primary">Communication area</span></h3>
            <div class="col-md-12" id="contact-form">
<div class="col-sm-12 col-xs-12" id="oldcharts" style="min-height:450px;max-height: 450px;overflow: auto;">
    



</div>



  <div class=" not_shown" id="social_presentas">
            
          <span class=" " id="heri_hubs" style="color:green;cursor:pointer;" >WhiteBox Chat</span>
            <span class="btn " id="close_pres" style="color:red;cursor:pointer;float:right;" >Close <i class="fa fa-times"></i></span>
        <div class="col-sm-12 col-xs-12 presentation_divs not_shown" id="message_ereas">
        
        </div>
       <!-- <div class="col-sm-12 col-xs-12 " id="message_stater">
            <h1 style="text-align:center"></h1>
            <div class="col-sm-12 col-xs-12 no_padding ">
                <div class="col-sm-12 col-xs-12 no_padding ">
                    <div class="col-sm-6 col-xs-6 ">
               First Name:
                <input type="text" id="chart_fname" class="splashinputs">
                </div>
                <div class="col-sm-6 col-xs-6 ">
               Last Name:
                <input type="text" id="chart_sname" class="splashinputs">
                </div>
                <div class="col-sm-12 col-xs-12 ">
                 Email:
                <input type="text" id="chart_email" class="splashinputs">
                </div>
                </div>
               <div class="col-sm-12 col-xs-12 " style="text-align:center"><span class="btn-primary btn" id="start_chart">Start Chat</span></div>
               <div class="col-sm-12 col-xs-12" id="error_div"></div>
                </div>
            
            
        </div>-->
    </div>


                
            </div>
          
            <!-- //Address Section End -->
        </div>
    </div>
    <!-- Map Section Start -->

    <div class="row">
        
        <div>
            
            <script>
     $(document).ready(function(){
    var charts_email='<?php echo $_POST['my_id']?>';
    //alert(charts_email)
 $.post("modules/body/web/readold.php",{
       charts_email:charts_email
            },function(data){
$("#oldcharts").html(data);
            })


              
        $("#contacts_emails").focusout(function(){
    var email=$("#contacts_emails").val();
               if(email==""){


         
        $("#contacts_loader").html("Check your email address!").css('color','red');


                  }else{
//$("#error_display").html()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        $("#contacts_emails").val("");
   //   $(".email_check").hide();
       // $("#newpassword").attr("placeholder","Wrong email format!");
        $("#contacts_loader").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
 $("#contacts_loader").html("").css('color','black');
    }
//$(".cheked_pass").show();

                  }
  });


                    var loader=$("#loader").html();
                    $("#contact_submits").click(function(){
                      var contactsname=$("#contactsname").val();
                      var contacts_emails=$("#contacts_emails");
                        var contacts_message=$("#contacts_message").val()
                        var contacts_emails=$("#contacts_emails").val();
                        if(contacts_emails){
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                            if(!emailReg.test(contacts_emails)){
                                $("#contacts_emails").val("");
                           //   $(".email_check").hide();
                               // $("#newpassword").attr("placeholder","Wrong email format!");
                              //  $("#contacts_loader").html("Check your email address!").css('color','red');
                               // $("#loader_error").html("Check your email Format!");
                            }else{
                        if(contacts_message && contacts_emails && contactsname){
                            $("#contacts_loader").html("Sending...,"+loader).css("color","black");

                             var formData = new FormData($("#contact_form")[0]);
                            $.ajax({
                                url : 'login/contact_form.php',
                                method : 'POST',
                                data : formData,
                                contentType : false,
                                cache : false,
                                processData : false,
                                success : function (response){
                                    var responsed=atob(response)
                                    if($.trim(responsed)=="success"){
                                    
                                      $("#contacts_loader").html(responsed).css("color","black");  
                                    }else{
                                      $("#contacts_loader").html("Sorry, an error occured,kindly try again").css("color","red");      
                                     
                                      //$("#sign_uperror").html(responsed).css("color","black");  
                                    }
                                }
                            })




                        }else{
                       $("#contacts_loader").html("All fields required").css("color","red");
                        }
                    }
                }else{
                     $("#contacts_loader").html("All fields required").css("color","red");
                }
                    })
                
                })
            </script>
           <!-- <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1LI5cEsbx-P_r3yXwg3uMuNPvnzh-rAKj" width="100%" height="480"></iframe>-->
           
        </div>
        
    </div>
</div>

<script type="text/javascript">
 
  $(document).ready(function(){
  

      var loader=$("#loader").html();
      $("#start_chart").click(function(){
       var chart_fname=btoa($("#chart_fname").val());
       var chart_sname=btoa($("#chart_sname").val());
       var chart_email=$("#chart_email").val();
       if(chart_fname && chart_sname && chart_email){
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(chart_email)){
        email_address="";
        $("#chart_email").val("");
     // $(".email_check").hide();
        $("#chart_email").attr("placeholder","Wrong email format!");
    }else{
        var charts_email=btoa(chart_email);
         $("#error_div").html(loader);
        $.post("modules/body/web/save_details.php",{
       chart_fname:chart_fname,
       chart_sname:chart_sname,
       charts_email:charts_email
            },function(data){
                if($.trim(data)=="success"){
                    //alert(charts_email)
                    $.post("modules/body/web/messages.php",{
                     charts_email:charts_email
                    },function(data){
                        $(".splashinputs").val("");
                        $("#message_stater").hide();
                        $("#message_ereas").html(data).show();
                    })
                    
                    
                    
                    
                }else{
                
                
                
                 }
            })
       
        
        
        
    }
       }else{
          $("#error_div").html("All fields required!")  
       }
      })
      
    $("#close_pres").click(function(){
        
       // $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#social_presentas").removeClass("slideInLeft").addClass("animated slideOutLeft");
        $("#open_presentas").show();
//$("#social_presentas").hide();
        })
$("#open_process").click(function(){
    $("#social_presentas").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        //$("#social_presentas").removeClass("slideInRight").addClass("slideOutRight").hide();
          $("#open_presentas").hide();  
           
       // var desinged=setInterval(close_df, 7000);
    
                        $(".splashinputs").val("");
                        $("#message_stater").hide();
                        $("#message_ereas").show();
})


        $("#open_preses").click(function(){
            $(this).hide();
             $("#open_process").show();
        var chart_fname=btoa('<?php echo $first_name?>');
        var chart_sname=btoa('<?php echo $Last_name?>');
     var charts_email=$("#user_email").val();
         $("#error_div").html(loader);
        $.post("modules/body/web/save_details.php",{
       chart_fname:chart_fname,
       chart_sname:chart_sname,
       charts_email:charts_email
            },function(data){
                if($.trim(data)=="success"){
                    //alert(charts_email)
                    $.post("modules/body/web/messages.php",{
                     charts_email:charts_email
                    },function(data){
                          $("#social_presentas").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        //$("#social_presentas").removeClass("slideInRight").addClass("slideOutRight").hide();
          $("#open_presentas").hide();  
           
       // var desinged=setInterval(close_df, 7000);
    
                        $(".splashinputs").val("");
                        $("#message_stater").hide();
                        $("#message_ereas").html(data).show();
                    })
                    
                    
                    
                    
                }else{
                
                
                
                 }
            })
            
           
       // var desinged=setInterval(close_df, 7000);
        })


  })


</script>
<script type="text/javascript">
/*	$(document).ready(function(){
		var loader=$("#loader").html()
		var action="#send_mesd";
		$(action).click(function(){
       
		var targeted="#erro_message";
		$(targeted).html(loader)
		var message=btoa($("#message").val());
		var url="modules/mails/send_email.php";
		var urlret="modules/mails/reply_email.php";
		var name=btoa($("#name").val())
		var phone=btoa($("#phone").val())
		var email=btoa($("#email").val());
		if(email && message && name && phone){
               if(email==""){


         $("#email_check").hide();


                	}else{
//alert()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        email_address="";
        $("#email_address").val("");
      $(".email_check").hide();
        $("#email").attr("placeholder","Wrong email format!");
       // $("#erro_message").html("Check your email!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
    	//alert(email_address)
 $("#email_check").show();
 $("#erro_message").html("").css('color','red');
    }
//$(".cheked_pass").show();

                	}

$.post(""+url+"",{
	email:email,
	phone:phone,
	message:message,
	name:name

},function(data){
	if($.trim(data)=="Success"){
$.post(""+urlret+"",{
	email:email,
	name:name

},function(data){
if($.trim(data)=="success"){
	 $("#erro_message").html(data).css('color','red');
}else{
	 $("#erro_message").html("An error occured!").css('color','red');
}
})


	
	}else{
	
 $("#erro_message").html(responce).css('color','red');
}
})



//alert("corect");




}else{
	$(targeted).html("All fields required!").css("color","red");
}
			//$("#email").focusout();

	})
		$("#name").focusin(function(){
   $("#name_check").hide();
   $("#name").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#name").focusout(function(){
    var name=$("#name").val();
               if(name==""){


         $("#name_check").hide();


                	}else{

                		$("#name_check").show();
                	}
                })
$("#phone").focusin(function(){
   $("#phone_check").hide();
   $("#phone").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#phone").focusout(function(){
    var phone=$("#phone").val();
               if(phone==""){


         $("#phone_check").hide();


                	}else{

                		$("#phone_check").show();
                	}
                })

$("#message").focusin(function(){
   $("#message_check").hide();
   $("#message").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#message").focusout(function(){
    var message=$("#message").val();
               if(message==""){


         $("#message_check").hide();


                	}else{

                		$("#message_check").show();
                	}
                })


$("#email").focusin(function(){
   $("#email_check").hide();
   $("#email").val("");
   $("#erro_message").html("").css('color','red');
  });
 
$("#email").focusout(function(){
    var email=$("#email").val();
               if(email==""){


         $("#email_check").hide();


                	}else{
//alert()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        email_address="";
        $("#email_address").val("");
      $("#email_check").hide();
        $("#email").attr("placeholder","Wrong email format!");
        $("#erro_message").html("Check your email!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
    	//alert(email_address)
 $("#email_check").show();
 $("#erro_message").html("").css('color','red');
    }
//$(".cheked_pass").show();

                	}
  });
	})
    */
</script>
<script type="text/javascript">
 /* $(document).ready(function(){
   
        var user='<?php echo $loginuser?>';
       if(user){

       }else{
        var user=$("#global_u_email").val();
       }

      var loader=$("#loader").html();
      $("#start_chart").click(function(){
       // var user='<?php echo $loginuser?>';
//alert(user)
        if(user){
 
 // alert(user)
 let charts_email=user;
         $("#error_div").html(loader);
        $.post("modules/body/web/save_details.php",{
           user:user
            },function(data){
                if($.trim(data)=="success"){
                    //alert(charts_email)
                    $.post("modules/body/web/messages.php",{
                     charts_email:charts_email  
                    },function(data){
                        $(".splashinputs").val("");
                        $("#message_stater").hide();
                        $("#message_ereas").html(data).show();
                        var x = document.getElementById("myAudio"); 
                         x.play(); 
      var element = document.getElementById("message_ereas");
   element.scrollTop = element.scrollHeight - element.clientHeight;
                    })
                    
                    
                    
                    
                }else{
                
                
                
                 }
            })







        }else{
       var chart_fname=btoa($("#chart_fname").val());
       var chart_sname=btoa($("#chart_sname").val());
       var chart_email=$("#chart_email").val();
       if(chart_fname && chart_sname && chart_email){
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(chart_email)){
        email_address="";
        $("#chart_email").val("");
     // $(".email_check").hide();
        $("#chart_email").attr("placeholder","Wrong email format!");
    }else{
        var charts_email=btoa(chart_email);
         $("#error_div").html(loader);
        $.post("modules/body/web/save_details.php",{
       chart_fname:chart_fname,
       chart_sname:chart_sname,
       charts_email:charts_email,
       user:user
            },function(data){
                if($.trim(data)=="success"){
                    //alert(charts_email)
                    $.post("modules/body/web/messages.php",{
                     charts_email:charts_email  
                    },function(data){
                        $(".splashinputs").val("");
                        $("#message_stater").hide();
                        $("#message_ereas").html(data).show();
                        var x = document.getElementById("myAudio"); 
                         x.play(); 
      var element = document.getElementById("message_ereas");
   element.scrollTop = element.scrollHeight - element.clientHeight;
                    })
                    
                    
                    
                    
                }else{
                
                
                
                 }
            })
       
        
        
        
    }
       }else{
          $("#error_div").html("All fields required!")  
       }
     }
      })
      
    $("#close_pres").click(function(){
        
       // $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#social_presentas").removeClass("slideInLeft").addClass("animated slideOutLeft");
        $("#open_presentas").show();
//$("#social_presentas").hide();
        })
        $("#open_pres").click(function(){
          //alert()
            
       $("#social_presentas").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
       if(user){
      $("#chat_browse").hide();
       }else{
     $("#chat_browse").show();
       }
        //$("#social_presentas").removeClass("slideInRight").addClass("slideOutRight").hide();
          $("#open_presentas").hide();  
           
       // var desinged=setInterval(close_df, 7000);
        })


  })
  */

</script>
<script type="text/javascript">
  $(document).ready(function(){

    var loader=$("#loader").html()
    var action="#send_mesd";
    $(action).click(function(){
       
    var targeted="#erro_message";
    $(targeted).html(loader)
    var message=btoa($("#message").val());
    var url="modules/mails/send_email.php";
    var urlret="modules/mails/reply_email.php";
    var name=btoa($("#name").val())
    var phone=btoa($("#phone").val())
    var email=btoa($("#email").val());
    if(email && message && name && phone){
               if(email==""){


         $("#email_check").hide();


                  }else{
//alert()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        email_address="";
        $("#email_address").val("");
      $(".email_check").hide();
        $("#email").attr("placeholder","Wrong email format!");
       // $("#erro_message").html("Check your email!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //alert(email_address)
 $("#email_check").show();
 $("#erro_message").html("").css('color','red');
    }
//$(".cheked_pass").show();

                  }

$.post(""+url+"",{
  email:email,
  phone:phone,
  message:message,
  name:name

},function(data){
  if($.trim(data)=="Success"){
$.post(""+urlret+"",{
  email:email,
  name:name

},function(data){
if($.trim(data)=="success"){
   $("#erro_message").html(data).css('color','red');
}else{
   $("#erro_message").html("An error occured!").css('color','red');
}
})


  
  }else{
  
 $("#erro_message").html(responce).css('color','red');
}
})



//alert("corect");




}else{
  $(targeted).html("All fields required!").css("color","red");
}
      //$("#email").focusout();

  })
    $("#name").focusin(function(){
   $("#name_check").hide();
   $("#name").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#name").focusout(function(){
    var name=$("#name").val();
               if(name==""){


         $("#name_check").hide();


                  }else{

                    $("#name_check").show();
                  }
                })
$("#phone").focusin(function(){
   $("#phone_check").hide();
   $("#phone").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#phone").focusout(function(){
    var phone=$("#phone").val();
               if(phone==""){


         $("#phone_check").hide();


                  }else{

                    $("#phone_check").show();
                  }
                })

$("#message").focusin(function(){
   $("#message_check").hide();
   $("#message").val("");
   $("#erro_message").html("").css('color','red');
  });
$("#message").focusout(function(){
    var message=$("#message").val();
               if(message==""){


         $("#message_check").hide();


                  }else{

                    $("#message_check").show();
                  }
                })


$("#email").focusin(function(){
   $("#email_check").hide();
   $("#email").val("");
   $("#erro_message").html("").css('color','red');
  });
 
$("#email").focusout(function(){
    var email=$("#email").val();
               if(email==""){


         $("#email_check").hide();


                  }else{
//alert()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        email_address="";
        $("#email_address").val("");
      $("#email_check").hide();
        $("#email").attr("placeholder","Wrong email format!");
        $("#erro_message").html("Check your email!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //alert(email_address)
 $("#email_check").show();
 $("#erro_message").html("").css('color','red');
    }
//$(".cheked_pass").show();

                  }
  });
  })
</script>