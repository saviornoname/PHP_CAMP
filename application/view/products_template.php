<span>Products</span>

<table>
    <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Sku</th>
            <th>Description</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <?php foreach ($data['products'] as $key => $row): array_map('htmlentities', $row); ?>
            <td><?= $row['productID'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['cost'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['sku'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['CategoryName'] ?></td>
            <td><img width="122" src="<?= ($row['image']) ?? '' ?>"></td>
            <td>
                <a href="product/editProduct/?<?php echo http_build_query($row) . '"'?>>Edit</a>/
                <a href="product/deleteProduct/?<?php echo http_build_query($row) . '"'?>>Delete</a>
            </td>

        </tr>
    <?php endforeach; ?>
</table></br>

<br>
<a href="product/addProduct">AddProduct</a>
<br>
<a href="/store/user/account">Account</a>


<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>