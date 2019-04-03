<label>Do you want delete product
    <?php echo !empty($data['name']) ? '<b>' . $data['name'] . '?</b>' : '';?>
</label><br>
<form action="/store/product/deleteProduct" method="post">
    <input type="hidden" value="<?php echo $data['name']?>" name="name">
    <input type="submit" value="Yes" name="Yes">
</form>

<form action="/store/product" method="post">
    <input type="submit" value="No">
</form>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= $value; ?></span><br>
    <?php endforeach;
endif;
?>
<a href="/store/product">All Products</a>

