<form action="addAddress" method="post">

    <label for="login">Login</label>
    <input type="text" name="login" id="login" value="<?= $data['loggedUser']['login']?>" readonly>
    <br>

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?= ($data['address']['address']) ? $data['address']['address'] : ''?>">
    <br>

    <label for="city">City</label>
    <input type="text" name="city" id="city" value="<?= ($data['address']['address']) ? $data['address']['city'] : ''?>">
    <br>

    <label for="country">Country</label>
    <input type="text" name="country" id="country" value="<?= ($data['address']['address']) ? $data['address']['country'] : ''?>">
    <br>

    <input type="submit" value="Send" name="send">
</form>

<a href="account">Account</a>

<?php
    if(!empty($data['errors'])) :
        foreach ($data['errors'] as $key => $value) : ?>
            <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
        <?php endforeach;
    endif;
?>