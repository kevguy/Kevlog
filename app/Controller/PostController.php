<?php
class PostController extends AppController{
	var $name = 'Posts';
	
	// First, we add the index method, which displays the list of posts.
	// By default, this method is called explicitly during a URL request
	// along with showing all the published posts, the index page contains 
	// links that will enable users to perform operations such as 
	// edit, publish, unpublished and delete a post record.
	function index() {

		// uses the Post model object with its default 'find' method to 
		// pull all the posts from the 'posts' database table
		// and then store the results in  an array called $posts
		$posts = $this->Post->find('all');


		// The second prepares and sets the $posts records so that 
		// the views/posts/index.ctp file can display the list of all the posts
		// from the $posts variable
		$this->set(compact('posts'));
	}

	// This function handles adding post data
	function add() {
		// Heading and slogan for the add view page
		// This is necesaary because we are going to use 
		// a single element view to displaythe forms to add and edit posts
		// elements in Cake enables you to reuse views
		$actionHeading = 'Add a Post!';
		$actionSLogan = 'Please fill in all fields. Feel free to add your post and express your opinion.';

		$this->set(compact('actionHeading','actionSlogan'));

		// Next, we check if the add post form has been submitted.
		// If the form has not been submitted, the add view is displayed.
		// If the submitted data ($this->request->data) is not empty, 
		// using the 'save' method of the Post model object,
		// the application will attempt to create a new post record.
		// The 'save' method automatically uses the validation rules defined
		// in the Post Model to check the integrity of the sunmitted text.
		// If the post does not pass the validation rules,
		// the error message is set, using the 'setFlash' method of the 'Session' object.
		// Otherwise, the post is saved to the database table,
		// and the success message is set for display in the view.
		if (!empty($this->request->data)){
			$this->Post->create();
			if ($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('The Post has been saved',true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please tryyyyy again.', true));
			}
		}
	}

	// This function handles updating post data
	function edit($id=null) {
		$actionHeading = 'Edit a Post!';
		$actionSlogan = 'Please fill in all fields. Now you can amend your post.';

		$this->set(compact('actionHeading','actionSlogan'));

		// Check whether $id and $this->request->data are empty,
		// or an error message will be stored in our 'Session' object,
		// and the request is redirected to the blog home page.
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(_('Invalid Post',true));
			$this->redirect(array('action'=>'index'));
		}

		// If the submitted form data is not empty,
		// Cake will try to commit the edited post information to the posts database table
		// and then flash appropriate messages upon success or failure. 
		//if (!empty($this->request->data)) {
		//	if ($this->Post->save($this->request->data)) {
		//		$this->Session->setFlash(_('The Post has been saved', true));
		//		$this->redirect(array('action'=>'index'));
		//	} else {
		//		$this->Session->setFlash(__('The Post could not be saved. Please try again.', true));
		//	}
		//}

		if (!empty($this->request->data)) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The Post has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please tryyyy again.', true));
			}
		}

		// Finally, if only the submitted data is empty, a post's information is pulled
		// with the 'Post' model 'read' method using the supplied $id as the criterion.
		if (empty($this->request->data)){
			$this->request->data = $this->Post->read(null,$id);
		}
	}

	function disable($id=null){
		// A post record is retrieved from the 'posts' database table
		// and stored inthe $post variable.
		$post = $this->Post->read(null,$id);
		if (!id && empty($post)) {
			$this->Session->setFlash(__('You must provide a valid ID number to disable a post', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($post)) {
			// If there is a valid $id and the $post is not empty, 
			// we set the post published elemet to 0 and 
			// update the 'posts' database table. 
			// Finally, the 'Session' object sets the appropriate message,
			// and then we redirect to the blog home page.
			$post['Post']['published'] = 0;
			if ($this->Post->save($post)){
				$this->Session->setFlash(__('Post ID '.$id.' has been disabled.',true));
			} else {
				$this->Session->setFlash(__('Post ID'.$id.' was not saved.',true));
			}
			$this->redirect(array('action'=>'index'));
		} else {
			// If the $id value is null or the $post variable is empty,
			// we use the 'Session' object to set the appropriate message
			// and redirect to the blog home page
			$this->Session->setFlash(__('No Post by that ID was found.', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function enable($id=null){
		$post=$this->Post->read(null,$id);
		if (!id && empty($post)) {
			$this->Session->setFlash(__('You must provide a valid ID number to disable a post', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($post)) {
			$post['Post']['published'] = 1;
			if ($this->Post->save($post)){
				$this->Session->setFlash(__('Post ID '.$id.' has been enabled.',true));
			} else {
				$this->Session->setFlash(__('Post ID'.$id.' was not saved.',true));
			}
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Post by that ID was found.', true));
			$this->redirect(array('action'=>'index'));
		}

	}

	function delete($id=null){
		if (!$id){
			$this->Session->setFlash(__('Invalid id for Post',true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)){
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>