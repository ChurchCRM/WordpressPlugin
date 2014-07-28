<?php

/*
Plugin Name: Church Info
Plugin Script: plugin.php
Plugin URI: https://github.com/ChurchInfo
Description: This is a plugin adding a Family/People to the Church Info DB.
Version: 1.0
Author: George Dawoud
Author URI: http://blog.dawouds.com
License: GPL2

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

define('CHURCH_INFO_FILE', __FILE__);
define('CHURCH_INFO_PATH', plugin_dir_path(__FILE__));

if (!defined('CHURCH_INFO_VERSION_KEY'))
    define('CHURCH_INFO_VERSION_KEY', 'CHURCH_INFO_VERSION');

if (!defined('CHURCH_INFO_VERSION_NUM'))
    define('CHURCH_INFO_VERSION_NUM', '1.0.0');

add_option(MYPLUGIN_VERSION_KEY, MYPLUGIN_VERSION_NUM);

require_once('includes/options.php');
require_once('includes/angularjs.php');
require_once('includes/shortcodes.php');
require_once('includes/churchinfo.php');
require_once('includes/churchinfodb.php');

?>