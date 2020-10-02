<?php
/**
 * Form class file
 *
 * @package food-shop
 */

namespace Theme\Custom;
use Theme\Traits\Singleton;

class Form {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Action
        add_action( 'wp_ajax_subscribe', [$this, 'subscribe_form_handler'] );
        add_action( 'wp_ajax_nopriv_subscribe', [$this, 'subscribe_form_handler'] );

        add_action( 'wp_ajax_update_mini_cart', [$this, 'mini_cart_form_handler'] );
        add_action( 'wp_ajax_nopriv_update_mini_cart', [$this, 'mini_cart_form_handler'] );
    }

    public function mini_cart_form_handler() {
        $nonce = $_POST['update_mini_cart'] ?? '';
        $cart  = $_POST['cart'] ?? [];
        // if ( !wp_verify_nonce( $nonce, '_wpnonce' ) ) {
        //     echo $this->message( 'error', 'The request is not valid.' );
        //     die;
        // }
        //print_r( $_POST );
        global $woocommerce;
        if ( is_array( $cart ) && !empty( $cart ) ) {
            foreach ( $cart as $key => $item ) {
                $qty = $item['qty'] ?? '';
                if ( $qty ) {
                    $woocommerce->cart->set_quantity( sanitize_text_field( $key ), sanitize_text_field( $qty ) );
                }
            }
        }

        die;

    }

    public function subscribe_form_handler() {
        $nonce             = sanitize_text_field( $_POST['subscribe_wpnonce'] );
        $mailchimp_api_key = sanitize_text_field( $_POST['mailchimp_api_key'] );
        $mailchimp_list_id = sanitize_text_field( $_POST['mailchimp_list_id'] );
        $email             = sanitize_text_field( $_POST['email'] );
        if ( !wp_verify_nonce( $nonce, 'subscribe' ) ) {
            echo $this->message( 'error', 'The request is not valid.' );
            die;
        }

        if ( empty( $mailchimp_api_key ) || empty( $mailchimp_list_id ) ) {
            echo $this->message( 'error', 'Something wrong please try sometimes later.' );
            die;
        }

        if ( empty( $email ) ) {
            echo $this->message( 'error', 'Please provide an email address to subscribe' );
            die;
        }

        if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            echo $this->message( 'error', 'Email address is not valid, Please provide a valid email address' );
            die;
        }

        $apiKey = $mailchimp_api_key;
        $listId = $mailchimp_list_id;

        $memberId   = md5( strtolower( $email ) );
        $dataCenter = substr( $apiKey, strpos( $apiKey, '-' ) + 1 );
        $url        = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

        $json = json_encode( [
            'email_address' => $email,
            'status'        => 'subscribed',
        ] );

        $ch = curl_init( $url );

        curl_setopt( $ch, CURLOPT_USERPWD, 'user:' . $apiKey );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json );

        $result   = curl_exec( $ch );
        $httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close( $ch );

        if ( $httpCode === 200 ) {
            echo $this->message( 'success', 'Thank you for subscribed.' );
            die;
        } else {
            echo $this->message( 'error', 'Something wrong please try sometimes later.' );
            die;
        }

    }

    public function message( $type, $message ) {
        if ( $type && $message ) {
            return json_encode( ['type' => $type, 'message' => $message] );
        }
    }
}