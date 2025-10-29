/*GLOBAL FUNCTIONS */
//validate email function
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test( $email );
}
//check if has number function
function has_number(Mystring){
	return /\d/.test(Mystring);
}

function check_special_chars(myString) {
	var regex=  /[^\w\s]/gi;
	return regex.test(myString);
}
/*format bytes like 1000 bytes will return 1KB */
function formatBytes(bytes,decimals) {
   if(bytes == 0) return '0 Bytes';
   var k = 1000,
       dm = decimals || 2,
       sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
       i = Math.floor(Math.log(bytes) / Math.log(k));
   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
/*generate random number*/ 
function randomString(len){
    var an = an&&an.toLowerCase();
    var str="", i=0, min=an=="a"?10:0, max=an=="n"?10:62;
    for(;i++<len;){
      var r = Math.random()*(max-min)+min <<0;
      str += String.fromCharCode(r+=r>9?r<36?55:61:48);
    }
    return str;
}
/*preview image upload*/
var preview_file = function(event,load_to,thisform) {
    $("."+load_to+",#"+load_to).css({"background-image":"url('"+URL.createObjectURL(event.target.files[0])+"')"});
 
  		 $("#"+thisform).ajaxForm(
            {
            target:'#',
            success:function(data){
            	 alert(data)
            }
            }).submit();

};
function   openfile_upload(file){
	document.getElementById(file).click();
}

//play tones 
function  tone(tone_type){
	if(tone_type=="t1"){
		  $("#tone1")[0].play();
	}
	else if(tone_type=="t2"){
		 $("#tone2")[0].play();
	}else if(tone_type=="t3"){
		 $("#tone3")[0].play();
	}else if(tone_type=="t4"){
		 $("#tone4")[0].play();
	}
	else if(tone_type=="t7"){
		 $("#tone7")[0].play();
	}else if(tone_type=="t6"){
		 $("#tone6")[0].play();
	}
	else if(tone_type=="t5"){
		 $("#tone6")[0].play();
	}else if(tone_type=="t10"){
		 $("#tone10")[0].play();
	}
	else if(tone_type=="t11"){
		 $("#tone11")[0].play();
	}
	else if(tone_type=="notice"){
		 $("#tone12")[0].play();
	}else if(tone_type=="t18"){
		 $("#tone18")[0].play();
	}
	else if(tone_type=="t21"){
		 $("#tone21")[0].play();
	}else{
		 $("#tone1")[0].play();
	}
}

/*cookies*/
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function scroll_botton_of(element){
  		$("#"+element).animate({
				scrollTop:$("#"+element).offset().top+1000000
		},'slow');
}

function check_cookies_enabled(){
	setCookie("c_enabled",'true','30');
 			setTimeout(function(){
 				var cookie=getCookie("c_enabled");
 				  if(cookie=="true"){

 				  }else{
 					window.location='disable.html';
 				}
 			},10000);
}

function ChangeUrl(new_title, url) {
if (typeof (history.pushState) != "undefined") {
var obj = { Title: new_title, Url: url };
$("#doc_title").text(new_title);
history.pushState(obj, obj.Title, obj.Url);	
scrool_to_top_whole_doc()	
	} else {
	   	alert("Browser does not support HTML5.");
	}
}


function disable_keys(){
	document.onkeydown = function (e) {
	var key = e.charCode || e.keyCode;
	if(event.keyCode == 123) {
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
	return false;
	}
	else{
	//do nothing
	}	     
}
 $(document).bind("contextmenu",function(e) {
	e.preventDefault();
}) 
}
/**/
function set_globals(loginuser){
	var session_id=$("#user_sessionid").val();
     $.post("modules/splashpage/setglobals.php",{
    		loginuser:loginuser,
    		session_id:session_id
    },function(data){
     	$("#returnglobals").html(data);
     });
}
function  get_visitor(page,ScrH,ScrW){
	 //public ip 
				var user_email=getCookie("user_email");
				var user_session_id=getCookie("session_id");
				var public_ip ="";
				var country="";
 
						if(user_session_id){
							$("#user_sessionid").val(user_session_id);
						}else{
						  user_session_id="";
 						}




 						
 				 		/**
 * Get the user IP throught the webkitRTCPeerConnection
 * @param onNewIP {Function} listener function to expose the IP locally
 * @return undefined
 */
function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
    //compatibility for firefox and chrome
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
    }),
    noop = function() {},
    localIPs = {},
    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
    key;

    function iterateIP(ip) {
        if (!localIPs[ip]) onNewIP(ip);
        localIPs[ip] = true;
    }

     //create a bogus data channel
    pc.createDataChannel("");

    // create offer and set local description
    pc.createOffer(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });
        
        pc.setLocalDescription(sdp, noop, noop);
    }, noop); 

    //listen for candidate events
    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
}

// Usage

getUserIP(function(ip){
	//alert(ip)
		//document.getElementById("ip").innerHTML = 'Got your IP ! : '  + ip + " | verify in http://www.whatismypublicip.com/";
});
//get ip address
//











				/*
				$.getJSON("https://freegeoip.net/json/", function(data){
						 country = data.country_name;
						 public_ip = data.ip;
 				     });
 				     */

				     var ua = navigator.userAgent;
					 var device_type=$("#user_device_type").val();
					 var device=$("#user_device").val();
					 var browser=$("#user_browser").val();
 
						//addVisitor to be here
						$.post("add_visitor.php",{
							page:page,
							ScrW:ScrW,
							ScrH:ScrH,
							device:device,
							browser:browser,
							device_type:device_type,
							public_ip:public_ip,
							country:country,
							user_session_id:user_session_id,
							user_email:user_email
						},function(data){
							setCookie('session_id',$.trim(data),30);
 							setCookie('country',country,30);
  							$("#user_sessionid").val($.trim(data));
  							$("#user_current_page").val(page);

  						});
 				 	 
}
$(document).ready(function(){
	check_cookies_enabled()
		var ScrW=$(window).width();
	    var ScrH=$(window).height();
	    var page="home";
 		get_visitor(page,ScrH,ScrW);
		 //disable_keys();
});
