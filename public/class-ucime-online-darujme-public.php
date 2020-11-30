<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://efox.cloud
 * @since      1.0.0
 *
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/public
 * @author     Tomas Krutis <tomas.krutis@efox.cloud>
 */
class Ucime_Online_Darujme_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Aktivátor pluginu.
     *
     * @since   1.0.0
     * @access  private
     * @var     Ucime_Online_Darujme_Activator  $activator  Aktivátor pluginu
     */
    private $activator;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        require_once UCIME_ONLINE_DARUJME_PATH . 'includes/class-ucime-online-darujme-activator.php';
        $this->activator = new Ucime_Online_Darujme_Activator();

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ucime-online-darujme-public.css', array(), $this->version, 'all');

        // Bootstrap CDN CSS
        wp_register_style('ucime-online-darujme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_style('ucime-online-darujme-bootstrap');

        // DataTables CDN CSS
        wp_register_style('ucime-online-darujme-datatables', '//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css');
        wp_enqueue_style('ucime-online-darujme-datatables');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ucime-online-darujme-public.js', array('jquery'), $this->version, false);

        // Bootstrap CDN JS
        wp_register_script('ucime-online-darujme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
        wp_enqueue_script('ucime-online-darujme-bootstrap');

        // DataTables CDN JS
        wp_register_script('ucime-online-darujme-datatables', '//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js');
        wp_enqueue_script('ucime-online-darujme-datatables');

    }

    /**
     * Function for shortcode with Darujme integration.
     *
     * @since   1.0.0
     */
    public function shortcode_ucime_online_darujme($atts)
    {
        global $wpdb;

        $gifts = $wpdb->get_results(
            $wpdb->prepare(
                'SELECT * FROM ' . $this->activator->get_gifts_table_name(), ''
            )
        );

        //echo '<pre>';
        //print_r($gifts);

        ob_start();

        require_once UCIME_ONLINE_DARUJME_PATH . 'public/partials/ucime-online-darujme-public-display.php';
        $template = ob_get_contents();

        ob_end_clean();

        // tady nesmí být echo, ale return - jinak Oxygen Builder nevyrenderuje shortcode!!!
        return $template;
    }

}
