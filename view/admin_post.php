<?php
require_once '../controler/admin_postcontroler.php';
?>
<h1>Manage Posts</h1>

<?php if (!empty($error)) { ?>
    <div class="error" style="color:red;margin-bottom:10px;">
        <?php echo $error; ?>
    </div>
<?php } ?>

<form method="POST" action="">
    <table>
        <thead>
            <tr>
                <th>SN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Topic</th>
                <th>Status</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($posts as $index => $post) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>" . $post['author'] . "</td>";
                echo "<td>" . $post['title'] . "</td>";
                echo "<td>" . $post['topic'] . "</td>";
                echo "<td>" . $post['publish'] . "</td>";
                echo "<td><input type='checkbox' name='postSelect[]'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="feature-post-action">
        <button type="submit" name="add_feature" class="add-feature-btn">Add Feature Post</button>
        <button type="submit" name="delete_post" class="add-delete-btn">Delete Post</button>
    </div>
</form>

<div class="actions">
    <button class="trash">Trash</button>
    <button class="add-post">Add Post</button>
</div>