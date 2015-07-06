<?php


function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	
/*
add_action('gform_after_submission_1', 'send_to_acton');
function send_to_acton($entry) {
    //assemble POST URL
	$postUrl = "http://www.actonsoftware.com/acton/eform/3122/0027/d-ext-0002" . "?firstname=" . $entry['1'] . "&lastname=" . $entry['2'] . "&email=" . $entry['3'];
	echo "<script>\n";
	echo "setTimeout(function() {";
	//generate iframe via some echoed out javascript
	echo "var aoUrl =\"$postUrl\";\n";
	echo "var aoIfrm = document.createElement('iframe');\n";
	echo "aoIfrm.setAttribute('id', 'ifrm');\n";
	echo "aoIfrm.style.display='none';\n";
	echo "aoIfrm.style.width='0px';\n";
	echo "aoIfrm.style.height='0px';\n";
	echo "aoIfrm.src = aoUrl;\n";
	echo "document.body.appendChild(aoIfrm);\n";
	echo "},300);\n";
	echo "</script>\n";
};
*/

add_action('gform_after_submission', 'send_to_acton', 10, 2);
function send_to_acton($entry,$form) {

	// Act-On can't accept field names with periods in them so they are reassigned
	$firstname = $entry['4.3']; // the first+lastname field in gravity forms uses X.3 for first name, X.6 for last
	$lastname = $entry['4.6'];
	$email = $entry['3'];

	$post_data['First Name'] = $firstname; // Your Act-On form input's data field name is 'First Name'
	$post_data['Last Name'] = $lastname;
	$post_data['E-mail Address'] = $email;

	foreach ( $post_data as $key => $value) {
	    $post_items[] = $key . '=' . $value;
	}
	 
	//create the final string to be posted 
	$post_string = implode ('&', $post_items);

	//create cURL connection
	$ch = curl_init();
	 
	//set options
	curl_setopt($ch, CURLOPT_URL, "http://ao.teravoxel.com/acton/eform/3122/0035/d-ext-0001");
	curl_setopt($ch, CURLOPT_POST, 1); // set type to POST
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0');
	curl_setopt($ch, CURLOPT_HEADER  ,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string); // get string generated above
	//
	$cookie_string = '';
	foreach ($_COOKIE as $name=>$value) {
	    if ($cookie_string) {
	        $cookie_string  .= ';';
	    }
	    $cookie_string .= $name . '=' . addslashes($value);
	}
	curl_setopt ($ch, CURLOPT_COOKIE, $cookie_string );
	
	$result = curl_exec($ch);
	return $result;
	
	//close the connection
	curl_close($ch);
};

?>