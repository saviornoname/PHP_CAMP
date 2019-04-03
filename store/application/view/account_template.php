<table>
    <caption>User</caption>
    <thead>
    <tr>
        <th>№</th>
        <th>Login</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Sex</th>
    </tr>
    </thead>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['login'] ?></td>
            <td><?= $data['firstname'] ?></td>
            <td><?= $data['lastname'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['phone'] ?></td>
            <td><?= $data['sex'] == 1 ? 'Male' : 'Female' ?></td>
        </tr>
</table>

<?php if($data['Role'] == 1):?>
    <a href="accountAdmin">Admin</a><br><br>
<?php endif; ?>

<br><a href="addAddress">Add Address</a><br>
<br><a href="edit">Edit</a><br>
<br><a href="logout">Logout</a>
