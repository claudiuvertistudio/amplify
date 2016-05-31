<?php
/**
 * Amplify Theme Customizer
 *
 * @package Amplify
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amplify_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor' )->section   = 'colors';
    $wp_customize->get_control( 'header_textcolor' )->label     = __('Site title', 'amplify');
    $wp_customize->get_control( 'header_textcolor' )->priority  = '14';
    $wp_customize->get_setting( 'header_textcolor' )->default   = '#ffffff';

    //Divider
    class Amplify_Divider extends WP_Customize_Control {

        public function render_content() {
            echo '<hr style="margin: 15px 0;border-top: 1px dashed #919191;" />';
        }
    }

    //Extra titles
    class Amplify_Titles extends WP_Customize_Control {
        public $type = 'titles';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="padding: 10px; border: 1px solid #DF7B7B; color: #DF7B7B;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

    //___General___//
    $wp_customize->add_section(
        'amplify_general',
        array(
            'title' => __('General', 'amplify'),
            'priority' => 9,
        )
    );
    //Favicon Upload
    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'amplify' ),
               'type'           => 'image',
               'section'        => 'amplify_general',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );
    //___Header___//
    $wp_customize->add_section(
        'amplify_header',
        array(
            'title' => __('Header', 'amplify'),
            'priority' => 10,
        )
    );
    $wp_customize->add_setting(
        'header_style',
        array(
            'default'           => 'menu-above',
            'sanitize_callback' => 'amplify_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'header_style',
        array(
            'type'      => 'radio',
            'label'     => __('Header style', 'amplify'),
            'section'   => 'amplify_header',
            'priority'  => 9,
            'choices'   => array(
                'menu-above'  => __( 'Menu above title&amp;description', 'amplify' ),
                'menu-below'  => __( 'Menu below title&amp;description', 'amplify' ),
            ),
        )
    );
    //Divider
    $wp_customize->add_control( new Amplify_Divider( $wp_customize, 'header_style_divider', array(
        'section'  => 'amplify_header',
        'settings' => 'header_style',
        'priority' => 10,
    ) ) );

    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'amplify' ),
               'type'           => 'image',
               'section'        => 'amplify_header',
               'settings'       => 'site_logo',
               'priority'       => 11,
            )
        )
    );
    //Logo size
    $wp_customize->add_setting(
        'logo_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '200',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'logo_size', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'amplify_header',
        'label'       => __('Logo size', 'amplify'),
        'description' => __('Max-width for the logo. Default 200px', 'amplify'),
        'input_attrs' => array(
            'min'   => 50,
            'max'   => 600,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //Logo style
    $wp_customize->add_setting(
        'logo_style',
        array(
            'default'           => 'hide-title',
            'sanitize_callback' => 'amplify_sanitize_logo_style',
        )
    );
    $wp_customize->add_control(
        'logo_style',
        array(
            'type'          => 'radio',
            'label'         => __('Logo style', 'amplify'),
            'description'   => __('This option applies only if you are using a logo', 'amplify'),
            'section'       => 'amplify_header',
            'priority'      => 13,
            'choices'       => array(
                'hide-title'  => __( 'Only logo', 'amplify' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'amplify' ),
            ),
        )
    );
    //Divider
    $wp_customize->add_control( new Amplify_Divider( $wp_customize, 'site_logo_divider', array(
        'section'  => 'amplify_header',
        'settings' => 'header_style',
        'priority' => 13,
    ) ) );

    //Padding
    $wp_customize->add_setting(
        'branding_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '150',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'branding_padding', array(
        'type'        => 'number',
        'priority'    => 14,
        'section'     => 'amplify_header',
        'label'       => __('Padding', 'amplify'),
        'description' => __('Top&amp;bottom padding for the branding. Default: 150px', 'amplify'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 350,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Divider
    $wp_customize->add_control( new Amplify_Divider( $wp_customize, 'branding_padding_divider', array(
        'section'  => 'amplify_header',
        'settings' => 'header_style',
        'priority' => 15,
    ) ) );
    //Full width header
    $wp_customize->add_setting(
        'full_header',
        array(
            'sanitize_callback' => 'amplify_sanitize_checkbox',
			'default' => 1,
        )
    );
    $wp_customize->add_control(
        'full_header',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width header?', 'amplify'),
            'section'   => 'amplify_header',
            'priority'  => 16,
        )
    );
    //Center
    $wp_customize->add_setting(
        'branding_center',
        array(
            'sanitize_callback' => 'amplify_sanitize_checkbox',
			'default' => 1
        )
    );
    $wp_customize->add_control(
        'branding_center',
        array(
            'type'      => 'checkbox',
            'label'     => __('Center the branding and menu?', 'amplify'),
            'section'   => 'amplify_header',
            'priority'  => 17,
        )
    );
    //Divider
    $wp_customize->add_control( new Amplify_Divider( $wp_customize, 'branding_center_divider', array(
        'section'  => 'amplify_header',
        'settings' => 'branding_center',
        'priority' => 18,
    ) ) );

    //Search form
    $wp_customize->add_setting(
        'header_search',
        array(
            'default'           => 'bottom-right',
            'sanitize_callback' => 'amplify_sanitize_search',
        )
    );
    $wp_customize->add_control(
        'header_search',
        array(
            'type'          => 'radio',
            'label'         => __('Header search form', 'amplify'),
            'description'   => __('Select the position for the header search form', 'amplify'),
            'section'       => 'amplify_header',
            'priority'      => 19,
            'choices'       => array(
                'bottom-right'  => __( 'Bottom right', 'amplify' ),
                'bottom-left'   => __( 'Bottom left', 'amplify' ),
                'hide-it'       => __( 'Hide it', 'amplify' )
            ),
        )
    );

    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'amplify'),
            'priority' => 13,
        )
    );
    //Index
    $wp_customize->add_setting('amplify_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new amplify_Titles( $wp_customize, 'index_meta', array(
        'label' => __('Blog page', 'amplify'),
        'section' => 'blog_options',
        'settings' => 'amplify_options[titles]',
        'priority' => 9
        ) )
    );
	// Blog layout
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'amplify_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'amplify'),
            'section'   => 'blog_options',
            'priority'  => 10,
            'choices'   => array(
                'classic'  	  => __( 'Classic', 'amplify' ),
                'fullwidth'  => __( 'Full width (no sidebar)', 'amplify' ),
                'masonry'      => __( 'Masonry (grid style)', 'amplify' )
            ),
        )
    );
    //Full content posts
    $wp_customize->add_setting(
      'full_content',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
        'full_content',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on the home page.', 'amplify'),
            'section' => 'blog_options',
            'priority' => 11,
        )
    );
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'amplify'),
        'description' => __('Choose your excerpt length. Default: 55 words', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Hide date
    $wp_customize->add_setting(
      'amplify_date',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'amplify_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date on index?', 'amplify'),
        'section' => 'blog_options',
        'priority' => 14,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'amplify_cats',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'amplify_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on index?', 'amplify'),
        'section' => 'blog_options',
        'priority' => 15,
      )
    );
    //Singles
    $wp_customize->add_setting('amplify_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new amplify_Titles( $wp_customize, 'single_meta', array(
        'label' => __('Single posts', 'amplify'),
        'section' => 'blog_options',
        'settings' => 'amplify_options[titles]',
        'priority' => 16
        ) )
    );
    //Hide date
    $wp_customize->add_setting(
      'amplify_single_date',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'amplify_single_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date &amp; author on single posts?', 'amplify'),
        'section' => 'blog_options',
        'priority' => 17,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'amplify_single_cats',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'amplify_single_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on single posts?', 'amplify'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide tags
    $wp_customize->add_setting(
      'amplify_single_tags',
      array(
        'sanitize_callback' => 'amplify_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'amplify_single_tags',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post tags on single posts?', 'amplify'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );
    //Contain title
    $wp_customize->add_setting(
        'boxed_title',
        array(
            'sanitize_callback' => 'amplify_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'boxed_title',
        array(
            'type'      => 'checkbox',
            'label'     => __('Contain the entry title?', 'amplify'),
            'section'   => 'blog_options',
            'priority'  => 20,
        )
    );
    //Full width
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'amplify_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'amplify'),
            'section'   => 'blog_options',
            'priority'  => 21,
        )
    );
	//Title banner padding
    $wp_customize->add_setting(
        'banner_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '45',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'banner_padding', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'blog_options',
        'label'       => __('Title banner top&amp;bottom padding', 'amplify'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 250,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //___Fonts___//
    $wp_customize->add_section(
        'amplify_fonts',
        array(
            'title' => __('Fonts', 'amplify'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: flyfreemedia.com/documentation/amplify', 'amplify'),
        )
    );
    //Body fonts title
    $wp_customize->add_setting('amplify_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Amplify_Titles( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'amplify'),
        'section' => 'amplify_fonts',
        'settings' => 'amplify_options[titles]',
        'priority' => 10
        ) )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Open+Sans:400italic,600italic,400,600',
            'sanitize_callback' => 'amplify_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'amplify' ),
            'section' => 'amplify_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Open Sans\', sans-serif',
            'sanitize_callback' => 'amplify_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'amplify' ),
            'section' => 'amplify_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Headings fonts title
    $wp_customize->add_setting('amplify_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Amplify_Titles( $wp_customize, 'headings_fonts', array(
        'label' => __('Headings fonts', 'amplify'),
        'section' => 'amplify_fonts',
        'settings' => 'amplify_options[titles]',
        'priority' => 13
        ) )
    );
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Oswald:400,700',
            'sanitize_callback' => 'amplify_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'amplify' ),
            'section' => 'amplify_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Oswald\', sans-serif',
            'sanitize_callback' => 'amplify_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Font family', 'amplify' ),
            'section' => 'amplify_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    //Font sizes title
    $wp_customize->add_setting('amplify_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new amplify_Titles( $wp_customize, 'font_sizes_title', array(
        'label' => __('Font sizes', 'amplify'),
        'section' => 'amplify_fonts',
        'settings' => 'amplify_options[titles]',
        'priority' => 16
        ) )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '62',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'amplify_fonts',
        'label'       => __('Site title', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'amplify_fonts',
        'label'       => __('Site description', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    // Nav menu
    $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'amplify_fonts',
        'label'       => __('Menu items', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'amplify_fonts',
        'label'       => __('H1 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'amplify_fonts',
        'label'       => __('H2 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'amplify_fonts',
        'label'       => __('H3 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'amplify_fonts',
        'label'       => __('H4 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'amplify_fonts',
        'label'       => __('H5 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'amplify_fonts',
        'label'       => __('H6 font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'amplify_fonts',
        'label'       => __('Body font size', 'amplify'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#FABE28',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'amplify'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 12
            )
        )
    );
    //Header
    $wp_customize->add_setting(
        'header_color',
        array(
            'default'           => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_color',
            array(
                'label' => __('Header background', 'amplify'),
                'section' => 'colors',
                'settings' => 'header_color',
                'priority' => 13
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#666B71',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'amplify'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 15
            )
        )
    );
    //Widget color
    $wp_customize->add_setting(
        'widgets_color',
        array(
            'default'           => '#666B71',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'widgets_color',
            array(
                'label' => __('Widgets color', 'amplify'),
                'section' => 'colors',
                'settings' => 'widgets_color',
                'priority' => 16
            )
        )
    );
    //Footer
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer', 'amplify'),
                'section' => 'colors',
                'settings' => 'footer_color',
                'priority' => 17
            )
        )
    );
}
add_action( 'customize_register', 'amplify_customize_register' );

/**
 * Sanitization
 */
//Checkboxes
function amplify_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Header
function amplify_sanitize_header( $input ) {
    $valid = array(
                'menu-above'  => __( 'Menu above title&amp;description', 'amplify' ),
                'menu-below'  => __( 'Menu below title&amp;description', 'amplify' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
// Layout
function amplify_sanitize_layout( $input ) {
    $valid = array(
                'classic'  	  => __( 'Classic', 'amplify' ),
                'fullwidth'  => __( 'Full width (no sidebar)', 'amplify' ),
                'masonry'      => __( 'Masonry (grid style)', 'amplify' )
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
// Logo style
function amplify_sanitize_logo_style( $input ) {
    $valid = array(
                'hide-title'  => __( 'Only logo', 'amplify' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'amplify' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Header search form
function amplify_sanitize_search( $input ) {
    $valid = array(
                'bottom-right'  => __( 'Bottom right', 'amplify' ),
                'bottom-left'   => __( 'Bottom left', 'amplify' ),
                'hide-it'       => __( 'Hide it', 'amplify' )
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Text
function amplify_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amplify_customize_preview_js() {
	wp_enqueue_script( 'amplify_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'amplify_customize_preview_js' );

function amplify_registers() {
	wp_enqueue_script( 'amplify_customizer_script', get_template_directory_uri() . '/js/amplify_customizer.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'amplify_customizer_script', 'amplifyCustomizerObject', array(
		'github'				=> __('GitHub','amplify'),
		'review'				=> __('Leave a Review', 'amplify'),
		'documentation'	=> __('Documentation', 'amplify')
		) );
}
add_action( 'customize_controls_enqueue_scripts', 'amplify_registers' );
