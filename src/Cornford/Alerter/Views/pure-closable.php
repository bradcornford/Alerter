<?php

echo '<div class="alert alert-' . $this->alert->type .  '">' .
	'<a href="#close" class="right close-button"></a>' .
    $this->alert->content .
	'</div>';