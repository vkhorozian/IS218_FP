<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>ProductID:</label>
        <input type="text" name="PID" /> <br>


        <label>CategoryID:</label>
        <input type="text" name="CID" /> <br>


        <label>Product Code:</label>
        <input type="text" name="ProdCode" /> <br>

        
        <label>Product Name:</label>
        <input type="text" name="ProdName" /> <br>


        <label>List Price:</label>
        <input type="text" name="ProdPrice" /> <br>


        <label>&nbsp;</label>
        <input type="submit" value="Add Product" /> <br>

    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>