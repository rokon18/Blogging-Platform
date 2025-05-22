<?php
require_once '../controler/collection_controller.php';
?>
<h1>Manage Collections</h1>

<link rel="stylesheet" href="../assets/css/admin_collection.css">

<script src="../assets/js/admin_collection.js"></script>
<?php if (isset($error) && !empty($error)) { ?>
    <div class="error" style="color:red;margin-bottom:10px;">
        <?php echo $error; ?>
    </div>
<?php } ?>

<form method="POST" action="" id="collectionForm" >
    <input type="text" name="collection_title" id="collectionTitle" placeholder="Enter Collection Name" >
    <button type="submit" name="add_collection">Add Collection</button>
</form>

<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Collection Title</th>
            <th>Number of Posts</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($collections as $index => $collection) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>"; 
            echo "<td class='collection-title'>" . $collection['title'] . "</td>";
            echo "<td>" . $collection['post_count'] . "</td>";
            echo "<td>
                    <a href='collection_edit.php?id=" . $collection['id'] . "' class='edit-btn'>Edit</a>
                    <form method='POST' action='' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='" . $collection['id'] . "'>
                        <button type='submit' name='delete_collection' class='delete-btn' >Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>