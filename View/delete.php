<?php
namespace View;

?>
<h1>Bạn chắc chắn muốn xóa khách hàng này?</h1>
<h3><?php echo $customer->getName(); ?></h3>
<form action="./index.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $customer->getId() ?>">
    <div>
        <input type="submit" value="Delete">
        <a href="index.php"><input type="button" value="Cancel"></a>
    </div>
</form>