<?php // add the admin options page
add_action('admin_menu', 'churchinfo_wp');
function churchinfo_wp() {
    add_options_page('Church Info Settings', 'Church Info', 'manage_options', 'plugin', 'churchinfo_plugin_options_page');
}
?>

<?php // display the admin options page
function churchinfo_plugin_options_page() {
    ?>
    <div>
        <h2>Church Info Settings </h2>
        Options relating to church info db.
        <form action="options.php" method="post">
            <?php settings_fields('plugin_options'); ?>
            <?php do_settings_sections('plugin'); ?>

            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form></div>

<?php
}?>
<?php // add the admin settings and such
add_action('admin_init', 'plugin_admin_init');
function plugin_admin_init(){
    register_setting( 'plugin_options', 'plugin_options', 'plugin_options_validate' );
    add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
    add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
}?>
<?php function plugin_setting_string() {
    $options = get_option('plugin_options');
    echo "<input id='plugin_text_string' name='plugin_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
} ?>
<?php // validate our options
function plugin_options_validate($input) {
    $options = get_option('plugin_options');
    $options['text_string'] = trim($input['text_string']);
    if(!preg_match('/^[a-z0-9]{32}$/i', $options['text_string'])) {
        $options['text_string'] = '';
    }
    return $options;
}
?>