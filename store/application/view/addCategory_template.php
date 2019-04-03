<form action="addCategory" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="">
    <label for="parent_id">Parent</label>
    <select name="parent_id" id="parent_id">
        <option selected value=0> Pleas, select </option>
        <?php foreach ($data['category'] as $key => $value) :?>
            <option value="<?= $key ?>">
                <?= $value['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Send" name="send">

</form>
<br>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= $value; ?></span><br>
    <?php endforeach;
endif;
?>

<a href="/store/category">All Category</a>

