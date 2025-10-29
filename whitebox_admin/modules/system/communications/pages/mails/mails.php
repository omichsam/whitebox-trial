<style type="text/css">
  
.list-form-container {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.column {
    float: left;
    padding: 10px 0px;
}

table {
    width: 100%;    
    background: #FFF;
}

td, th {
    border-bottom: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    width: auto;
}

.content-div {
    position:relative;
}

.content-div span.column {
    width: 90%;
}

.date {
    position: absolute;
    right: 8px;
    padding: 10px 0px;
}
</style>

<h1>ALL EMAILS</h1>
    <?php
    set_time_limit(700);
    if (! function_exists('imap_open')) {
        echo "IMAP is not configured.";
        exit();
    } else {
        ?>
    <div id="listData" class="list-form-container">
            <?php
        
        /* Connecting Gmail server with IMAP */
      //  $connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', 'allanmboti@gmail.com', 'A073955@amk77') or die('Cannot connect to Gmail: ' . imap_last_error());

        /* connect to gmail */

    //if (!imap_open('{outlook.office365.com:993/imap/ssl/novalidate-cert}', 'myusername', 'mypassword')) 
/*$inbox =imap_open("{imap_open('{outlook.office365.com:993/imap/ssl/novalidate-cert}", "amboti@kippra.or.ke", "A073955@am");
$hostname = '{outlook.office365.com:995/imap/ssl}INBOX';
$username = 'amboti@kippra.or.ke';
$password = 'A073955@amk';
*/
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'allanmboti@gmail.com';
$password = 'A073955@amk77';
/* try to connect */
//$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
     

$sinceDate = "31 December 2015";
$beforeDate = "06 January 2016"; 
$emails = imap_search($inbox,'SINCE "'.$sinceDate.'" BEFORE"'.$beforeDate.'"' );

$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
  
  /* begin output var */
  $output = '';
  
  /* put the newest emails on top */
  rsort($emails);
  
  /* for every email... */
  foreach($emails as $email_number) {
    
    /* get information specific to this email */
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $message = imap_fetchbody($inbox,$email_number,2);
    
    /* output the email header information */
    $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
    $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
    $output.= '<span class="from">'.$overview[0]->from.'</span>';
    $output.= '<span class="date">on '.$overview[0]->date.'</span>';
    $output.= '</div>';
    
    /* output the email body */
    $output.= '<div class="body">'.$message.'</div>';
  }
  
  echo $output;
} 

/* close the connection */
imap_close($inbox);
}
        /* Search Emails having the specified keyword in the email subject */
       /* $emailData = imap_search($connection, 'ALL');
        $counter=0;
        if (! empty($emailData)) {
            ?>
            <table>
            <?php
            foreach ($emailData as $emailIdent) {
                  $counter= $counter+1;
                $overview = imap_fetch_overview($connection, $emailIdent, 0);
                $message = imap_fetchbody($connection, $emailIdent, '1.1');
                $messageExcerpt = substr($message, 0, 150);
                $partialMessage = trim(quoted_printable_decode($messageExcerpt)); 
                $date = date("d F, Y", strtotime($overview[0]->date));
                ?>
                <tr>
                        <td style="width:15%;"><span class="column"><?php echo $counter." ".$overview[0]->from; ?></span></td>
                        <td class="content-div"><span class="column"><?php echo $overview[0]->subject; ?> - <?php echo $partialMessage; ?></span><span class="date"><?php echo $date; ?></span></td>
                </tr>
                <?php
            } // End foreach
            ?>
            </table>
            <?php
        } // end if
        
        imap_close($connection);
    }
    */
    ?>
    </div>