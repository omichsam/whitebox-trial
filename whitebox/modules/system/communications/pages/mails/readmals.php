<?php


$inbox = imap_open($mailbox, $username, $password) or die('Cannot connect to email: ' . imap_last_error());
$mailbox = "{localhost:993/imap/ssl/novalidate-cert}INBOX";
?>