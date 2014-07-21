<?php
/*  Copyright 2014  Church Info

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class ChurchInfoDatabase
{
    private $db;

    public function __construct() {
        // Connect To Database
        $dbSettings = getSettings();

        try {
            $this->db = new wpdb($dbSettings[ci_db_user],
                $dbSettings[ci_db_pass],
                $dbSettings[ci_db_name],
                $dbSettings[ci_db_host]);
            $this->db->show_errors(); // Debug

        } catch (Exception $e) {	// Database Error
            echo $e->getMessage();
        }
    }

    private function getSettings() {
        return get_option( 'churchinfo_plugin_settings' );
    }

    private function isDataSourceEnabled() {
        $value = false;
        if (getSettings()[ci_source_data_on] == "on") {
            $value = true;
        }
        return $value;
    }

    private function getDataSourceFamilyFieldName() {
        return getSettings()[ci_source_data_name];
    }

    private function getDataSrouceFamilyValue() {
        return getSettings()[ci_source_data_value];
    }

    // get the name of the column to store the source value
    private function getFamilySourceColName() {
        $name = getDataSourceFamilyFieldName();
        return $this->$familySourceColName = $this->db->get_var("SELECT fam_custom_Field FROM family_custom_master where fam_custom_Name = '$name';");
    }

    //TODO Create Family

    //TODO Create Person

    //TODO link Persons to Family
}

$ChurchInfo_DB = new ChurchInfoDatabase();
?>