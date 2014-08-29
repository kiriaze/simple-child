<?php

// Author Bio
if ( of_get_option('blog_multi_checkbox')['blog_authors_checkbox'] ) :

	$authorUsername = get_the_author_meta('user_nicename');
	$authorDesc = get_the_author_meta('description');
	$authorFirstName = get_the_author_meta('first_name');
	$authorLastName = get_the_author_meta('last_name');
	$authorUrl = get_the_author_meta('user_url');
	$authorEmail = get_the_author_meta('user_email');

	echo '<h5>';
	echo $authorFirstName . ' ' .$authorLastName;
	echo '<h5>';
	echo '<p>';
	echo $authorDesc;
	echo '<br />';
	echo $authorUrl;
	echo '<br />';
	echo $authorEmail;
	echo '</p>';

endif;