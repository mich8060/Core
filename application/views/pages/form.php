<?php

// Declare API Key
$_SERVER['API_KEY'] = $this->config->item('api_key');

?>

<form action="<? echo base_url(); ?>services/articles" method="delete">
	<input type="submit" value="Send" />
</form>