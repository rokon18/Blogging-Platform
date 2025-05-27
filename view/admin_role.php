<?php 
require_once '../controler/admin_rolecontroler.php';
?>
<h1>User Management</h1>

<?php if (!empty($error)) { ?>
    <div class="error" style="color:red;margin-bottom:10px;"><?php echo $error; ?></div>
<?php } ?>
<?php if (!empty($success)) { ?>
    <div class="success" style="color:green;margin-bottom:10px;"><?php echo $success; ?></div>
<?php } ?>

<form method="POST" action="">
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
            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
            echo '<td>
                <select name="role[' . $user['id'] . ']">
                    <option value="Admin"' . ($user['role'] == 'Admin' ? ' selected' : '') . '>Admin</option>
                    <option value="User"' . ($user['role'] == 'User' ? ' selected' : '') . '>User</option>
                    <option value="Subscriber"' . ($user['role'] == 'Subscriber' ? ' selected' : '') . '>Subscriber</option>
                </select>
            </td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<div class="feature-post-action">
    <button type="submit" class="add-feature-btn">Save</button>
</div>
</form>