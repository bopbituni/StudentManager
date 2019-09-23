<?php
//namespace View;
//echo "Hello";die();
?>
<h1>Thêm mới khách hàng</h1>
<form method="post">
    <table>
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>
                <button type="submit">Xác nhận</button>
            </td>
            <td>
                <button onclick="window.history.go(-1); return false;">Hủy</button>
            </td>
        </tr>
    </table>
</form>
