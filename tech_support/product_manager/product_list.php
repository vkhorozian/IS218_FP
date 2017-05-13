<?php include '../view/header.php'; ?>
<main>
    <h1>Product List</h1>

    <div id="main">
        <!-- display a table of products -->
        <table>
            <tr>
                <th>productID</th>
                <th>categoryID</th>
                <th>productName</th>
                <th>productCode</th>
                <th>productPrice</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productID']; ?></td>
                <td><?php echo $product['categoryID']; ?></td>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName'];  ?></td>
                <td><?php echo $product['listPrice'];  ?></td>
                <!-- delete the product -->
                <td><form action="" method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="code"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=display_add_form">Add Product</a></p>
    </div>
</main>
<?php include '../view/footer.php'; ?>