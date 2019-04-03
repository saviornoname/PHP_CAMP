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
        <th>Age</th>
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
        <td><?= $data['age'] ?></td>
        <td><?= $data['sex'] == 1 ? 'Male' : 'Female' ?></td>
    </tr>
</table>

<a href="addAddress">Add Address</a><br>
<a href="edit">Edit</a><br>
<a href="logout">Logout</a><br>
<a href="/store/category">All Categories</a><br>
<a href="/store/product">All Products</a><br>
<a href="/store/user/allUser">All Users</a>
