<?php
// change admin page titles
function my_admin_title($admin_title, $title) {
    return $title.' - '.get_bloginfo('name');
}
add_filter('admin_title', 'my_admin_title', 10, 2);
add_filter('login_title', 'my_admin_title', 10, 2);

// run on admin init
function on_admint_init() {
    // register custom color scheme
    wp_admin_css_color( 'autosave-admin-color-scheme', __( 'Autosave Admin Color Scheme' ),
        get_template_directory_uri() . '/assets/css/autosave-admin-color-scheme.css',
        array( '#262626', '#8a73f9', '#86d0e2' , '#e8d892')
    );

    // remove footer content and add thickbox
    add_thickbox();
}
add_action('admin_init', 'on_admint_init');

// enable custom colorscheme and disable option to choose
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

// add custom styles to all admin pages
add_action('admin_enqueue_scripts', function(){ ?>
    <style type="text/css">
        :root {
            --wp-admin-theme-color: <?php echo constant('primary_color'); ?> !important;
        }
        #wpfooter {
            display: none;
        }
        #editor .edit-post-header > div > a{
            color: transparent ;
            background-image: <?php echo get_encoded_logo(constant('primary_color'), false); ?> !important;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: 50%;
        }
        #wpadminbar #wp-admin-bar-site-name > .ab-item:before {
            background-image: <?php echo get_encoded_logo('#FFFFFF', false); ?> !important;
            background-repeat: no-repeat;
            background-position: 0 0;
            color:rgba(0, 0, 0, 0);
            margin-top: 5%;
        }
    </style>
<?php });

// add custom styles to login page
add_action( 'login_enqueue_scripts', function() { ?>
    <style type="text/css">
        #login {
            padding: 10% 0 0 !important;
        }
        #login h1 a, .login h1 a  {
            background-repeat: no-repeat;
            background-image: <?php echo get_encoded_logo(constant('primary_color'), false); ?>;
        }
        #login input:focus, #login .button:focus, #login h1 a:focus {
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
add_filter( 'login_headertitle', function() {return get_option('blogname');} );

// remove comments for non-admin users (can be disbaled if want to enable user comments in the future);
add_action('admin_menu', function() {
    if (!current_user_can('manage_options')) {
        remove_menu_page('edit-comments.php');
        remove_menu_page('tools.php');
    }
});
add_action('wp_before_admin_bar_render', function() { 
    global $wp_admin_bar; 
    if (!current_user_can('manage_options')) $wp_admin_bar->remove_menu('comments');
});

// ensures required plugins are installed and active
function wpb_admin_notice_warn() {
    $msg = "";
    foreach(constant('required_plugins') as $plugin) {
        $plugin_path = $plugin['slug'] . "/" . (key_exists('file', $plugin) ? $plugin['file'] : $plugin['slug']) . '.php';
        $plugin_url = add_query_arg(
            ['tab' => 'plugin-information', 'plugin' => $plugin['slug'], 'TB_iframe' => "true"],
            admin_url( 'plugin-install.php' )
        );
        if (!is_plugin_active($plugin_path)) 
            $msg .= "• <a class='thickbox open-plugin-details-modal' href='$plugin_url'>$plugin[name]</a><br/>";
    }
    if ($msg) $msg = "WARNING: the following plugins are MANDATORY for this site and need to be installed<br/>" . $msg;
    if ($msg)
        echo <<<HTML
        <div class="notice notice-error">
            <p>$msg</p>
        </div>
        HTML;
}
add_action( 'admin_notices', 'wpb_admin_notice_warn' );