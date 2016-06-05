<?php namespace KekecMed\Theme\Component;

use Illuminate\Support\Facades\Auth;

class ViewComponent {

    private static $instance = null;

    private function __construct() {

    }

    public function getUser() {
        return Auth::user();
    }

    public function getTitle() {
        return "&#10084; KekecMED";
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
