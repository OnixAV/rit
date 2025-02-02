<?php
include 'Asset.php';
include 'AssetManager.php';

$assetManager = new AssetManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $index = intval($_POST['index']);
    $assetManager->deleteAsset($index);

    header('Location: index.php');
    exit();
}

$assets = $assetManager->getAssets();
