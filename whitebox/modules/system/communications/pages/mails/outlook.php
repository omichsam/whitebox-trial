 <?PHP

global $UnreadMessagesInFolder;
class COutLook{
//function for retreiving messages from the selected folder (Inbox or Outbox)
function getMessages($folder){


//Setup the folder table,.there is 4 elements:

//message number,message subject ,message type and date received


echo"<body text=darkblue>
<br><font color=red face=verdana size=3><b>$folder</b></font>
<table width=100%>
<TR bgcolor=#EEEFFF><td><font face=verdana size=2>N:</td><td>
<font face=verdana size=2> Subject</td><TD>
<font face=verdana size=2 >Type</TD><TD><font face=verdana size=2> Date</TD></TR>";

//creating the COM instance for Outlook.application and MAPI session(access the outlook folders object)
$oOutlook = new COM("Outlook.Application");
$session= new COM("MAPI.Session");


//Log into the session like default user
$session->Logon();

//selecting working folder Inbox ot Outbox/
$inb=$session->$folder;

//get the total messages in Folder
$messages=$inb->Messages->Count();

//get the elements of the message object

for($i=1;$i<($messages+1);$i++){


$item=$inb->Messages->item($i);


//date string
$timeres=$item->TimeReceived();
$date_vb=getdate($timeres);


//date elements
$year=$date_vb;
$month=$date_vb;
$day=$date_vb;


//entering the folder elements
echo "<tr bgcolor=#F0F0F0><td><font face=verdana size=2 color=darkblue>$i</td><td><font face=verdana size=2 color=darkblue>
<a href=view.php?id=$i&folder=$folder target=bottomFrame><font face=verdana size=2 color=#FF6666>$item->Subject</font></td><td><font face=verdana size=2 color=darkblue>$item->Type</td><td><font face=verdana size=1 color=darkblue>$year/$month/$day</td></font><tr>";
}
echo"</table>";
}

//view mesage from selected folder (Inbox or Outbox)


function ViewMessageFromFolder($id,$folder){
//create new instance of the COM Objects
$oOutlook = new COM("Outlook.Application");
$session= new COM("MAPI.Session");


//Log into the current working session
$session->Logon();

//get default folder
$inb=$session->$folder;


if($id==""){
echo "<font face=verdana size=2 color=darkblue>Message Viewer</font><br><font face=verdana size=2 color=red><center>No Messages Selected</center></font>";
}
else{
$idint=(int)$id;

//get the messages in the selested folder
$items=$inb->Messages->item($idint);


//make message status read= true
$items->Unread="false";


//Update the message status into Outlook's Inbox
$items->Update(true);


//display the message

echo"<font face=verdana size=2 color=darkblue>Message Viewer</font>";
echo"<table width=100%><tr><td><font face=verdana size=2 color=darkblue>$i</td><td><font face=verdana size=2 color=darkblue>
<b>$items->Subject</b></td><td><font face=verdana size=2 color=darkblue>$items->Type</td><td></td></font><tr>
<tr><td colspan=4><pre><font face=verdana size=2 color=darkblue>$items->Text</pre></td></tr>";
}
}

function getUnreadinInbox(){


//get unread messages from the Inbox Folder
$oOutlook = new COM("Outlook.Application");
$oNs = $oOutlook->GetNamespace("MAPI");
$oFldr = $oNs->GetDefaultFolder(olFolderInbox);
$UnreadMessagesInFolder = $oFldr->UnReadItemCount;
return $UnreadMessagesInFolder;
}

function getUnreadinOutbox(){
//get unread messages from the Outbox Folder
$oOutlook = new COM("Outlook.Application");
$oNs = $oOutlook->GetNamespace("MAPI");
$oFldr = $oNs->GetDefaultFolder(olFolderOutbox);
$UnreadMessagesInFolder = $oFldr->UnReadItemCount;
return $UnreadMessagesInFolder;

}

function staticFolders(){
// List of the avaailable folders (static !!!)
$unread=$this->getUnreadinInbox();
$out_unr=$this->getUnreadinOutbox();
echo"<font color=blue face = verdana size=1>Available folders in this version are:
<a href=comunread.php?folder=Inbox>Inbox(<font color=red>$unread</font>)</a>
and <a href=comunread.php?folder=Outbox>Outbox(<font color=red>$out_unr</font>)</a></font>";
}


//end of classs
}
?>