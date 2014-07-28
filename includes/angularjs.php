<?php

class WordPressAngularJS {
    function WordPressAngularJS(){
        global $wpdb;
        add_action( 'wp_enqueue_scripts', array( $this, 'angularScripts' ) );
    }

    function angularScripts() {
        // Angular Core
        wp_enqueue_script('angular-core', plugin_dir_url( __FILE__ ).'js/angular.min.js', array('jquery'), null, false);
        wp_enqueue_script('angular-app', plugin_dir_url( __FILE__ ).'js/angular-app.js', array('jquery'), null, false);

        // Angular Factories


        // Angular Directives

        // Localize Variables

    }
}
