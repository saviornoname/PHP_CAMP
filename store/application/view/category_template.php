<span>Categories</span>
<table>
    <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Parent name</th>
            <th>Action</th>

        </tr>
    </thead>
    <?php foreach ($data['category'] as $key => $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= ($row['parentId'] == 0 || empty($data['category'][$row['parentId']]['name']))
                    ? 'No parent'
                    :  $data['category'][$row['parentId']]['name'] ?>
            </td>
            <td>
                <a href="category/editCategory/?name=<?= $row['name'] . '&id=' . $key . '&parent=' . $row['parentId'] . '"'?>>
                    Edit
                </a>/
                <a href="category/deleteCategory/?name=<?= $row['name'] . '"'?>>Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table></br>

<a href="category/addCategory">Add</a>
<br>
<a href="/store/user/account">Account</a>


<?php
if(!empty($data['errors'])) :
    foreach ($data['errors'] as $key => $value) : ?>
        <span><?= ucfirst($key+1) ?> - <?= $value; ?></span><br>
    <?php endforeach;
endif;
?>