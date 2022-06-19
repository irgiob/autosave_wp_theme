<?php
define("primary_color", "#8A73F9");

// change admin page titles
function my_admin_title($admin_title, $title) {
    return $title.' - '.get_bloginfo('name');
}
add_filter('admin_title', 'my_admin_title', 10, 2);
add_filter('login_title', 'my_admin_title', 10, 2);

// change admin pages color scheme to autosave theme
function autosave_admin_color_scheme_admin_color_scheme() {
    //Get the theme directory
    $theme_dir = get_template_directory_uri() . "/assets/css/";
  
    //Autosave Color Scheme
    wp_admin_css_color( 'autosave-admin-color-scheme', __( 'Autosave Admin Color Scheme' ),
      $theme_dir . 'autosave-admin-color-scheme.css',
      array( '#262626', '#8a73f9', '#86d0e2' , '#e8d892')
    );
}
add_action('admin_init', 'autosave_admin_color_scheme_admin_color_scheme');
function update_user_option_admin_color( $color_scheme ) {
    $color_scheme = 'autosave-admin-color-scheme';
    return $color_scheme;
}
add_filter( 'get_user_option_admin_color', 'update_user_option_admin_color', 5 );
function admin_color_scheme() {
    global $_wp_admin_css_colors;
    $_wp_admin_css_colors = [];
}
add_action('admin_head', 'admin_color_scheme');

// remove wordpress logo from admin bar
function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0 );

// add autosave logo to admin bar
add_action('wp_before_admin_bar_render', function(){ ?>
    <style type="text/css">
        #wpadminbar #wp-admin-bar-site-name > .ab-item:before {
            background-image: <?php echo get_encoded_logo('#FFFFFF', false); ?> !important;
            background-repeat: no-repeat;
            background-position: 0 0;
            color:rgba(0, 0, 0, 0);
            margin-top: 5%;
        }
    </style>
<?php });

// add styling to login
add_action( 'login_enqueue_scripts', function() { ?>
    <style type="text/css">
        #login {
            padding: 10% 0 0 !important;
        }
        #login h1 a, .login h1 a  {
            background-repeat: no-repeat;
            background-image: <?php echo get_encoded_logo(constant('primary_color'), false); ?>;
        }
        #login input:focus, #login .button:focus {
            border-color: <?php echo constant('primary_color'); ?>;
            box-shadow: 0 0 0 1px <?php echo constant('primary_color'); ?>;
        }
        #login button {
            color: <?php echo constant('primary_color'); ?>;
        }
        #login #wp-submit {
            background-color: <?php echo constant('primary_color'); ?>;
            border-color: <?php echo constant('primary_color'); ?>;
        }
        #login input[type=checkbox]:checked::before {
            filter: brightness(0) invert(51%) sepia(24%) saturate(6403%) hue-rotate(223deg) brightness(100%) contrast(96%);
        }
        #login .message {
            border-left: 4px solid <?php echo constant('primary_color'); ?>;
        }
    </style>
<?php });
add_filter( 'login_headerurl', function() {return home_url();} );