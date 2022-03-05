<?php

$gravityForms = GFAPI::get_forms();

$globalModalSelectForms = array();

foreach ($gravityForms as $gravityForm) {

    $globalModalSelectForms[$gravityForm['id']] = $gravityForm['title'];
        
}

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "infogroup_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => get_bloginfo('name') . ' Options',
        'page_title'           => get_bloginfo('name') . ' Options',
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 10,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 10,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

     // -> START Infogroup Header Options

    Redux::setSection( $opt_name, array(
        'title'            => 'Header Options',
        'id'               => 'header-options',
        'desc'             => 'These are the options for the header section of all pages.',
        'customizer_width' => '400px',
        'icon'             => 'el el-globe',
    ));

    Redux::setSection( $opt_name, array(
        'title'            => 'General Header Options',
        'id'               => 'general-header-options',
        'desc'             => 'These are the general options for the header section of all pages.',
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(

            // header logo upload
            array(
                'id'       => 'header-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => 'The Main Header Logo',
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => 'Upload the product\'s main logo here.' ,
                'subtitle' => '.jpg or .png only - Its responsive, so higher resolution if available.',
                'default'  => array( 'url' => get_template_directory_uri() . '/img/infogroup-logo.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),

            array(
                'id'=>'global-site-stripe',
                'type' => 'editor',
                'title' => 'Global Site Strip Content',                 
                'desc' => 'Enter the global site stripe content here. This overrides all indivdual page\'s site stripes.',
                'args' => array(
                    'teeny' => false,
                )               
            )

        ) // end header fields array
    ) );

    Redux::setSection($opt_name, array(
        'title'            => 'Off Canvas Overlay',
        'id'               => 'infogroup-off-canvas',
        'desc'             => 'Use this are to update the content in the Off Canvas overlay.',
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-right',
        'fields'           => array(
            array(
                'id'       => 'off-canvas-yes-no',
                'type'     => 'button_set',
                'title'    => 'Use the Off Canvas overlay?',
                'subtitle' => 'Find examples here: <a href="http://foundation.zurb.com/sites/docs/off-canvas.html">http://foundation.zurb.com/sites/docs/off-canvas.html</a>. Default is overlay from the left.',
                'desc'     => 'Choose either Yes or No.',                
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'off-canvas-position',
                'type'     => 'button_set',
                'title'    => 'Off Canvas Position',
                'subtitle' => '',
                'desc'     => 'Choose the position that the Off Canvas overlay will be at.',
                'required' => array('off-canvas-yes-no','equals','1'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Left',
                    '2' => 'Right',
                    '3' => 'Top',
                    '4' => 'Bottom',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'off-canvas-background-color',
                'type'     => 'color',                
                'title'    => 'Off Canvas Background Color',
                'subtitle' => 'Choose the color that will be used as the background for the Off Canvas slide out.',
                'default'  => '#b5b5b5',
                'required' => array('off-canvas-yes-no','equals','1'),
                'transparent' => false,
            ),
            array(
                'id'       => 'off-canvas-content-page',
                'type'     => 'select',
                'data'     => 'pages',
                'title'    => 'Off Canvas Content Page',
                'subtitle' => '<strong>Important!</strong> - Left/Right Off canvas is 300px wide, and Top/Bottom Off Canvas is 300px tall. Make your content page fit this!',
                'desc'     => 'Choose the page that holds the Off Canvas Content',
                'required' => array('off-canvas-yes-no','equals','1'),
            ),
            array(
                'id'    => 'off-canvas-info',
                'type'  => 'info',
                'style' => 'info',
                'title' => 'Open Off Canvas',
                'desc'  => 'Apply <code>data-toggle="offCanvas"</code> to any element to make it open the Off Canvas on click. If the attribute cannot be applied, add the class name of <code>offCanvasTrigger</code> and jQuery will apply the attribute.',
                'required' => array('off-canvas-yes-no','equals','1'),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'            => 'Global Site Modal',
        'id'               => 'infogroup-modal',
        'desc'             => 'Website Global Modal Options',
        'customizer_width' => '400px',
        'icon'             => 'el el-website',
        'fields'           => array(
            array(
                'id'       => 'modal-yes-no',
                'type'     => 'button_set',
                'title'    => 'Show global site modal to users?',
                'subtitle' => '',
                'desc'     => 'Choose either Yes or No.',                
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'modal-content-page',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'      => 'modals',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'title'    => 'Global Modal Content Page',
                'subtitle' => '',
                'desc'     => 'Choose the page that holds the Off Canvas Content',
                'required' => array('modal-yes-no','equals','1'),
            ),
            array(
                'id'       => 'modal-close-message',
                'type'     => 'text',
                'title'    => 'Modal Close Message',
                //'subtitle' => '',
                'desc'     => 'Enter a short message that is displayed when the user hovers the close X button.',
                'default'  => 'Are you sure?',                
            ),
            array(
                'id'       => 'gravity-form-yes-no',
                'type'     => 'button_set',
                'title'    => 'Does this modal contain a Gravity Form?',
                'subtitle' => '',
                'desc'     => 'Choose either Yes or No.',                
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'gravity-forms-list',
                'type'     => 'select',                
                'title'    => 'Active Gravity Forms',
                'subtitle' => '',
                'desc'     => 'Select which Gravity Form is in this modal.',
                'options'  => $globalModalSelectForms,
                'required' => array(
                    array('modal-yes-no','equals','1'),
                    array('gravity-form-yes-no','equals','1'),
                )
            ),
            array(
                'id'       => 'modal-exlude-urls',
                'type'     => 'multi_text',
                'title'    => 'Global Modal Exclude URLs',
                'validate' => 'url',
                'subtitle' => '',
                'desc'     => 'Enter any fully qualified URLs that should be excluded from having the modal shown on.',
                'show_empty' => false,
                'add_text' => 'Add URLs',
                'required' => array('modal-yes-no','equals','1'),
            ),
            array(
                'id'       => 'modal-on-mobile',
                'type'     => 'button_set',
                'title'    => 'Show global modal on mobile devices?',
                'subtitle' => '',
                'desc'     => 'Choose either Yes or No.',                
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '1',
                'required' => array('modal-yes-no','equals','1'),
            ),
            array(
                'id'       => 'modal-timer',
                'type'     => 'text',
                'title'    => 'Open Global Modal Time',
                'subtitle' => '',
                'desc'     => 'Enter the number of seconds to delay opening the modal on each page load.',
                'validate' => 'numeric',
                'default'  => '5',
                'required' => array('modal-yes-no','equals','1'),
            ),
            array(
                'id'    => 'modal-info',
                'type'  => 'info',
                'style' => 'info',
                'title' => 'Open Off Canvas',
                'desc'  => 'The default modal width for desktop screens is 900px. Make the Modal Content Page have content to fit this width. The modal is responsive down to mobile size screens.',
                'required' => array('modal-yes-no','equals','1'),
            ),
        )
    ));      

    Redux::setSection($opt_name, array(
        'title'            => 'Footer Options',
        'id'               => 'footer-options',
        'desc'             => 'These are the options for the footer section of all pages. - Most footer options are widgets.',
        'customizer_width' => '400px',
        'icon'             => 'el el-globe',
        'fields'           => array(

            // header logo upload
            array(
                'id'       => 'footer-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => 'The Footer Logo',
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => 'Upload the product\'s footer logo here.',
                'subtitle' => '.jpg or .png only - Its responsive, so higher resolution if available.',
                'default'  => array( 'url' => get_template_directory_uri() . '/img/infogroup-logo.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'chat-phone-slide',
                'type'     => 'button_set',                
                'title'    => 'Slide Up Chat/Phone Box',
                'subtitle' => '',
                'desc'     => 'Select whether or not the slide up phone box is active.',
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '2'                
            ),
        )
    )); 

    /*
     * <--- END SECTIONS
     */