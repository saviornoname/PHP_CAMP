<label>Do you want delete category
    <?php echo !empty($data['name']) ? '<b>' . $data['name'] . '?</b>' : '';?>
</label><br>
<form action="/store/category/deleteCategory" method="post">
    <input type="hidden" value="<?php echo $data['name']?>" name="name">
    <input type="submit" value="Yes" name="Yes">
</form>

<form action="/store/category" method="post">
   <input type="submit" value="No">
</form>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= $value; ?></span><br>
    <?php endforeach;
endif;
?>
<a href="/store/category">All Category</a>

