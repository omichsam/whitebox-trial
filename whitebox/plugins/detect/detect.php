<?php
function get_devicetype()
{
$server=$_SERVER['HTTP_USER_AGENT'];    
/*check device*/
if(stripos($server,"iPod"!=""))
{
return "ipod";
}
elseif(stripos($server,"iPhone"))
{
return "iphone";
}
elseif(stripos($server,"MSIE"))
{
return "windows phone";
}
elseif(stripos($server,"Nokia"))
{
return "nokia";
}
elseif(stripos($server,"BB"))
{
return "black berry";
}
elseif(stripos($server,"Ipad"))
{
return "ipad";
}
elseif(stripos($server,"Android"))
{
return "android";
}
elseif(stripos($server,"Windows"))
{
return "Desktop";
}
elseif(stripos($server,"IEMobile"))
{
$_REQUEST['IEMobile'] = 1;
return "iemobile";
}
else{
    return "OtherDevices";
}
}

function get_devbrowser()
{
$server=$_SERVER['HTTP_USER_AGENT'];    
if(stripos($server,"Firefox"))
{
return "Firefox";
}
else if(stripos($server,"Chrome")){
return "Chrome";
}
else if(stripos($server,"OperaMini")){
return "OperaMini";
}
else if(stripos($server,"Safari")){
return "Safari";
}
else if(stripos($server,"UcBrowser")){
return "UcBrowser";
}
else if(stripos($server,"IEMobile")){
return "IEMobile";
}
else {
return "OtherBrowsers";
}

}
function getDeviceType($type){
    if($type=="Desktop"){
        return "pc";
    }else if($type=="OtherDevices"){
        return "others";
    }else{
        return "mobile";
    }   
}

$devicetype=get_devicetype();
$browser=get_devbrowser();
$device=getDeviceType($devicetype);
?>
