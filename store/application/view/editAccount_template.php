<form action="edit" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" readonly value="<?= $data['loggedUser']['login']?>"><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $data['loggedUser']['email']?>"><br>

    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?= $data['loggedUser']['firstname']?>"><br>

    <label for="lastname">Lastmame</label>
    <input type="text" name="lastname" id="lastname" value="<?= $data['loggedUser']['lastname']?>"><br>

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="<?= $data['loggedUser']['phone']?>"><br>

    <label for="age">Age</label>
    <input type="number" name="age" min="0" max="120" id="age" value="<?= $data['loggedUser']['age']?>"><br>

    <br><label><b>Sex:</b></label>
    <label for="male">Male</label>
    <input type="radio" name="sex" id="male" value="1" <?= ($data['loggedUser']['sex'] == 1) ?  'checked' : ''; ?>>

    <label for="female">Female</label>
    <input type="radio" name="sex" id="female" value="2" <?= ($data['loggedUser']['sex'] == 2) ? 'checked' : '';?>><br>

    <input type="submit" value="Edit" name="send">
</form>

<a href="/store/user/account">account</a>
<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>