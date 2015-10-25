<?php
class Post extends  AppModel{
	var $name = 'Post';
	// In the validate array, 
	// each element's key corresponds to the name of 
	// the input element to be validated (for example, title),
	// and its value defines the rules to apply against the input 
	// before the post data is saved to the 'posts' table -- when the post form is submitted
	/*
	var $validate = array( 'title'=>array(
								'alphaNumeric' => array(
										'rule' => 'alphaNumeric',
										'required' => true,
										'message' => 'Enter a title for this post'
								)
							),
						'content' => array(
								'alphaNumeric'=>array(
									'rule'=>'alphaNumeric',
									'required'=>true,
									'message'=>'Enter some content for your post'
								)
							)
						);
						*/
}
?>