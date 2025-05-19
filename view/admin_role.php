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
        
        $users = [
            ["id" => 1, "username" => "admin", "email" => "admin@example.com", "role" => "Admin"],
            ["id" => 2, "username" => "john_doe", "email" => "john@example.com", "role" => "user"],
            ["id" => 3, "username" => "jane_smith", "email" => "jane@example.com", "role" => "Subscriber"]
        ];

       foreach ($users as $index => $user) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>" . $user['username'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "<td>" . $user['role'] . "</td>";
    echo '<td>
            <select name="role">
                <option value="admin" ' . ($user['role'] == 'Admin' ? 'selected' : '') . '>Admin</option>
                <option value="user" ' . ($user['role'] == 'User' ? 'selected' : '') . '>User</option>
                <option value="subscriber" ' . ($user['role'] == 'Subscriber' ? 'selected' : '') . '>Subscriber</option>
            </select>
        </td>';
    echo "</tr>";
}
        ?>
    </tbody>
</table>
<div class="feature-post-action">
    <button type="submit"class="add-feature-btn">Save</button>