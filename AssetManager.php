<?php

require_once 'Asset.php';

class AssetManager {
    private $assets;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['assets'])) {
            $_SESSION['assets'] = [];
        }
        $this->assets = &$_SESSION['assets'];
    }

    public function addAsset($data) {
        $asset = new Asset($data);
        $this->assets[] = $asset;
    }

    public function editAsset($index, $data) {
        if (isset($this->assets[$index])) {
            $this->assets[$index] = new Asset($data);
        }
    }

    public function deleteAsset($index) {
        if (isset($this->assets[$index])) {
            unset($this->assets[$index]);
            $this->assets = array_values($this->assets);
        }
    }

    public function getAssets() {
        return $this->assets;
    }

    public function getAsset($index) {
        return isset($this->assets[$index]) ? $this->assets[$index] : null;
    }
}
