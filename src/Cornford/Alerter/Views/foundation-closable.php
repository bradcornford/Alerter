<?php

echo '<div data-alert class="alert-box ' . $this->alert->type . ' radius">' .
	$this->alert->content .
	'<a href="#" class="close">&times;</a>' .
	'</div>';