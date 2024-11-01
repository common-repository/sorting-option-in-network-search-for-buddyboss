<?php

class Sorting_Option_In_Network_Search_For_BuddyBoss_Platform_Dependency extends Sorting_Option_In_Network_Search_For_BuddyBoss_Plugins_Dependency {
    /**
     * Load this function on plugin load hook
     * Example: _e('<strong>BuddyBoss Sorting Option In Network Search</strong></a> requires the BuddyBoss Platform plugin to work. Please <a href="https://buddyboss.com/platform/" target="_blank">install BuddyBoss Platform</a> first.', 'sorting-option-in-network-search-for-buddyboss');
     */
    function constact_not_define_text(){
        printf( 
            __( 
                '<strong>%s</strong></a> requires the BuddyBoss Platform plugin to work. Please <a href="https://buddyboss.com/platform/" target="_blank">install BuddyBoss Platform</a> first.',
                'sorting-option-in-network-search-for-buddyboss'
            ),
            $this->get_plugin_name()
        );
    }

    /**
     * Load this function on plugin load hook
     * Example: printf( __('<strong>BuddyBoss Sorting Option In Network Search</strong></a> requires BuddyBoss Platform plugin version %s or higher to work. Please update BuddyBoss Platform.', 'sorting-option-in-network-search-for-buddyboss'), $this->mini_version() );
     */
    function constact_mini_version_text() {
        printf( 
            __( 
                '<strong>%s</strong></a> requires BuddyBoss Platform plugin version %s or higher to work. Please update BuddyBoss Platform.',
                'sorting-option-in-network-search-for-buddyboss'
            ),
            $this->get_plugin_name(),
            $this->mini_version()
        );
    }

    /**
     * Load this function on plugin load hook
     */
    function constact_name(){
        return 'BP_PLATFORM_VERSION';
    }

    /**
     * Load this function on plugin load hook
     */
    function mini_version(){
        return '2.3.0';
    }
}

new Sorting_Option_In_Network_Search_For_BuddyBoss_Platform_Dependency();