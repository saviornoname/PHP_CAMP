<table>
    <caption>User</caption>
    <thead>
        <tr>
            <th>№</th>
            <th>Login</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Sex</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php foreach ($data['user'] as $key => $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['login'] ?></td>
            <td><?= $row['firstname'] ?></td>
            <td><?= $row['lastname'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['sex'] == 1 ? 'Male' : 'Female' ?></td>
            <td>
                <a href="/store/customer/editCustomer/?<?= http_build_query($row)?>">Edit</a>/
                <a href="/store/customer/deleteUser/?<?= 'login=' . $row['login']?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</br>
<a href="/store/customer/addCustomer">Add customer</a>
<br>
<a href="/store/user/account">Account</a>


<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>