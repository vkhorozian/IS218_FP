<?php

function get_all_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY listPrice DESC';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($code) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productCode = :code';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(":productCode", $code);
        $statement->execute();
        $product = $statement->fetch();
        $statement->closeCursor();
        return $product;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function delete_product($code) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $code);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($PID, $CID, $prodCode, $prodName, $prodPrice) {
    global $db;
    $query = 'INSERT INTO products
                 (productID, categoryID, productCode, productName, listPrice)
              VALUES
                 (:PID, :CID, :prodCode, :prodName, :prodPrice)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $PID);
    $statement->bindValue(':categoryID', $CID);
    $statement->bindValue(':productCode', $prodCode);
    $statement->bindValue(':productName', $prodName);
    $statement->bindValue(':listPrice', $prodPrice);
    $statement->execute();
    $statement->closeCursor();
}



?>