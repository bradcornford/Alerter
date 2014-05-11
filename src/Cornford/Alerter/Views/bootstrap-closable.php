<?php

echo '<div class="alert alert-' . $this->alert->type . '">' .
	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .
	$this->alert->content .
	'</div>';