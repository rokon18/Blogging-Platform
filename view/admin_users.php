<?php require_once '../controler/admin_usercontroler.php'; ?>
<h1>User Management</h1>
<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $index => $user) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo '<td>
                <form method="POST" action="" >
                    <input type="hidden" name="delete_id" value="' . $user['id'] . '">
                    <button type="submit" class="delete-btn" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            </td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>