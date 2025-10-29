<h1>Gmail Email Inbox using PHP with IMAP</h1>
    <?php
    if (! function_exists('imap_open')) {
        echo "IMAP is not configured.";
        exit();
    } else {
        ?>
    <div id="listData" class="list-form-container">
            <?php
        
        /* Connecting Gmail server with IMAP */
        $connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', 'allanmboti@gmail.com', 'A073955@amk77') or die('Cannot connect to Gmail: ' . imap_last_error());

        /* Search Emails having the specified keyword in the email subject */
        $emailData = imap_search($connection, 'ALL');
        
        if (! empty($emailData)) {
            ?>
            <table>
            <?php
            foreach ($emailData as $emailIdent) {
                
                $overview = imap_fetch_overview($connection, $emailIdent, 0);
                $message = imap_fetchbody($connection, $emailIdent, '1.1');
                $messageExcerpt = substr($message, 0, 150);
                $partialMessage = trim(quoted_printable_decode($messageExcerpt)); 
                $date = date("d F, Y", strtotime($overview[0]->date));
                ?>
                <tr>
                        <td style="width:15%;"><span class="column"><?php echo $overview[0]->from; ?></span></td>
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
    ?>
    </div>