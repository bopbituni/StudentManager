<?php
namespace View;

?>

<table border="1">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $key => $customer): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $customer->getName() ?></td>
        <td><?php echo $customer->getEmail() ?></td>
        <td><?php echo $customer->getAddress() ?></td>
        <td><a href="./index.php?page=delete&id=<?php echo $customer->getId() ?>">Delete</a></td>
        <td><a href="./index.php?page=edit&id=<?php echo $customer->getId(); ?>">Update</a></td>
            <?php endforeach; ?>
    </tbody>
</table>
<a href="./index.php?page=add">Add</a>