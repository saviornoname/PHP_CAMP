<form action="/store/category/editCategory" method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" readonly value="<?= $data['dataCategory']['id']?>">

    <label for="name">Name</label>
    <input type="name" name="name" id="email" value="<?= $data['dataCategory']['name']?>">

    <label for="parent">Parent</label>
    <select name="parent" id="parent">
        <option selected value=0> Pleas, select </option>
        <?php unset($data['allCategory'][$data['dataCategory']['id']]); ?>
        <?php foreach ($data['allCategory'] as $key => $value) :?>
            <option value="<?= $key ?>" <?= $data['dataCategory']['parent'] == $key ? 'selected' : '' ?>>
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

<br><a href="/store/category">All Category</a>

