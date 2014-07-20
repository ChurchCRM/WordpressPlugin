<?php
function familyAdd( $atts ) {
    $a = shortcode_atts( array(
        'size' => '6'
    ), $atts );

    ob_start();
    // ANGULARJS DIRECTIVE OUTPUT WITH VARS (IF DEFINED)
    echo '<ng-family></ng-family>';
    foreach ($a as $key => $value) {
        if($key == 'size') {
            for($i = 0; $i < $value;$i++)
            {
                echo '<ng-member>$value</ng-member>';
            }
        }
    }

    return ob_get_clean();
}


add_shortcode( 'churchinfo-add-family', 'familyAdd' );

?>