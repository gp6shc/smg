<?php
/**
 * Panel
 * Creates a panel in wp-admin that allows you to create custom fields at the site level.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @author Alison Kleinschmidt
 * @link http://alisothegeek.com/2011/04/wordpress-settings-api-tutorial-follow-up/
 * @todo Update fields to take advantage of formcast
 */
	if ( !class_exists('pxlPanel') ) :
		class pxlPanel {
			private $sections;
			private $checkboxes;
			private $settings;
			private $setup;
			public function __construct( $setup ) {
				global $pxlSetup;
				$this->setup = $pxlSetup['theme']['panel'];
				// This will keep track of the checkbox options for the validate_settings function.
				$this->checkboxes = array();
				$this->settings = array();
				$this->get_settings();
				$parapxl_theme_sections = array(
					'social' => 'Social Media',
					'general' => 'General Settings',
					'appearance' => 'Appearance',
					'reset' => 'Reset to Defaults',
					'about' => 'About'
				);
				foreach ($this->setup['sections'] as $section => $label) {
					if ( $label === true ) $this->sections[$section] = __( $parapxl_theme_sections[$section] );
					else if( $label != false ) $this->sections[$section] = __( $label );
				}
				if ( !empty($this->sections) ) {
					add_action( 'admin_menu', array( &$this, 'add_pages' ) );
					add_action( 'admin_init', array( &$this, 'register_settings' ) );
					if ( ! get_option( 'parapxl_themeoptions' ) ) $this->initialize_settings();
				}
			}
			public function add_pages() {
				$admin_page = add_menu_page( __( 'Theme Panel' ), __( 'Theme Panel' ), 'manage_options', 'mytheme-options', array( &$this, 'display_page' ), '', 3 );
				add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
				add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );
			}
			public function create_setting( $args = array() ) {
				$defaults = array(
					'id'      => 'default_field',
					'title'   => __( 'Default Field' ),
					'desc'    => __( 'This is a default description.' ),
					'std'     => '',
					'type'    => 'text',
					'section' => 'general',
					'choices' => array(),
					'class'   => '',
					'disabled'=> false
				);
				
				extract( wp_parse_args( $args, $defaults ) );
				
				$field_args = array(
					'type'      => $type,
					'id'        => $id,
					'desc'      => $desc,
					'std'       => $std,
					'choices'   => $choices,
					'label_for' => $id,
					'class'     => $class,
					'disabled' => $disabled,
				);
				
				if ( $type == 'checkbox' )
					$this->checkboxes[] = $id;
				
				add_settings_field( $id, $title, array( $this, 'display_setting' ), 'mytheme-options', $section, $field_args );
			}
			public function display_page() {
				echo '<div class="wrap">
						<div class="icon32" id="icon-options-general"></div>
						<h2>' . __( 'Theme Panel' ) . '</h2>';
						if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) echo '<div class="updated fade"><p>' . __( 'Theme panel updated.' ) . '</p></div>';
						echo '<form action="options.php" method="post">';
							settings_fields( 'parapxl_themeoptions' );
							echo '<div class="ui-tabs">
									<ul class="ui-tabs-nav">';
										foreach ( $this->sections as $section_slug => $section ) echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
									echo '</ul>';
									do_settings_sections( $_GET['page'] );
							echo '</div>
							<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __( 'Save Changes' ) . '" /></p>
						</form>';
					echo '<script type="text/javascript">
						jQuery(document).ready(function($) {	var sections = [];';
							foreach ( $this->sections as $section_slug => $section ) echo "sections['$section'] = '$section_slug';";
							echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
								wrapped.each(function() { $(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
							});
							$(".ui-tabs-panel").each(function(index) { $(this).attr("id", sections[$(this).children("h3").text()]);
								if (index > 0)
									$(this).addClass("ui-tabs-hide");
							});
							$(".ui-tabs").tabs({ fx: { opacity: "toggle", duration: "fast" } });
							$("input[type=text], textarea").each(function() {
								if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") $(this).css("color", "#999");
							});
							$("input[type=text], textarea").focus(function() {
								if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
									$(this).val("");
									$(this).css("color", "#000");
								}
							}).blur(function() {
								if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
									$(this).val($(this).attr("placeholder"));
									$(this).css("color", "#999");
								}
							});
							$(".wrap h3, .wrap table").show();
							// This will make the "warning" checkbox class really stand out when checked.
							// I use it here for the Reset checkbox.
							$(".warning").change(function() {
								if ($(this).is(":checked")) $(this).parent().css("background", "#c00").css("color", "#fff").css("fontWeight", "bold");
								else $(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
							});
							// Browser compatibility
							if ($.browser.mozilla) $("form").attr("autocomplete", "off");
						});
					</script>
				</div>';
			}
			public function display_section() {
				# code
			}
			public function display_about_section() {
				// This displays on the "About" tab. Echo regular HTML here, like so:
				echo '<p>Copyright 2011 me@example.com</p>';
			}
			public function display_setting( $args = array() ) {
				extract( $args );
		
				$options = get_option( 'parapxl_themeoptions' );
		
				if ( ! isset( $options[$id] ) && $type != 'checkbox' )
					$options[$id] = $std;
				elseif ( ! isset( $options[$id] ) )
					$options[$id] = 0;
			
				$field_class = '';
				if ( $class != '' ) $field_class = ' ' . $class;
		
				switch ( $type ) {
					case 'heading':
						echo '</td></tr><tr valign="top"><td colspan="2"><h4>' . $desc . '</h4>';
						break;
					case 'checkbox':
						echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="parapxl_themeoptions[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
						break;
					case 'select':
						echo '<select class="select' . $field_class . '" name="parapxl_themeoptions[' . $id . ']">';
						
						foreach ( $choices as $value => $label )
							echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
						
						echo '</select>';
						
						if ( $desc != '' )
							echo '<br /><span class="description">' . $desc . '</span>';
						break;
					case 'select-query':
						if( isset($choices[1]) ) $choices = $choices[0]::$choices[1]();
						else $choices = $choices[0]();
						echo '<select class="select' . $field_class . '" name="parapxl_themeoptions[' . $id . ']">';
							foreach ( $choices as $label => $value )
								echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
						echo '</select>';
						if ( $desc != '' ) echo '<br /><span class="description">' . $desc . '</span>';
						break;
						break;
					case 'radio':
						$i = 0;
						foreach ( $choices as $value => $label ) { echo '<input class="radio' . $field_class . '" type="radio" name="parapxl_themeoptions[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
							if ( $i < count( $options ) - 1 )
								echo '<br />';
							$i++;
						}
						if ( $desc != '' )
							echo '<br /><span class="description">' . $desc . '</span>';
						break;
					case 'textarea':
						echo '<textarea class="' . $field_class . '" '.( $disabled ? 'disabled="disabled"' : '').' id="' . $id . '" name="parapxl_themeoptions[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
						if ( $desc != '' )
							echo '<br /><span class="description">' . $desc . '</span>';
						break;
					case 'password':
						echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="parapxl_themeoptions[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
						if ( $desc != '' )
							echo '<br /><span class="description">' . $desc . '</span>';
						break;
					case 'text':
					default:
				 		echo '<input class="regular-text' . $field_class . '" '.( $disabled ? 'disabled="disabled"' : '').' type="text" id="' . $id . '" name="parapxl_themeoptions[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
				 		if ( $desc != '' )
				 			echo '<br /><span class="description">' . $desc . '</span>';
				 		break;
				}
			}
			public function get_settings() {
				/* General Settings
				===========================================*/
					foreach ($this->setup['fields'] as $field => $options) $this->settings[$field] = $options;
					
				/* Reset
				===========================================*/
					$this->settings['reset_theme'] = array(
						'section' => 'reset',
						'title'   => __( 'Reset theme' ),
						'type'    => 'checkbox',
						'std'     => 0,
						'class'   => 'warning', // Custom class for CSS
						'desc'    => __( 'Check this box and click "Save Changes" below to reset theme panel options to their defaults.' )
					);
			}
			public function initialize_settings() {
				$default_settings = array();
				foreach ( $this->settings as $id => $setting ){
					// nice($setting);
					if ( $setting['type'] != 'heading' ) $default_settings[$id] = $setting['std'];
				}
				update_option( 'parapxl_themeoptions', $default_settings );
			}
			public function register_settings() {
				register_setting( 'parapxl_themeoptions', 'parapxl_themeoptions', array ( &$this, 'validate_settings' ) );
				foreach ( $this->sections as $slug => $title ) {
					if ( $slug == 'about' ) add_settings_section( $slug, $title, array( &$this, 'display_about_section' ), 'mytheme-options' );
					else add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'mytheme-options' );
				}
				$this->get_settings();
				foreach ( $this->settings as $id => $setting ) {
					$setting['id'] = $id;
					$this->create_setting( $setting );
				}
			}
			public function scripts() {
				wp_print_scripts( 'jquery-ui-tabs' );
			}
			public function styles() {
				wp_enqueue_style( 'mytheme-admin', FW_RESOURCES_PATH . '/css/theme-panel.css' );
				wp_enqueue_style( 'mytheme-admin' );
			}
			public function validate_settings( $input ) {
				if ( ! isset( $input['reset_theme'] ) ) {	$options = get_option( 'parapxl_themeoptions' );
					foreach ( $this->checkboxes as $id )
						if ( isset( $options[$id] ) && ! isset( $input[$id] ) ) unset( $options[$id] );
					return $input;
				}
				return false;
			}
		}
		function get_themeinfo( $option ) {
			$options = get_option( 'parapxl_themeoptions' );
			if ( isset( $options[$option] ) ) return $options[$option];
			else return false;
		}
		function themeinfo( $option ) {
			$options = get_option( 'parapxl_themeoptions' );
			if ( isset( $options[$option] ) ) echo $options[$option];
			else return false;
		}
		function update_themeinfo( $option, $value = null ) {
			$options = get_option( 'parapxl_themeoptions' );
			if ( ! is_array( $options ) ) $options = array();
			$options[$option] = $value;
			update_option( 'parapxl_themeoptions', $options );
		}
	endif;