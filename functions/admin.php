<?php
$primary_color = '#8A73F9';

function get_logo($fill_color) {
    return '<svg class="footerlogo" viewBox="0 0 70 70" xmlns="http://www.w3.org/2000/svg" xmlns:undefined="http://www.inkscape.org/namespaces/inkscape" xml:space="preserve" version="1.1">
        <g transform="matrix(1 0 0 -1 -23 110)">
            <g id="logo_short_out">
                <path '. 'fill="'. $fill_color .'" d="m79.7117,41.2061l7.57,0l-21.216,65.89l-15.702,0l-21.307,-65.89l7.665,0l5.72,17.944l0.007,0.022l2.496,7.829l0.026,0l3.405,10.572l8.718,27.372l2.151,0l10.093,-31.4l-0.007,0l4.594,-14.395l5.787,-17.944z" />
            </g>
            <g id="logo_short_in">
                <path '. 'fill="'. $fill_color .'" d="m51.5506,65.7178l2.433,0c1.471,0 2.663,1.193 2.663,2.664l0,12.94l7.425,0l0,-13.275c0,-1.286 -1.042,-2.329 -2.328,-2.329l-2.293,0c-1.548,0 -2.804,-1.255 -2.804,-2.804l0,-12.8l-7.425,0l0,13.276c0,1.286 1.043,2.328 2.329,2.328" />
            </g>
        </g>
    </svg>';
}
function get_encoded_logo($fill_color) {
    return 'url("data:image/svg+xml,' . rawurlencode(get_logo($fill_color)) . '")';
}

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
add_action('wp_before_admin_bar_render', function() use ($primary_color){ ?>
    <style type="text/css">
        #wpadminbar #wp-admin-bar-site-name > .ab-item:before {
            background-image: <?php echo get_encoded_logo('#FFFFFF'); ?> !important;
            background-repeat: no-repeat;
            background-position: 0 0;
            color:rgba(0, 0, 0, 0);
            margin-top: 5%;
        }
    </style>
<?php });

// add styling to login
add_action( 'login_enqueue_scripts', function() use ($primary_color) { ?>
    <style type="text/css">
        #login {
            padding: 10% 0 0 !important;
        }
        #login h1 a, .login h1 a  {
            background-repeat: no-repeat;
            background-image: <?php echo get_encoded_logo($primary_color); ?>;
        }
        #login input:focus, #login .button:focus {
            border-color: <?php echo $primary_color; ?>;
            box-shadow: 0 0 0 1px <?php echo $primary_color; ?>;
        }
        #login button {
            color: <?php echo $primary_color; ?>;
        }
        #login #wp-submit {
            background-color: <?php echo $primary_color; ?>;
            border-color: <?php echo $primary_color; ?>;
        }
        #login input[type=checkbox]:checked::before {
            filter: brightness(0) invert(51%) sepia(24%) saturate(6403%) hue-rotate(223deg) brightness(100%) contrast(96%);
        }
        #login .message {
            border-left: 4px solid <?php echo $primary_color; ?>;
        }
    </style>
<?php });
add_filter( 'login_headerurl', function() {return home_url();} );