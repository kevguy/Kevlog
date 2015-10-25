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
}
?>