<form action="/store/customer/editCustomer" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" readonly value="<?= $data['dataUser']['login']?>">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $data['dataUser']['email']?>">

    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?= $data['dataUser']['firstname']?>">

    <label for="lastname">Lastmame</label>
    <input type="text" name="lastname" id="lastname" value="<?= $data['dataUser']['lastname']?>">

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="<?= $data['dataUser']['phone']?>">

    <label for="age">Age</label>
    <input type="number" name="age" min="0" max="120" id="age" value="<?= $data['dataUser']['age']?>">

    <br><label>Sex</label><br>
    <label for="male">Male</label>
    <input type="radio" name="sex" id="male" value="1" <?= ($data['dataUser']['sex'] == 1) ?  'checked' : ''; ?>>
    <br>
    <label for="female">Female</label>
    <input type="radio" name="sex" id="female" value="2" <?= ($data['dataUser']['sex'] == 2) ? 'checked' : '';?>>
    <br>

    <input type="submit" value="Send" name="send">
</form>

<a href="/store/user/account">account</a><br>
<a href="/store/customer/allUser">All account</a><br>

<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>