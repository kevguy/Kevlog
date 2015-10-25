<fieldset>
	<legend>
		<?php
			__('Add a Post!');
		?>
	</legend>
	Please fill in all fields.
	<?php
		// Define the start tag for our form
		// Its 'Post' string argument represents the action
		// that will be invoked, such as
		// the URL to which the form data will be submitted 
		// If crate() is called with no parameters supplied,
		// it assumes  you are building a form that submits 
		// to the current controller, via the current URL.
		echo $this->Form->create('Post');
		// Deal with the error handling of the form
		// Its argument, Post.title, is a atring that
		// represents the name of the input element,
		// where 'Post' is the model name, followed by
		// a dot (.), and 'title' holds the value of the
		// post's title
		echo $this->Form->error('Post.title');
		// Generate the text input element called 'title',
		// whose first argument is in the same argument format
		// as the error input element.
		// The second argument of the text input element is an
		// associative array of HTML text input element attributes.
		echo $this->Form->input('Post.title',
							array('id'=>'postitle',
									'label'=>'Title:',
									'size'=> '50',
									'maxlength'=>'255',
									'error'=>false));
		// Generate the 'textarea' input element called 'content'
		// using an argument format similar to the 'title' input element.
		echo $this->Form->error('Post.content');
		echo $this->Form->input('Post.content',
							array('id'=>'postcontent',
									'type'=>'textarea',
									'label'=>'Content',
									'rows'=>'10',
									'error'=>false));
		// Add the form closing tag using the form helper method end().
		// It also accepts an associative array of HTML submit input element attributes
		echo $this->Form->end(array('label'=>'Submit Post'));
	?>
</fieldset>