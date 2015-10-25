<div id="center_content">
	<h2>Post Listings</h2>
	<p>Here is a list of the existing posts.</p>
	<div></div>
	<?php
		if (isset($posts) && is_array($posts)){
	?>
		<table>
			<tr>
				<td>
					<b>ID></b>
				</td>
				<td>
					<b>content</b>
				</td>
				<td>
					<b>Last Modified</b>
				</td>
				<td>
					<b>published</b>
				</td>
				<td colspan="2">
					<b>&nbsp;&nbsp;Action</b>
				</td>
			</tr>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td><?php echo $post['Post']['id']; ?></td>
					<td><?php echo $post['Post']['title']; ?></td>
					<td><?php echo $post['Post']['content']; ?></td>
					<td><?php echo $post['Post']['modified']; ?></td>
					<td>
						<?php if($post[ 'Post' ][ 'published' ] == 1) { 
							// This link will show: kevlog/post/disable/'id'
							echo $this->Html->link('Publish', array('action'=>'disable', $post[ 'Post' ][ 'id' ]));
						}else{
							echo $this->Html->link('Unpublish', array('action'=>'enable', $post[ 'Post' ][ 'id' ]));		
						}
						?>
					</td>
					<td>
						<?php 
							// This link will show: kevlog/post/edit/'id'
							echo $this->Html->link('Edit', array('action'=>'edit', $post[ 'Post' ][ 'id' ]), null);
						?>
					</td>
					<td>
						<?php
							// This link will show: kevlog/post/deletes/'id' 
							// And a dialog will pop up and ask "'"Are you sure ... Post 'id'?"
							// with 2 options: OK and Cancel
							echo $this->Html->link(__('Delete', true), array('action'=>'delete', $post[ 'Post' ][ 'id' ]), null, sprintf(__('Are you sure you want to delete Post # %s?', true), $post[ 'Post' ][ 'id' ]));
						?>
					</td>
				</tr>
			<?php endforeach;?>
			<?php
				if (sizeof($posts)==0){
			?>
				<tr style="background-color: #cccccc;">
					<td colspan="6">
						<span style="font-size:17px;">
							No post found.
					</td>
				</tr>
			<?php
				}
			?>
		</table>
		<br/>
	<?php
		}
	?>
</div>