<fieldset>
	<legend>
		<?php
			__('Add a Post!');
		?>
	</legend>
	Please fill in all fields.
	<?php
		echo $this->Form->create('Post');
		echo $this->Form->error('Post.title');
		echo $this->Form->input('Post.title',
							array('id'=>'postitle',
									'label'=>'Title:',
									'size'=> 50,
									'maxlength'=>255,
									'error'=>false));
		echo $this->Form->error('Post.content');
		echo $this->Form->input('Post.content',
							array('id'=>'postcontent',
									'type'=>'textarea',
									'label'=>'Content',
									'rows'=>10,
									'error'=>false));
		echo $this->Form->end(array('label'=>'Submit Post'));
	?>
</fieldset>