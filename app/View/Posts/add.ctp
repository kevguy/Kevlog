<?php
	// The $this->element accepts the name of a file stored 
	// in the view/elements folder (add_or_edit in this case),
	// without the file extension (without .ctp).
	// It simply transfers the content of add_or_edit.ctp into the add.ctp.
	echo $this->element('add_or_edit');
?>