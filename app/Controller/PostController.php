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
		// If the submitted data ($this->data) is not empty, 
		// using the 'save' method of the Post model object,
		// the application will attempt to create a new post record.
		// The 'save' method automatically uses the validation rules defined
		// in the Post Model to check the integrity of the sunmitted text.
		// If the post does not pass the validation rules,
		// the error message is set, using the 'setFlash' method of the 'Session' object.
		// Otherwise, the post is saved to the database table,
		// and the success message is set for display in the view.
		if (!empty($this->data)){
			$this->Post->create();
			if ($this->Post->save($this->data)){
				$this->Session->setFlash(_('The Post has been saved',true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(_('The Post could not be saved. Please try again.', true));
			}
		}
	}
}
?>