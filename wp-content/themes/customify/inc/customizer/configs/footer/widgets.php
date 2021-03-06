<?php
class Customify_Builder_Item_Footer_Widget_1
{
    public $id = 'footer-1';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 1', 'customify' ),
            'id' => 'footer-1',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-1'
        );
    }

    function customize(){
        return customify_footer_layout_settings( 'footer-1', 'sidebar-widgets-footer-1' );
    }
}

class Customify_Builder_Item_Footer_Widget_2
{
    public $id = 'footer-2';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 2', 'customify' ),
            'id' => 'footer-2',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-2'
        );
    }
    function customize(){
        return customify_footer_layout_settings( 'footer-2', 'sidebar-widgets-footer-2' ) ;
    }
}

class Customify_Builder_Item_Footer_Widget_3
{
    public $id = 'footer-3';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 3', 'customify' ),
            'id' => 'footer-3',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-3'
        );
    }
    function customize(){
        return customify_footer_layout_settings( 'footer-3', 'sidebar-widgets-footer-3' ) ;
    }
}

class Customify_Builder_Item_Footer_Widget_4
{
    public $id = 'footer-4';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 4', 'customify' ),
            'id' => 'footer-4',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-4'
        );
    }
    function customize(){
        return customify_footer_layout_settings( 'footer-4', 'sidebar-widgets-footer-4' ) ;
    }
}

class Customify_Builder_Item_Footer_Widget_5
{
    public $id = 'footer-5';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 5', 'customify' ),
            'id' => 'footer-5',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-5'
        );
    }
    function customize(){
        return customify_footer_layout_settings( 'footer-5', 'sidebar-widgets-footer-5' ) ;
    }
}

class Customify_Builder_Item_Footer_Widget_6
{
    public $id = 'footer-6';

    function item()
    {
        return array(
            'name' => __( 'Footer Sidebar 6', 'customify' ),
            'id' => 'footer-6',
            'width' => '3',
            'section' => 'sidebar-widgets-footer-6'
        );
    }
    function customize(){
        return customify_footer_layout_settings( 'footer-6', 'sidebar-widgets-footer-6' ) ;
    }
}


function customify_change_footer_widgets_location( $wp_customize ){
    for ( $i = 1; $i<= 6; $i ++ ) {
        if (  $wp_customize->get_section( 'sidebar-widgets-footer-'.$i ) ) {
            $wp_customize->get_section( 'sidebar-widgets-footer-'.$i )->panel = 'footer_settings';
        }
    }


}
add_action( 'customize_register', 'customify_change_footer_widgets_location', 999 );

/**
 * Always show footer widgets for customize builder
 *
 * @param $active
 * @param $section
 * @return bool
 */
function customify_customize_footer_widgets_show(  $active, $section ){
    if ( strpos( $section->id, 'widgets-footer-' ) ) {
        $active = true;
    }
    return $active;
}
add_filter( 'customize_section_active', 'customify_customize_footer_widgets_show', 15, 2 );


/**
 * Display Footer widget
 *
 * @param string $footer_id
 */
function customify_builder_footer_widget_item( $footer_id = 'footer-1' ){
    $show = false;
    if ( is_active_sidebar( $footer_id ) ) {
        echo '<div class="widget-area">';
        dynamic_sidebar($footer_id);
        $show = true;
        echo '</div>';
    }

    // Show admin notice
    if ( ! $show ) {
        if (current_user_can('edit_theme_options')) {
            echo '<div class="widget-area">';
            $id = str_replace('footer-', '', $footer_id);
            the_widget('WP_Widget_Text', array(
                'title'  => sprintf(__('Footer Widget %s', 'customify'), $id),
                'text'   => sprintf( // WPCS: XSS ok.
                /*
                Translators:
                    1: Admin URL
                    2: Customize URL
                    3: Footer ID
                */
                    __('<p>Replace this widget content by going to <a href="%1$s"><strong>Appearance &rarr; Customize &rarr; Footer &rarr; Footer %2$s</strong></a> and adding widgets into this widget area.</p>', 'customify'),
                    esc_url(admin_url('customize.php?autofocus[section]=sidebar-widgets-footer-' . $id)),
                    $id
                ),
                'filter' => true,
                'visual' => true,
            ), array(
                'before_widget' => '<section id="placeholder-widget-text" class="widget widget_text">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ));
            echo '</div>';
        }
    }

}

function customify_builder_footer_1_item(){
    customify_builder_footer_widget_item( 'footer-1' );
}

function customify_builder_footer_2_item(){
    customify_builder_footer_widget_item( 'footer-2' );
}

function customify_builder_footer_3_item(){
    customify_builder_footer_widget_item( 'footer-3' );
}

function customify_builder_footer_4_item(){
    customify_builder_footer_widget_item( 'footer-4' );
}

function customify_builder_footer_5_item(){
    customify_builder_footer_widget_item( 'footer-5' );
}
function customify_builder_footer_6_item(){
    customify_builder_footer_widget_item( 'footer-6' );
}

Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_1() );
Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_2() );
Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_3() );
Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_4() );
Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_5() );
Customify_Customize_Layout_Builder()->register_item('footer', new Customify_Builder_Item_Footer_Widget_6() );