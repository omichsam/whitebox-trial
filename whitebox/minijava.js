  function activityWatcher(){
  //The number of seconds that have passed
    //since the user was active.
    var secondsSinceLastActivity = 0;
 
    //15 minutes. 60 x 15 = 1500 seconds.
    var maxInactivity = (60 * 15);
    var minwaiting=(60*2);
 
    //Setup the setInterval method to run
    //every second. 1000 milliseconds = 1 second.
    setInterval(function(){
        secondsSinceLastActivity++;
        console.log(secondsSinceLastActivity + ' seconds since the user was last active');
        //if the user has been inactive or idle for longer
        //then the seconds specified in maxInactivity
        
        
        
        
        
        
          if(secondsSinceLastActivity > minwaiting){
              //alert()
             /* var clock_data = document.getElementById("clock_data");
              clock_data.style.display = "none";
              var clock_data = document.getElementById("clock_data");
              clock_data.style.display = "none";
              document.getElementById("clock_data").disply
              */
              //$("#home").hide();
              //$("#clock_data").show();
              
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        if(secondsSinceLastActivity > maxInactivity){
          var user=$("#user_email").val();
    $.post("plugins/php_functions/updatelods.php",{user:user},function(data){
        
     $("#splashpage").show();
      $(".overly").show();

      $("#loginbox").show();
      
          $("#landingpage").hide();
          $(".splashinputs").val('');
          setCookie('user_id',"",90);
      setCookie('user_email',"",90);
      setCookie('user_name',"",90);
      setCookie('user_phone',"",90);
      setCookie('status',"logedout",90);
        $("#clock_data").hide().html("");
         $("#home").hide().html("");
     // window.location="https://www.tumcathcom.com/admin_nmk";
     window.location="index.php";
    })
        /* $("#splashpage").show();
          $(".overly").show();

          $("#loginbox").show();
          
          $("#landingpage").hide();
          $(".splashinputs").val('');
          setCookie('user_id',"",90);
          setCookie('user_email',"",90);
          setCookie('user_name',"",90);
          setCookie('user_phone',"",90);
          setCookie('status',"logedout",90);
          */
        }
    }, 1000);
 
    //The function that will be called whenever a user is active
    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
           
              $("#clock_data").hide();
               $("#home").show();
        secondsSinceLastActivity = 0;
    }
 
    //An array of DOM events that should be interpreted as
    //user activity.
    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];
 
    //add these events to the document.
    //register the activity function as the listener parameter.
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
 
 
}
 
activityWatcher();