<label>Do you want delete this User
    <?php echo !empty($data['login']) ? '<b>' . $data['login'] . '?</b>' : '';?>
</label><br>
<form action="/store/customer/deleteUser" method="post">
    <input type="hidden" value="<?= $data['login']?>" name="login">
    <input type="submit" value="Yes" name="Yes">
</form>

<form action="/store/customer/allUser" method="post">
   <input type="submit" value="No">
</form>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= $value; ?></span><br>
    <?php endforeach;
endif;
?>
<a href="/store/user/allUser">All Users</a>

