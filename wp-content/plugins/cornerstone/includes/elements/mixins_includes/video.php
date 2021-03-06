<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/MIXINS_INCLUDES/VIDEO.PHP
// -----------------------------------------------------------------------------
// V2 element mixins.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Controls: Advanced
//   02. Controls: Standard (Content)
//   03. Controls: Standard (Design - Setup)
//   04. Controls: Standard (Design - Colors)
//   05. Control Group
//   06. Values
// =============================================================================

// Controls: Advanced
// =============================================================================

function x_controls_video_adv( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $controls = array_merge(
    $control_group_video_adv_setup,
    x_controls_mejs_adv( array_merge( $settings_video_mejs, array( 'adv' => true ) ) )
  );

  return $controls;

}



// Controls: Standard (Content)
// =============================================================================

function x_controls_video_std_content( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $controls = $control_group_video_std_content_setup;

  return $controls;

}



// Controls: Standard (Design - Setup)
// =============================================================================

function x_controls_video_std_design_setup( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $controls = x_controls_mejs_std_design_setup( $settings_video_mejs );

  return array_map( 'x_controls_inject_std_design_controls_condition', $controls );

}



// Controls: Standard (Design - Colors)
// =============================================================================

function x_controls_video_std_design_colors( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $controls = x_controls_mejs_std_design_colors( $settings_video_mejs );

  return array_map( 'x_controls_inject_std_design_controls_condition', $controls );

}



// Control Groups
// =============================================================================

function x_control_groups_video( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $control_groups = array(
    $group             => array( 'title' => $group_title ),
    $group_video_setup => array( 'title' => __( 'Setup', '__x__' ) ),
    $group_video_mejs  => array( 'title' => __( 'Controls', '__x__' ) ),
  );

  return $control_groups;

}



// Values
// =============================================================================

function x_values_video( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/video.php' );

  $values = array(
    'video_is_bg'       => x_module_value( $is_bg, 'markup' ),
    'video_type'        => x_module_value( 'embed', 'markup' ),
    'video_embed_code'  => x_module_value( '', 'markup:html', true ),
    'mejs_source_files' => x_module_value( '', 'markup:raw', true ),
    'mejs_poster'       => x_module_value( '', 'markup', true ),
  );

  $values = array_merge(
    $values,
    x_values_mejs( array( 'type' => 'video' ) )
  );

  return x_bar_mixin_values( $values, $settings );

}
