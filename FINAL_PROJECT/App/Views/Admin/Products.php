<?php
include_once '../Layouts/Header.php';
?>
    <div class="product-container">
        <h1>Product Management</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Add New Product</h2>
            <label for="merchant_id">Merchant ID:</label>
            <input type="number" name="merchant_id" required><br>

            <label for="name">Product Name:</label>
            <input type="text" name="name" required><br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br>

            <label for="price">Price:</label>
            <input type="text" name="price" required><br>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" required><br>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" accept="image/*" required><br>

            <input type="submit" name="add_product" value="Add Product">
        </form>

        <h2>Product List</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Merchant ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php if (isset($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['merchant_id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td><img src="../../Public/Uploads/Products/<?php echo $product['product_image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
                    <td>
                        <a href="?delete=<?php echo $product['product_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No products found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<?php include_once '../Layouts/Footer.php'; ?>
