<?php
    /**
     * Form class file
     *
     * @package food-shop
     */

    namespace Theme\Custom;
    // Adds widget: Social Icons
    class Social_Icons_Widget extends \WP_Widget {

        function __construct() {
            parent::__construct(
                'social_icons_widget',
                esc_html__( 'Food Shop Social Icons', 'food-shop' )
            );
        }

        private $widget_fields = [
            [
                'label' => 'Facebook',
                'id'    => 'facebook',
                'type'  => 'text',
            ],
            [
                'label' => 'Twitter',
                'id'    => 'twitter',
                'type'  => 'text',
            ],
            [
                'label' => 'Instagram',
                'id'    => 'instagram',
                'type'  => 'text',
            ],
            [
                'label' => 'Google Plus',
                'id'    => 'google_plus',
                'type'  => 'text',
            ],
            [
                'label' => 'Skype',
                'id'    => 'skype',
                'type'  => 'text',
            ],
        ];

        public function widget( $args, $instance ) {
            echo $args['before_widget'];

            if ( !empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }

            // Output generated fields
            ?>
            <ul class="list-inline list-social-3 list-inline-sm mt-3">
                <?php if(!empty($instance['facebook'])): ?>
                <li>
                    <a class="icon mdi mdi-facebook icon-xxs" href="<?php echo esc_url($instance['facebook']); ?>"></a>
                </li>
                <?php endif; ?>
                <?php if(!empty($instance['twitter'])): ?>
                <li>
                    <a class="icon mdi mdi-twitter icon-xxs" href="<?php echo esc_url($instance['twitter']); ?>">

                    </a>
                </li>
                <?php endif; ?>
                <?php if(!empty($instance['instagram'])): ?>
                <li>
                    <a class="icon mdi mdi-instagram icon-xxs" href="<?php echo esc_url($instance['instagram']); ?>">

                    </a>
                </li>
                <?php endif; ?>
                <?php if(!empty($instance['google_plus'])): ?>
                <li>
                    <a class="icon mdi mdi-google-plus icon-xxs" href="<?php echo esc_url($instance['google_plus']); ?>">

                    </a>
                </li>
                <?php endif; ?>
                <?php if(!empty($instance['skype'])): ?>
                <li>
                    <a class="icon mdi mdi-skype icon-xxs" href="<?php echo esc_url($instance['skype']); ?>">

                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <?php

            echo $args['after_widget'];
        }

        public function field_generator( $instance ) {
            $output = '';
            foreach ( $this->widget_fields as $widget_field ) {
                $default = '';
                if ( isset( $widget_field['default'] ) ) {
                    $default = $widget_field['default'];
                }
                $widget_value = !empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'food-shop' );
                switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'], 'food-shop' ) . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . esc_attr( $widget_value ) . '">';
                    $output .= '</p>';
                }
            }
            echo $output;
        }

        public function form( $instance ) {
            $title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'food-shop' );
        ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'food-shop' );?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="url" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
            $this->field_generator( $instance );
                }

                public function update( $new_instance, $old_instance ) {
                    $instance          = [];
                    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
                    foreach ( $this->widget_fields as $widget_field ) {
                        switch ( $widget_field['type'] ) {
                        default:
                            $instance[$widget_field['id']] = ( !empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
                        }
                    }
                    return $instance;
            }
        }