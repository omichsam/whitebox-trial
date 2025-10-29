function remember_login(user){
        var loader=$("#loader").html();
        var sp_loader='<img src="images/loading.gif">';
         
         $("#loginbtn").find("b").html("sp_loader");

         $("#alertoverly1").show();
         $("#alertoverly1").find('pagewrap').show().html(loader);
         $("#loginloadto").hide();
         $.post("landingpage.php",{
            loginuser:user,
         },function(data){
            $(".overly,#alertoverly1,#splashpage").hide();
            $("#landingpage").show().html(data);
            $("#openhomebtn").click();
           set_globals(user);
        });
}
function alert_user_attacks_attempts(loginuser){
     var title="Failed Attempts: Notifying account owner";
     var url="modules/system/welcome/attack.php";
     var params='&loginuser='+loginuser+'&em=';
     show_alert(title,url,params);
}
  $(document).ready(function(ev){

      $("#splashpage").show().removeClass("fadeOutDown").addClass("fadeInUp").show();
      $(".overly").show().removeClass("fadeOutDown").addClass("fadeInUp").show();

      $("#loginbox").show().removeClass("fadeOutDown").addClass("fadeInUp").show();
      
          $("#landingpage").hide();
    var loginstatus=getCookie('status');
    var user=getCookie('user_email');
     if(loginstatus=="loggedin" && $.trim(user)!==""){
        remember_login(user);
    }else{}

    $(".splashbtns").click(function(){
      var role=$(this).attr("role");
      $(".splashpages").hide();
      $(".overly,#"+role).removeClass("fadeOutDown").addClass("fadeInUp").show();
    });
    $(".splashbackbtn").click(function(){
      $(".overly,.splashpages").removeClass("fadeInUp").addClass("fadeOutDown").fadeOut();
    });

    $('#loginpass').keydown(function (e){
      if(e.keyCode == 13){
          $("#loginbtn").click();
      }else{

      }
    });

    
    /* Login event */
    $("#loginbtn").click(function(){
        var loader=$("#loader").html();
        var sp_loader='<img src="images/loading.gif">';
        var thisele=$(this);
        var loginuser=$.trim($("#loginuser").val());
        var loginpass=$.trim($("#loginpass").val());
        
            if(loginuser && loginpass){
              thisele.find("b").html(sp_loader);
               $("#loginloadto").hide().html("");
              $("#login_form").ajaxForm(
                  {
                  target:'#loginloadto',
                  success:function(data){
                     if($.trim(data)=="admin"){
                     var user=btoa(loginuser)
                        //gto confirm acc
                              set_globals(loginuser);
                              $("#user_email").val(btoa(loginuser));
                             thisele.find("b").html("");
                             $("#alertoverly1").show();
                             $("#alertoverly1").find('pagewrap').show().html(loader);
                             $("#loginloadto").hide();
                             loginuser=user;
                             $.post("landingpage.php",{
                                loginuser:loginuser,
                                loginpass:loginpass
                            },function(data){
                            //var user=btoa(loginuser)
                             $.post("plugins/php_functions/set_logs.php",{user:user})



                                $(".overly,#alertoverly1,#splashpage").hide();
                                $("#landingpage").show().html(data);
                                $("#openhomebtn").click();
                               
                            });
                         
                      }else if($.trim(data)=="Update_pass"){
                          
                         thisele.find("b").html(""); 
                            var role="reset_password";
                     $(".splashpages").hide();
                   $(".overly,#"+role).removeClass("fadeOutDown").addClass("fadeInUp").show();
                          
                          
                      }else{
                         $("#loginloadto").show().html(data);
                         thisele.find("b").html("");
                         var atmpts=getCookie('loginattempts');
                         var new_attempts=atmpts*1 + 1*1;
                        
                         /*if(new_attempts==4){
                            alert_user_attacks_attempts(loginuser);
                         }else{
                            setCookie("loginattempts",new_attempts,30);
                          }
                          */
                          
                         
                     }
                   }
                  }).submit();
            }else{
              $("#loginloadto").show().html("Username and Passward required.");
              thisele.find("b").html("");
            }

      });
    /*end login*/

     

    /*Recover Password*/
    $("#recover_passowrd").click(function(){
        var username=$("#recoverusername").val();
        var sp_loader='<img src="images/loading.gif">'
        var thisele=$(this);
       
        if($.trim(username)){
            $("#recover_pass_loadto").hide();
            thisele.find("b").html(sp_loader);
            $.post("modules/system/login/recover.php",{
                username:username
            },function(data){
                  $("#recover_pass_loadto").fadeIn().html(data);
                   thisele.find("b").html("");
            });
        }else{
            $("#recover_pass_loadto").fadeIn().html("Enter your Phone or Email")
        }
    })

    /*confirm key*/
    $("#confirm_key_btn").click(function(){
        var confirmation_id=btoa($("#confirmation_id").val());
        var sp_loader='<img src="images/loading.gif">';
        var thisele=$(this);
        var role=$("#confirmkeyrole").val();
        var usernme="";

        if(role=="recover_pass"){
             username=$("#recoverusername").val();
        }else if(role=="confirm_account"){
             username=$("#newemail").val();
        }else{}
        if($.trim(confirmation_id)){
            $("#confirm_key_loadto").hide();
            thisele.find("b").html(sp_loader);
            var codes=$("#user_email").val();
            if(codes==confirmation_id){
                thisele.find("b").html(""); 
                            var role="reset_password";
                     $(".splashpages").hide();
                   $(".overly,#"+role).removeClass("fadeOutDown").addClass("fadeInUp").show();
                          
                         
            }else{
               // alert(codes+" "+confirmation_id)
                $("#confirm_key_loadto").fadeIn().html("Incorrect Code");
                thisele.find("b").html("");
            }
        }else{
            $("#confirm_key_loadto").fadeIn().html("Enter verification code")
        }
    });

    /*Saving new password*/
    $("#save_reset_pass_btn").click(function(){
          var userrname=$("#loginuser").val();
          var userr=$("#recoverusername").val();
          if(userr==""){
              
          }else{
             userrname=userr; 
          }
          var pass1a=$("#nereset_pass").val();
          var pass3=$("#loginpass").val();
          var pass2a=$("#confirm_nereset_pass").val();
          var sp_loader='<img src="images/loading.gif">';
          var thisele=$(this);
           if($.trim(userrname) && $.trim(pass1a) && $.trim(pass2a)){
              if(pass1a==pass2a){
                  if(pass1a==pass3){
                  $("#createreset_pass_loadto").fadeIn().html("Use a different password");
                  }else{
                  if(pass2a.length>7){
                    $("#createreset_pass_loadto").hide();
                    thisele.find("b").html(sp_loader);
                    var password=btoa(pass1a)
                    var new_user=btoa(userrname)
                    $.post("modules/system/login/change_password.php",{
                        password:password,
                        new_user:new_user
                    },function(data){
                       // alert()
                      thisele.find("b").html("");
                      if($.trim(data)=="success"){
                    $(".splashpages").hide();
					$(".overly,#loginbox").removeClass("fadeOutDown").addClass("fadeInUp").show();
			   	    //$("#loginuser").val("");
			   	    $("#loginpass").val("");
			   	    $("#loginloadto").show().addClass('success').html("Log in with new password");
			
                        }else{
                           $("#createreset_pass_loadto").fadeIn().html(data);
                      }
                      });
                    }else{
                       $("#createreset_pass_loadto").fadeIn().html("Password too short");
                    }
              
                    }
              }else{
                  $("#createreset_pass_loadto").fadeIn().html("Passwords mismatch");
              }
          }else{
              $("#createreset_pass_loadto").fadeIn().fadeIn().html("Enter your new password")
          }
    });
    
    //set new password
    $("#save_new_pass_btn").click(function(){
          var username=$("#recoverusername").val();
          var pass1=$("#newest_pass").val();
          var pass2=$("#confirm_newest_pass").val();
          var sp_loader='<img src="images/loading.gif">';
          var thisele=$(this);
           if($.trim(username) && $.trim(pass1) && $.trim(pass2)){
              if(pass1==pass2){
                  if(pass2.length>5){
                    $("#create_pass_loadto").hide();
                    thisele.find("b").html(sp_loader);
                    $.post("modules/system/login/change_password.php",{
                        pass1:pass1,
                        username:username
                    },function(data){
                      thisele.find("b").html("");
                      if($.trim(data)=="success"){
                            $("#create_pass_loadto").fadeIn().html(data);
                      }else{
                           $("#create_pass_loadto").fadeIn().html(data);
                      }
                      });
                    }else{
                       $("#create_pass_loadto").fadeIn().html("Password too short");
                    }
              }else{
                  $("#create_pass_loadto").fadeIn().html("Passwords mismatch");
              }
          }else{
              $("#create_pass_loadto").fadeIn().fadeIn().html("Enter your new password")
          }
    });
  });
