<?php

/**
 * Fired during plugin activation
 *
 * @link       https://razrabotkasajta.biz
 * @since      1.0.0
 *
 * @package    Constructors
 * @subpackage Constructors/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Constructors
 * @subpackage Constructors/includes
 * @author     Mykola Bok <mukasbok@gmail.com>
 */
class Constructors_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function createConstructorname()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "constructor_category";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE " . $table_name . " (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time bigint(11) DEFAULT '0' NOT NULL,
				name tinytext NOT NULL,
				text text NOT NULL,
				UNIQUE KEY id (id)
			  );";
			$sql1 = `CREATE TABLE constructor_subcategory (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time bigint(11) DEFAULT '0' NOT NULL,
				name tinytext NOT NULL,
				text text NOT NULL,
				src text NOT NULL,
				UNIQUE KEY id (id)
			  );`;
			$sql2 = `CREATE TABLE const_category_subcategory (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				id_category bigint(11) NOT NULL,
				id_subcategory bigint(11) NOT NULL,
				UNIQUE KEY id (id)
			  );`;
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			dbDelta($sql1);
			dbDelta($sql2);
		}
	}
	public static function activate()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "constructor";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE " . $table_name . " (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time bigint(11) DEFAULT '0' NOT NULL,
				name tinytext NOT NULL,
				text text NOT NULL,
				url VARCHAR(55) NOT NULL,
				UNIQUE KEY id (id)
			  );";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
}
