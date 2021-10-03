<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://razrabotkasajta.biz
 * @since      1.0.0
 *
 * @package    Constructors
 * @subpackage Constructors/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Constructors
 * @subpackage Constructors/includes
 * @author     Mykola Bok <mukasbok@gmail.com>
 */
class Constructors
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Constructors_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	public $category;
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('CONSTRUCTORS_VERSION')) {
			$this->version = CONSTRUCTORS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'constructors';
		$this->make_plugin();
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Constructors_Loader. Orchestrates the hooks of the plugin.
	 * - Constructors_i18n. Defines internationalization functionality.
	 * - Constructors_Admin. Defines all hooks for the admin area.
	 * - Constructors_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-constructors-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-constructors-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-constructors-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-constructors-public.php';

		$this->loader = new Constructors_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Constructors_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Constructors_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Constructors_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Constructors_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts2');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Constructors_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
	public function my_plugin_template($templates)
	{
		// выбор шаблона в атрибутах
		$templates['constructors-public-display.php'] = 'Full Page';
		return $templates;
	}
	public function save_data__ajax_callback(){

	}
	public function find_category__ajax_callback($id = 0){
		for ($i=0; $i < count($this->category); $i++) { 
			$cat = $this->category[$i];
			for ($l=0; $l < count($cat['subcategory']); $l++) { 
				$sub = $cat['subcategory'][$l];
				if ($sub->id == $id) {
					return json_encode($sub);
				}
			}
		}
	}
	public function getCategory()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "constructor_category";
		$sql = "SELECT * FROM '$table_name'";
		$category = $wpdb->get_results($sql);
		$table_name = $wpdb->prefix . "const_category_subcategory";
		$sql = "SELECT * FROM '$table_name'";
		$cat_sub = $wpdb->get_results($sql);
		$table_name = $wpdb->prefix . "constructor_subcategory";
		$sql = "SELECT * FROM '$table_name'";
		$subcategory = $wpdb->get_results($sql);
		for ($i = 0; $i < count($category); $i++) {
			$cat = $category[$i];
			for ($a = 0; $a < count($cat_sub); $a++) {
				$c_sub = $cat_sub[$a];
				if ($cat->id == $c_sub->id_category) {
					$category[$i]['subcategory'][] = $c_sub->id_subcategory;
				}
			}
			for ($i = 0; $i < count($subcategory); $i++) {
				$sub = $subcategory[$i];
				for ($if = 0; $if < count($category[$i]['subcategory']); $if++) {
					$id = $category[$i]['subcategory'][$if];
					if ($sub->id == $id) {
						$category[$i]['subcategory'][$if] = $sub;
					}
				}
			}
		}
		return $category;
	}
	public function intialization()
	{
		set_query_var('category', $this->category);
		load_template(WP_PLUGIN_DIR . '/constructors/public/partials/constructors-public-display.php');
	}
	public function make_plugin()
	{
		$this->category = $this->getCategory();

		add_action('wp_ajax_find-category', 'find_category__ajax_callback');
		add_action('wp_ajax_save-data', 'save_data__ajax_callback');
		add_shortcode('show_constructor', array($this, 'intialization'));
	}
}
