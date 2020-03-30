<?php
/**
** activation theme
**/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>
<?php
// ma première action
function dire_bonjour(){
	echo '<p class="hello"> Hello World !!</p>';
}
add_action( 'cf', 'dire_bonjour');
?>
<?php
// Add custom text after the header (avec custom do_action in template)
function add_custom_text() {
  if ( !is_front_page() )
    return;
  // Echo the html
  echo "<div>Message</div>";
}
// add_action( 'catchbase_after_header' , 'add_custom_text' );
add_action( 'catchbase_footer' , 'add_custom_text' );
?>
<?php 
    function __construct() {
		$this->namespace = 'wp/v2';
		$this->rest_base = 'users';

		$this->meta = new WP_REST_User_Meta_Fields();
	}
	?>

<?php
  function before_comments_content() {
		// Modify the comments request to make sure it's unique.
		// Otherwise WP generates SQL error and doesn't allow multiple comments sections on single page
		add_action( 'pre_get_comments', array( $this, 'et_pb_modify_comments_request' ), 1 );

		// include custom comments_template to display the comment section with Divi style
		add_filter( 'comments_template', array( $this, 'et_pb_comments_template' ) );

		// Modify submit button to be advanced button style ready
		add_filter( 'comment_form_submit_button', array( $this, 'et_pb_comments_submit_button' ) );
	}
?>