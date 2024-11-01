<?php

abstract class Sorting_Option_In_Network_Search_For_BuddyBoss_Plugins_Dependency {

    function __construct() {

        add_filter( 'sorting-option-in-network-search-for-buddyboss-load', array( $this, 'boilerplate_load' ) );
    }

    /**
     * Get the currnet plugin paths
     */
    public function get_plugin_name() {

        $plugin_data = get_plugin_data( SORTING_OPTION_IN_NETWORK_SEARCH_FOR_BUDDYBOSS_FILES );
		return $plugin_data['Name'];
    }

    /**
     * Load this function on plugin load hook
     */
    public function boilerplate_load( $load ){

        if( empty( $this->constact_define() ) ) {
            $load = false;

            $this->constact_not_define_hook();
        } elseif ( $this->constact_define() && empty( $this->constact_mini_version() ) ) {
            $load = false;

            $this->constact_mini_version_hook();
        }

        return $load;
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_define(){
        $string = (string) $this->constact_name();
        if ( defined( $string ) ) {
            return true;
        }
        return false;
    }

    /**
     * Load this function on plugin load hook
     */
    function constact_version(){
        return constant( $this->constact_name() );
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_mini_version(){

        if ( version_compare( $this->constact_version(), $this->mini_version() , '>=' ) ) {
            return true;
        }
        return false;
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_not_define_hook(){
        if ( defined( 'WP_CLI' ) ) {
            WP_CLI::warning( $this->constact_not_define_message() );
        } else {
            add_action( 'admin_notices', array( $this, 'constact_not_define_message' ) );
            add_action( 'network_admin_notices', array( $this, 'constact_not_define_message' ) );
        }
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_mini_version_hook(){
        if ( defined( 'WP_CLI' ) ) {
            WP_CLI::warning( $this->constact_mini_version_message() );
        } else {
            add_action( 'admin_notices', array( $this, 'constact_mini_version_message' ) );
            add_action( 'network_admin_notices', array( $this, 'constact_mini_version_message' ) );
        }
    }

    /**
     * Load this function on plugin load hook
     */
    public function error_message( $call ){
        echo '<div class="error fade"><p>';
            $this->$call();
        echo '</p></div>';
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_not_define_message(){
        $this->error_message( 'constact_not_define_text' );
    }

    /**
     * Load this function on plugin load hook
     */
    public function constact_mini_version_message(){
        $this->error_message( 'constact_mini_version_text' );
    }

    /**
     * Load this function on plugin load hook
     * Example: _e('<strong>BuddyBoss Sorting Option In Network Search</strong></a> requires the BuddyBoss Platform plugin to work. Please <a href="https://buddyboss.com/platform/" target="_blank">install BuddyBoss Platform</a> first.', 'sorting-option-in-network-search-for-buddyboss');
     */
    abstract function constact_not_define_text();

    /**
     * Load this function on plugin load hook
     * Example: printf( __('<strong>BuddyBoss Sorting Option In Network Search</strong></a> requires BuddyBoss Platform plugin version %s or higher to work. Please update BuddyBoss Platform.', 'sorting-option-in-network-search-for-buddyboss'), BP_PLATFORM_VERSION_MINI_VERSION );
     */
    abstract function constact_mini_version_text();

    /**
     * Load this function on plugin load hook
     */
    abstract function constact_name();

    /**
     * Load this function on plugin load hook
     */
    abstract function mini_version();
}