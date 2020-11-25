<?php

/**
 * Fired during plugin activation
 *
 * @link       https://efox.cloud
 * @since      1.0.0
 *
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/includes
 */


/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/includes
 * @author     Tomas Krutis <tomas.krutis@efox.cloud>
 */
class Ucime_Online_Darujme_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public function activate()
    {

        global $wpdb;

        if ($wpdb->get_var("SHOW tables like '" . $this->uo_darujme_table() . "'") != $this->uo_darujme_table()) {

            // dynamic table generating code
            $table_query = ''; // TODO table create query

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            //dbDelta($table_query);
        }

    }

    public function uo_darujme_table()
    {
        global $wpdb;
        return $wpdb->prefix . 'darujme_table';
    }

}
