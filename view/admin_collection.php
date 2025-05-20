<h1>Manage Collections</h1>

<link rel="stylesheet" href="../assets/css/admin_collection.css">


<form method="POST" action="">
    <input type="text" name="collection_title" placeholder="Enter Collection Name" required>
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
      
        $collections = [
            ["id" => 1, "title" => "Best of 2025", "post_count" => 10],
            ["id" => 2, "title" => "Featured Post", "post_count" => 7],
            ["id" => 3, "title" => "Recent", "post_count" => 5],
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_collection'])) {
            $new_title = $_POST['collection_title'];
            $new_id = count($collections) + 1;
            $collections[] = ["id" => $new_id, "title" => $new_title, "post_count" => 0];
        }

       
        foreach ($collections as $index => $collection) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>"; 
            echo "<td>" . $collection['title'] . "</td>";
            echo "<td>" . $collection['post_count'] . "</td>";
            echo "<td>
                    <a href='collection_edit.php?id=" . $collection['id'] . "' class='edit-btn'>Edit</a>
                    <a href='#' class='delete-btn'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>