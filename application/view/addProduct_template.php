<form action="addProduct" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="">
    <br>

    <label for="cost">Cost</label>
    <input type="number" name="cost" id="cost" value="" step=".01">
    <br>

    <label for="sku">Sku</label>
    <input type="text" name="sku" id="sku" value="">
    <br>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="" step=".">
    <br>

    <label for="description">Description</label>
    <textarea name="description" id="description" value=""></textarea>
    <br>

    <label for="image">Image</label>
    <input type="file" name="image" id="image">
    <br>

    <label for="description">Category</label>
    <select name="categoryID" id="categoryID">
        <option selected value=0> Pleas, select </option>
        <?php foreach ($data['allCategory'] as $key => $value) :?>
            <option <?php echo '' ; ?>
                value="<?= $key;?>"> <?= $value['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Send" name="send">
</form>
<?php
    if(!empty($data['errors'])) :
        foreach ($data['errors'] as $key => $value) : ?>
            <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
        <?php endforeach;
    endif;
?>