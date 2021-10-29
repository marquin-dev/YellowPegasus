<?php
require_once('../assets/php/functions/autoload.php');
require_once('../assets/php/functions/startSession.php');
require_once('../assets/php/functions/logError.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $root = dirname(dirname(__DIR__));
    $relativePath = '/www/assets/images/tenis.png';
    $fileName = $_FILES['imagem-input']['name'];
    $imgDestination = realpath($root . $relativePath) . '\\' . $fileName;
    $resourcePath = $_SERVER['HTTP_ORIGIN'] . $relativePath . "/($fileName)";
    $filePath = $relativePath . "/($fileName)";
    move_uploaded_file($_FILES['imagem-input']['img_name'], $imgDestination);

    $data = array(
        [$_POST['produto-input'], PDO::PARAM_STR],
        [$_POST['valor-input'], PDO::PARAM_STR],
        [$_POST['quantidade-input'], PDO::PARAM_STR],
        [$_POST['descricao-input'], PDO::PARAM_STR],
        [$filePath, PDO::PARAM_STR],

    );

    try {
        $products = new ProductsController();
        $result = $products->insertNewProduct($data);
    } catch(PDOException $e) {
        logError($e);
        header("Location: /insertProduct.php?internalError=true");
    }

    if ($result) {
        header("Location: /insertProduct.php?success=true&pdctName={$fileName}");
    } else {
        header("Location: /insertProduct.php?insertProductError=true");
    }

} else {
    echo 'Método GET';
}