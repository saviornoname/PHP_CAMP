<form action="register" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" value="">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="">
    <br>

    <label for="confirm_password">Confirm password</label>
    <input type="password" name="confirm_password" id="confirm_password" value="">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="">
    <br>

    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="">
    <br>

    <label for="lastname">Lastmame</label>
    <input type="text" name="lastname" id="lastname" value="">
    <br>

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="">
    <br>

    <label for="age">Age</label>
    <input type="number" name="age" id="age" value="">
    <br>

    <label for="Sex">Sex</label>
    <label for="male">Male</label>
    <input type="radio" name="sex" id="male" value="1"
    <label for="female">Female</label>
    <input type="radio" name="sex" id="female" value="2">
    <br>

    <input type="submit" value="Send" name="send">
</form>
<?php
    if(!empty($data['errors'])) :
        foreach ($data['errors'] as $key => $value) : ?>
            <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
        <?php endforeach;
    endif;
?>