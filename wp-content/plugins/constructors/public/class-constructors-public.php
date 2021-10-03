<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://razrabotkasajta.biz
 * @since      1.0.0
 *
 * @package    Constructors
 * @subpackage Constructors/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Constructors
 * @subpackage Constructors/public
 * @author     Mykola Bok <mukasbok@gmail.com>
 */
class Constructors_Public
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
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Constructors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Constructors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/constructors-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts2(){

	}
	public function enqueue_scripts()
	{
		

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Constructors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Constructors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/constructors-public.js', array('jquery'), $this->version, true);
	wp_enqueue_script($this->plugin_name . "2", plugin_dir_url(__FILE__) . 'js/constructor-move.js', array('jquery'), 3, true);
		
	}
	public function intialization()
	{
		
	}
	public function make_plugin()
	{
		add_shortcode('show_constructor', array($this, 'intialization'));
	}
}
