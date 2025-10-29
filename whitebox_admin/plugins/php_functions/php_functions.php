<?php
/*
Truncate_String($string, $limit, $break=".", $pad="...")
send_sms($mobile,$msg)
clean($input)
fb_fan_count($facebook_name)
is_validemail($email)
getRealIpAddr();
detecturl($text);  
force_download($file)
create_zip($files, 'myzipfile.zip', true); 
unzip('test.zip','unziped/test');
resize_image($filename, $tmpname, $xmax, $ymax)
current_url();
my_twitter($username);
getTweets($hash_tag); 
Delete_Folder_And_Content($path)
highlighter_text($text, $words);
isvalidURL($url);
ordinal($number); //output is 10th
get_tiny_url($url);
get_timeago($date);
$short_string=Truncate_String($long_string, 100,'');
UploadImage($FileName,$main_directory)
*/
//Send Sms
function UploadImage($FileName,$main_directory){
            @$name =$_FILES[''.$FileName.'']['name'];
            @$size = $_FILES[''.$FileName.'']['size'];
            @$tmp = $_FILES[''.$FileName.'']['tmp_name'];
            @$f_type=$_FILES[''.$FileName.'']['type'];
              $imageDirectory="$main_directory/$name";
                 $flag=move_uploaded_file($tmp,"$imageDirectory");// upload image
                 if($flag){
                     return TRUE;
                 }else{
                     return FALSE;
                 }
             
}
/*This Function uploads and resizes a  picture in the system*/
 function ImageResize($filename,$width, $height, $img_path)
        {
                /* Get original file size */
                list($w, $h) = getimagesize($_FILES[''.$filename.'']['tmp_name']);


                /*$ratio = $w / $h;
                $size = $width;

                $width = $height = min($size, max($w, $h));

                if ($ratio < 1) {
                    $width = $height * $ratio;
                } else {
                    $height = $width / $ratio;
                }*/

                /* Calculate new image size */
                $ratio = max($width/$w, $height/$h);
                $h = ceil($height / $ratio);
                $x = ($w - $width / $ratio) / 2;
                $w = ceil($width / $ratio);
                /* set new file name */
 

                /* Save image */
                if($_FILES[''.$filename.'']['type']=='image/jpeg')
                {
                    /* Get binary data from image */
                    $imgString = file_get_contents($_FILES[''.$filename.'']['tmp_name']);
                    /* create image from string */
                    $image = imagecreatefromstring($imgString);
                    $tmp = imagecreatetruecolor($width, $height);
                    imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
                    imagejpeg($tmp, $img_path, 100);
                }
                else if($_FILES[''.$filename.'']['type']=='image/png')
                {
                    $image = imagecreatefrompng($_FILES[''.$filename.'']['tmp_name']);
                    $tmp = imagecreatetruecolor($width,$height);
                    imagealphablending($tmp, false);
                    imagesavealpha($tmp, true);
                    imagecopyresampled($tmp, $image,0,0,$x,0,$width,$height,$w, $h);
                    imagepng($tmp, $img_path, 0);
                }
                else if($_FILES[''.$filename.'']['type']=='image/gif')
                {
                    $image = imagecreatefromgif($_FILES[''.$filename.'']['tmp_name']);

                    $tmp = imagecreatetruecolor($width,$height);
                    $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
                    imagefill($tmp, 0, 0, $transparent);
                    imagealphablending($tmp, true); 

                    imagecopyresampled($tmp, $image,0,0,0,0,$width,$height,$w, $h);
                    imagegif($tmp, $img_path);
                }
                else
                {
                    return false;
                }

                return true;
                imagedestroy($image);
                imagedestroy($tmp);
        }

/*Function to upload and copress picture size reducing its storage size based on set qualitu eg quality=50 reduces the size by 50% */
function compress_image($source_url, $destination_url, $quality,$imgsize){
   $info = getimagesize($source_url);
      if ($info['mime'] == 'image/jpeg' )
      @$image = imagecreatefromjpeg($source_url);

      elseif ($info['mime'] == 'image/gif')
      @$image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
      @$image = imagecreatefrompng($source_url);

      imagejpeg($image, $destination_url, $quality);
      return $destination_url;

    } 
             
function send_sms($mobile,$msg)
{
    $authKey = "XXXXXXXXXXX";
date_default_timezone_set("Asia/Kolkata");
    $date = strftime("%Y-%m-%d %H:%M:%S");
//Multiple mobiles numbers separated by comma
    $mobileNumber = $mobile;

//Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "IKOONK";

//Your message to send, Add URL encoding here.
    $message = urlencode($msg);

//Define route 
    $route = "template";
//Prepare you post parameters
    $postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
    $url="https://control.msg91.com/sendhttp.php";

// init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);
}
/*usage
$message = "Hello World";
$mobile = "918112998787";
send_sms($mobile,$message);
 */
?>
<?php
//3. PHP FUNCTION TO HELP PREVENT SQL INJECTION
function clean($input)

{

    if (is_array($input))

    {

        foreach ($input as $key => $val)

         {

            $output[$key] = clean($val);

            // $output[$key] = $this->clean($val);

        }

    }

    else

    {

        $output = (string) $input;

        // if magic quotes is on then use strip slashes

        if (get_magic_quotes_gpc()) 

        {

            $output = stripslashes($output);

        }

        // $output = strip_tags($output);

        $output = htmlentities($output, ENT_QUOTES, 'UTF-8');

    }

// return the clean text

    return $output;

}
/*usage
 
$text = "<script>alert(1)</script>";
$text = clean($text);
echo $text;
 
*/
?>
<?php
//DETECT LOCATION OF THE USER
function detect_city($ip) {
        
        $default = 'UNKNOWN';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }

        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
    }
    /*usage
 
$ip = $_SERVER['REMOTE_ADDR'];
$city = detect_city($ip);
echo $city;
    */
?>
<?php
//6. SHOW NUMBER OF PEOPLE WHO HAVE LIKED YOUR FACEBOOK PAGE
function fb_fan_count($facebook_name)
{
    $data = json_decode(file_get_contents("https://graph.facebook.com/".$facebook_name));
    $likes = $data->likes;
    return $likes;
}
/*
usage
 
$page = "koonktechnologies";
$count = fb_fan_count($page);
echo $count;
 
*/

//VALIDATE EMAIL ADDRESS
function is_validemail($email)
{
$check = 0;
if(filter_var($email,FILTER_VALIDATE_EMAIL))
{
$check = 1;
}
return $check;
}

//get user real ip
function getRealIpAddr()  
{  
    if (!emptyempty($_SERVER['HTTP_CLIENT_IP']))  
    {  
        $ip=$_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!emptyempty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    //to check ip is pass from proxy  
    {  
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else  
    {  
        $ip=$_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}
/*USAGE
$ip = getRealIpAddr();
echo $ip;
 
*/

//11. CONVERT URL IN A STRING TO HYPERLINKS
function detecturl($text) 
{  
 $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)',  
 '<a href="\1">\1</a>', $text);  
 $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)',  
 '\1<a href="http://\2">\2</a>', $text);  
 $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})',  
 '<a href="mailto:\1">\1</a>', $text);  
  
return $text;  
}
/*USAGE
 
$text = "This is my first post on http://blog.koonk.com";
$text = detecturl($text);
echo $text;
 
*/

//12. BLOCK MULTIPLE IP FROM ACCESSING YOUR WEBSITE
//This snippet can come in handy if you want to restrict your website from a certain location or from certain users.Mohit

if ( !file_exists('blocked_ips.txt') ) {
 $deny_ips = array(
  /*'127.0.0.1',
  '192.168.1.1',
  '83.76.27.9',
  
  '192.168.1.163'*/
 );
} else {
 $deny_ips = file('blocked_ips.txt');
}
// read user ip adress:
$ip = isset($_SERVER['REMOTE_ADDR']) ? trim($_SERVER['REMOTE_ADDR']) : '';
 
// search current IP in $deny_ips array
if ( (array_search($ip, $deny_ips))!== FALSE ) {
 // address is blocked:
 echo 'Your IP adress ('.$ip.') was blocked!';
 exit;
}



//13. FORCEFUL DOWNLOADING OF FILE
function force_download($file) 
{ 
    $dir      = "../log/exports/"; 
    if ((isset($file))&&(file_exists($dir.$file))) { 
       header("Content-type: application/force-download"); 
       header('Content-Disposition: inline; filename="' . $dir.$file . '"'); 
       header("Content-Transfer-Encoding: Binary"); 
       header("Content-length: ".filesize($dir.$file)); 
       header('Content-Type: application/octet-stream'); 
       header('Content-Disposition: attachment; filename="' . $file . '"'); 
       readfile("$dir$file"); 
    } else { 
       echo "No file selected"; 
    } 

}
/*USAGE 
force_download("image.jpg");
*/
//14. CREATING JSON DATA
/*Using below PHP snippet you can create JSON data. This will come handy when you are creating web services for mobile apps
$json_data = array ('id'=>1,'name'=>"Mohit");
echo json_encode($json_data);
*/

//ZIPPING A FILE
function create_zip($files = array(),$destination = '',$overwrite = false) {  
    //if the zip file already exists and overwrite is false, return false  
    if(file_exists($destination) && !$overwrite) { return false; }  
    //vars  
    $valid_files = array();  
    //if files were passed in...  
    if(is_array($files)) {  
        //cycle through each file  
        foreach($files as $file) {  
            //make sure the file exists  
            if(file_exists($file)) {  
                $valid_files[] = $file;  
            }  
        }  
    }  
    //if we have good files...  
    if(count($valid_files)) {  
        //create the archive  
        $zip = new ZipArchive();  
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {  
            return false;  
        }  
        //add the files  
        foreach($valid_files as $file) {  
            $zip->addFile($file,$file);  
        }  
        //debug  
        //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;  
          
        //close the zip -- done!  
        $zip->close();  
          
        //check to make sure the file exists  
        return file_exists($destination);  
    }  
    else  
    {  
        return false;  
    }  
}
/*USAGE
 
$files=array('file1.jpg', 'file2.jpg', 'file3.gif');  
create_zip($files, 'myzipfile.zip', true); 
*/

//16. UNZIPPING A FILE
function unzip($location,$newLocation)
{
        if(exec("unzip $location",$arr)){
            mkdir($newLocation);
            for($i = 1;$i< count($arr);$i++){
                $file = trim(preg_replace("~inflating: ~","",$arr[$i]));
                copy($location.'/'.$file,$newLocation.'/'.$file);
                unlink($location.'/'.$file);
            }
            return TRUE;
        }else{
            return FALSE;
        }
}
/*USAGE
<?php
unzip('test.zip','unziped/test'); //File would be unzipped in unziped/test folder
?>
*/
//17. PHP SNIPPET TO RESIZE IMAGE

function resize_image($filename, $tmpname, $xmax, $ymax)  
{  
    $ext = explode(".", $filename);  
    $ext = $ext[count($ext)-1];  
  
    if($ext == "jpg" || $ext == "jpeg")  
        $im = imagecreatefromjpeg($tmpname);  
    elseif($ext == "png")  
        $im = imagecreatefrompng($tmpname);  
    elseif($ext == "gif")  
        $im = imagecreatefromgif($tmpname);  
      
    $x = imagesx($im);  
    $y = imagesy($im);  
      
    if($x <= $xmax && $y <= $ymax)  
        return $im;  
  
    if($x >= $y) {  
        $newx = $xmax;  
        $newy = $newx * $y / $x;  
    }  
    else {  
        $newy = $ymax;  
        $newx = $x / $y * $newy;  
    }  
      
    $im2 = imagecreatetruecolor($newx, $newy);  
    imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);  
    return $im2;   
}
//22. DETECT USER LANGUAGE
function get_client_language($availableLanguages, $default='en'){
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $langs=explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

        foreach ($langs as $value){
            $choice=substr($value,0,2);
            if(in_array($choice, $availableLanguages)){
                return $choice;
            }
        }
    } 
    return $default;
}
//27. GET CURRENT PAGE URL
function current_url()
{
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$validURL = str_replace("&", "&amp;", $url);
return $validURL;
}
//28. GET LATEST TWEET FROM ANY TWITTER ACCOUNT
function my_twitter($username) 
{
    $no_of_tweets = 1;
    $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=" . $no_of_tweets;
    $xml = simplexml_load_file($feed);
    foreach($xml->children() as $child) {
        foreach ($child as $value) {
            if($value->getName() == "link") $link = $value['href'];
            if($value->getName() == "content") {
                $content = $value . "";
        echo '<p class="twit">'.$content.' <a class="twt" href="'.$link.'" title="">&nbsp; </a></p>';
            }   
        }
    }   
}
/*USAGE
<?php
$handle = "koonktech";
my_twitter($handle);
?>
 */
//31. PHP SNIPPET TO DELETE A FOLDER WITH CONTENT
function Delete_Folder_And_Content($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete_Folder_And_Content(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }
    return false;
}
/*USAGE
<?php
$path = "images/";
Delete($path); // This will delete images folder along with its contents.
?>
*/

//SEEARCH AND HIGHLIGHT KEYWORD IN A STRING
function highlighter_text($text, $words)
{
    $split_words = explode( " " , $words );
    foreach($split_words as $word)
    {
        $color = "#4285F4";
        $text = preg_replace('|('.$word.')|Ui',
            "<span style='color:'.$color.';'><b>$1</b></span>" , $text );
    }
    return $text;
}
/*
<?php
$string = "I like chocolates and I like apples";
$words = "apple";
echo highlighter_text($string ,$words);
*/
//35. CHECK IF A URL IS VALID
function isvalidURL($url)
{
$check = 0;
if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
  $check = 1;
}
return $check;
}
//GET ALL TWEETS OF A HASHTAG 
function getTweets($hash_tag) {
    $url = 'http://search.twitter.com/search.atom?q='.urlencode($hash_tag) ;
    echo "<p>Connecting to <strong>$url</strong> ...</p>";
    $ch = curl_init($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $xml = curl_exec ($ch);
    curl_close ($ch);

    //If you want to see the response from Twitter, uncomment this next part out:
    //echo "<p>Response:</p>";
    //echo "<pre>".htmlspecialchars($xml)."</pre>";

    $affected = 0;
    $twelement = new SimpleXMLElement($xml);
    foreach ($twelement->entry as $entry) {
        $text = trim($entry->title);
        $author = trim($entry->author->name);
        $time = strtotime($entry->published);
        $id = $entry->id;
        echo "<p>Tweet from ".$author.": <strong>".$text."</strong>  <em>Posted ".date('n/j/y g:i a',$time)."</em></p>";
    }
    return true ;
}
//39. ADD TH,ST,ND OR RD TO THE END OF A NUMBER eg Friday the 13th

function ordinal($cdnl){ 
    $test_c = abs($cdnl) % 10; 
    $ext = ((abs($cdnl) %100 < 21 && abs($cdnl) %100 > 4) ? 'th' 
            : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1) 
            ? 'th' : 'st' : 'nd' : 'rd' : 'th')); 
    return $cdnl.$ext; 
}
/*
$number = 10;
echo ordinal($number); //output is 10th
*/
//GET REMOTE FILE SIZE
function remote_filesize($url, $user = "", $pw = "")
{
    ob_start();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);

    if(!empty($user) && !empty($pw))
    {
        $headers = array('Authorization: Basic ' .  base64_encode("$user:$pw"));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $ok = curl_exec($ch);
    curl_close($ch);
    $head = ob_get_contents();
    ob_end_clean();

    $regex = '/Content-Length:\s([0-9].+?)\s/';
    $count = preg_match($regex, $head, $matches);

    return isset($matches[1]) ? $matches[1] : "unknown";
}
/*USAGE
<?php
$file = "http://koonk.com/images/logo.png";
$size = remote_filesize($url);
echo $size;
?>
*/
//44. URL SHORTENER USING TINYURL
function get_tiny_url($url)  
{  
    $ch =curl_init();  
    $timeout = 5;  
    curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
    $data = curl_exec($ch);  
    curl_close($ch);  
    return $data;  
}
/*USAGE
<?php
$url = "http://blog.koonk.com/2015/07/Hello-World";
$tinyurl = get_tiny_url($url);
echo $tinyurl;
?>
*/
//TIME AGO
function get_timeago($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
/*
<?php
$date = "2015-07-05 03:45";
$result = nicetime($date); // 2 days ago
?>
*/
//TRUNCATE STRING
function Truncate_String($string, $limit, $break=".", $pad="...") {   
    // return with no change if string is shorter than $limit    
    if(strlen($string) <= $limit)   
        return $string;   
      
    // is $break present between $limit and the end of the string?    
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {  
        if($breakpoint < strlen($string) - 1) {   
            $string = substr($string, 0, $breakpoint) . $pad;   
        }   
    }  
    return $string;   
}  
/***** Example   
$short_string=Truncate_String($long_string, 100, ' ');
****/
?>