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
     * Aktivace pluginu.
     *
     * Funkce obsahuje vše co se musí udělat během aktivace pluginu.
     *
     * @since    1.0.0
     */
    public function activate()
    {
        $this->create_table_gifts();
        $this->insert_gifts_to_db();

        // TODO volání vytvoření tabulky na položky dárku
    }

    /**
     * Vrací jméno tabulky pro dárky.
     *
     * @since 1.0.0
     * @return string Jméno tabulky
     */
    public function get_gifts_table_name()
    {
        global $wpdb;
        return $wpdb->prefix . 'ucime_online_gifts';
    }

    /**
     * Vytvoření tabulky dárků.
     *
     * Vytvoří tabulku pro uložení dárků pro darujme
     *
     * @since 1.0.0
     */
    protected function create_table_gifts()
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql_create_table = "CREATE TABLE `" . $this->get_gifts_table_name() . "` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `amount_for_itself` int(11) NOT NULL,
              `amount_for_company` int(11) NOT NULL,
              `default_counter` int(11) NOT NULL,
              `gift_name` varchar(200) NOT NULL,
              `highlight` tinyint(1) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        maybe_create_table($this->get_gifts_table_name(), $sql_create_table);
    }

    /**
     * Vložení dárků do tabulky v databázi.
     *
     * @since 1.0.0
     */
    protected function insert_gifts_to_db()
    {
        global $wpdb;

        $wpdb->insert($this->get_gifts_table_name(), array('amount_for_itself' => 600, 'amount_for_company' => 10000, 'default_counter' => 0, 'gift_name' => 'Dárek 1', 'highlight' => false));
        $wpdb->insert($this->get_gifts_table_name(), array('amount_for_itself' => 1800, 'amount_for_company' => 30000, 'default_counter' => 1, 'gift_name' => 'Dárek 2', 'highlight' => false));
        $wpdb->insert($this->get_gifts_table_name(), array('amount_for_itself' => 10000, 'amount_for_company' => 50000, 'default_counter' => 0, 'gift_name' => 'Dárek 3', 'highlight' => true));
    }

    /**
     * Vrací jméno tabulky pro položky dárků.
     *
     * @since 1.0.0
     * @return string Jméno tabulky
     */
    public function get_gift_items_table_name()
    {
        global $wpdb;
        return $wpdb->prefix . 'ucime_online_gift_items';
    }

    /**
     * Vytvoření tabulky položek dárků.
     *
     * @since 1.0.0
     */
    protected function create_table_gift_items()
    {
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        //  TODO dopsat SQL dotaz
        $sql_create_table = "";

        maybe_create_table($this->get_gift_items_table_name(), $sql_create_table);
    }

}
