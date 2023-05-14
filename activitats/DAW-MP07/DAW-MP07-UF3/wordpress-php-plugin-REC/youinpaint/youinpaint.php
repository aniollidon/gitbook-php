<?php
/**
 * Plugin Name: YouInPaint Plugin
 * Plugin URI: http://boscdelacoma.cat
 * Description: Pràctica MP07.
 * Version: 0.1
 * Author: ELTEUNOM
 * Author URI:  http://boscdelacoma.cat
 **/

require_once("includes/custom-pages.php");

const YOUINPAINT_DB_VERSION = '1.0';
const YOUINPAINT_VERSION = '1.0';

function youinpaint_shortcode()
{
    $dataoutput = "";

    if (isset($_GET['yerror'])) {
        $dataoutput.= "<div class='youinpaint-error'>" . $_GET['yerror'] . "</div>";
    }

    if (isset($_GET['success'])) {
        $url = plugin_dir_url(__FILE__) . "/uploads/" . $_GET['success'] . ".png";
        $dataoutput.= youinpaint_player($url);
    } else {
        $dataoutput.= youinpaint_input();
    }

    return $dataoutput;
}

function exemple_shortcode()
{
    return "<div class='exemple'>Exemple de shortcode</div>";
}

//TODO: Afegir la funcionalitat restant...

add_shortcode('youinpaint', 'youinpaint_shortcode');
add_shortcode('exemple', 'exemple_shortcode');
