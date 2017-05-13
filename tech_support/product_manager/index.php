<?php
require('../model/database.php');
require('../model/product_functions.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}


switch($action) {
    case 'list_products':
        // list all products
        $products = get_all_products();
        include('product_list.php');
        break;

    case $action == 'delete_product':
        // delete a product
        $code = filter_input(INPUT_POST, 'ProdCode');
        if ($code == NULL || $code == FALSE) {
            $error = "Missing or incorrect product code.";
            include('../errors/error.php');
        } else {
            delete_product($code);
            header("Location: .");
        }
        break;

    case 'display_add_form':
        // call page to add a product
        include('product_add.php');
        break;

    case 'add_product':
        // add a product
        $PID = filter_input(INPUT_POST, 'PID');
        $CID = filter_input(INPUT_POST, 'CID');
        $prodCode = filter_input(INPUT_POST, 'ProdCode');
        $prodName = filter_input(INPUT_POST, 'ProdName');
        $prodPrice = filter_input(INPUT_POST, 'ProdPrice');
        if ($PID == NULL || $PID == FALSE ||
            $CID == NULL || $CID == FALSE ||
            $prodCode == NULL || $prodCode == FALSE ||
            $prodName == NULL || $prodName == FALSE ||
            $prodPrice == NULL || $prodPrice == FALSE) {
            $error = "All fields were not filled out correctly";
            include('../errors/error.php');
        } else {
            add_product($PID, $CID, $prodCode, $prodName, $prodPrice );
            header("Location: .");
        }
        break;

    default:
        display_error("Unknown action: " . $action);
        break;
}
?>