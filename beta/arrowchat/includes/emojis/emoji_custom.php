<?php

	// ########################## INCLUDE BACK-END ###########################
	require_once (dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'data_admin_options.php');
	
	$path = $base_url . "includes/emojis/img/32/";

?>
<?php
	foreach ($smileys as $key => $value)
	{
?>
<div class="arrowchat_emoji arrowchat_emoji_custom"><img src="<?php echo $path . $value; ?>" alt="" data-id="<?php $pattern = str_replace("\;", ";", $key); $pattern = htmlspecialchars($pattern); echo $pattern; ?>" /></div>
<?php
	}
?>