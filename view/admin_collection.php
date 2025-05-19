<h1>Manage Collections</h1>

<link rel="stylesheet" href="../assets/css/admin_collection.css">
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
            ["id" => 2, "title" => "Featured post", "post_count" => 7],
            ["id" => 3, "title" => "Recent", "post_count" => 5],
          
        ];

        foreach ($collections as $collection) {
            echo "<tr>";
            echo "<td>" . $collection['id'] . "</td>";
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