<?php

// add the admin options page
add_action('admin_menu', 'churchinfo_wp');
function churchinfo_wp() {
    add_options_page('Church Info Settings', 'Church Info', 'manage_options', 'plugin', 'churchinfo_plugin_options_page');
}


// add the admin settings and such
add_action('admin_init', 'plugin_admin_init');
function plugin_admin_init(){
    register_setting( 'churchinfo_plugin_options', 'churchinfo_plugin_settings');

    add_settings_section('churchinfo_plugin_db', 'DB Settings', 'ci_db_callback', 'plugin');
    add_settings_field('ci_db_host'             , 'Church Info DB Host'             , 'ci_setting_dbHost_callback'          , 'plugin', 'churchinfo_plugin_db');
    add_settings_field('ci_db_name'             , 'Church Info DB Name'             , 'ci_setting_dbName_callback'          , 'plugin', 'churchinfo_plugin_db');
    add_settings_field('ci_db_user'             , 'Church Info DB User'             , 'ci_setting_dbUser_callback'          , 'plugin', 'churchinfo_plugin_db');
    add_settings_field('ci_db_pass'             , 'Church Info DB PASS'             , 'ci_setting_dbPass_callback'          , 'plugin', 'churchinfo_plugin_db');

    add_settings_section('churchinfo_plugin_data', 'Data Settings', 'ci_data_callback', 'plugin');
    add_settings_field('ci_source_data_on'      , 'Add Source Data'                 , 'ci_setting_sourceDataOn_callback'    , 'plugin', 'churchinfo_plugin_data');
    add_settings_field('ci_source_data_name'    , 'Family source data filed name'   , 'ci_setting_sourceDataName_callback'  , 'plugin', 'churchinfo_plugin_data');
    add_settings_field('ci_source_data_value'   , 'Family source data value'        , 'ci_setting_sourceDataValue_callback' , 'plugin', 'churchinfo_plugin_data');

}

function churchinfo_plugin_options_page() {
    ?>
    <div>
        <h2>Church Info Settings </h2>
        Options relating to church info db.
        <form action="options.php" method="post">
            <?php settings_fields('churchinfo_plugin_options'); ?>
            <?php do_settings_sections('plugin'); ?>

            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form></div>

<?php
}


/** Church info DB Settings  */
function ci_db_callback() {

}

function ci_setting_dbHost_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_db_host";
    $value = esc_attr( $settings[$field] );
    echo "<input type='text' name='churchinfo_plugin_settings[$field]' value='$value' />";
}
function ci_setting_dbName_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_db_name";
    $value = esc_attr( $settings[$field] );
    echo "<input type='text' name='churchinfo_plugin_settings[$field]' value='$value' />";
}
function ci_setting_dbUser_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_db_user";
    $value = esc_attr( $settings[$field] );
    echo "<input type='text' name='churchinfo_plugin_settings[$field]' value='$value' />";
}
function ci_setting_dbPass_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_db_pass";
    $value = esc_attr( $settings[$field] );
    echo "<input type='password' name='churchinfo_plugin_settings[$field]' value='$value' />";
}

/** Church info Data Settings  */

function ci_data_callback() {

}

function ci_setting_sourceDataOn_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_source_data_on";
    $value = esc_attr( $settings[$field]);
    echo "<input type='checkbox' name='churchinfo_plugin_settings[$field]' value='$value' />";
}
function ci_setting_sourceDataName_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_source_data_name";
    $value = esc_attr( $settings[$field] );
    echo "<input type='text' name='churchinfo_plugin_settings[$field]' value='$value' />";
}
function ci_setting_sourceDataValue_callback() {
    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $field = "ci_source_data_value";
    $value = esc_attr( $settings[$field] );
    echo "<input type='text' name='churchinfo_plugin_settings[$field]' value='$value' />";
}


/*
* INPUT VALIDATION:
* */
function churchinfo_plugin_options_validate( $input ) {

    $settings = (array) get_option( 'churchinfo_plugin_settings' );
    $output = "";
    //TODO validate each field


    return $output;
}