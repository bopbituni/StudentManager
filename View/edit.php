<?php

namespace View;

?>
<h2>Cập nhật thông tin khách hàng</h2>
<form method="post" action="./index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $customer->getId() ?>">
    <br>
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $customer->getName() ?>">
    <br>
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $customer->getEmail() ?>">
    <br>
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $customer->getAddress() ?>">
    <br>
    <input type="submit" value="Update">
    <a href="index.php">Cancel</a>
</form>
