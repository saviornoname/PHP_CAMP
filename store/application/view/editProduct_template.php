<form action="editProduct" method="post" enctype="multipart/form-data">
    <label for="productID">ID</label>
    <input type="text" name="productID" id="productID" value="<?= $data['dataProduct']['productID']?>">
    <br>

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= $data['dataProduct']['name']?>">
    <br>

    <label for="cost">Cost</label>
    <input type="number" name="cost" id="cost" value="<?= $data['dataProduct']['cost']?>" step=".01">
    <br>

    <label for="sku">Sku</label>
    <input type="text" name="sku" id="sku" value="<?= $data['dataProduct']['sku']?>">
    <br>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="<?= $data['dataProduct']['quantity']?>" step=".">
    <br>

    <label for="description">Description</label>
    <textarea name="description" id="description"><?= $data['dataProduct']['description']?></textarea>
    <br>

    <label for="image">Image</label>
    <input type="file" name="image" id="image">
    <br>
    <br>
    <img width="122" src="/store/<?=($data['dataProduct']['image']) ?? '' ?>">
    <label for="description">Category</label>
    <select name="categoryID" id="categoryID">
        <option selected value=0> Pleas, select </option>
        <?php foreach ($data['allCategory'] as $key => $value) :?>
            <option value="<?= $key ?>" <?= $data['dataProduct']['CategoryName'] == $value['name'] ? 'selected' : '' ?>>
                <?= $value['name'] ?>
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