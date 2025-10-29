<!--This page will contain global values for the whole system-->
<?php include "plugins/detect/detect.php"; //Detect devices ?>
<input type="hidden" class="splashinputs" id="user_id">
<input type="hidden" class="splashinputs" id="user_email">
<input type="hidden" class="splashinputs" id="user_name">
<input type="hidden" class="splashinputs" id="user_phone">
<input type="hidden" class="splashinputs" id="user_sessionid">
<input type="hidden" class="splashinputs" id="user_current_page">
<input type="hidden" class="splashinputs" id="user_device" value="<?php echo $device;?>"><!--android/iphone/etc-->
<input type="hidden" class="splashinputs" id="user_device_type" value="<?php echo $devicetype; ?>"><!--mobile/desktop-->
<input type="hidden" class="splashinputs" id="user_browser" value="<?php echo $browser; ?>">
<div style="display:none;" id="returnglobals"></div>