<?php
/**
 * @package parthi
 */

namespace Inc\Api;

class SettingsApi {
    public function register() {
        if(!empty($this->admin_pages)){

        }
    }

    public function Addpages(array $pages) {
        $this ->admin_pages = $pages;
        return $this;
    }

}