<form action="login" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" value=""><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value=""><br>

    <input type="submit" value="Send" name="send">
</form>

<br><a href="\store\user\register">Registration</a><br>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>