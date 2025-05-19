<h1>Manage Posts</h1>

<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Author</th>
            <th>Title</th>
            <th>Topic</th>
            <th>Publish</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
    
        $posts = [
            ["author" => "Awa Melvine", "title" => "Defining Moments", "topic" => "Life Experiences", "publish" => "Unpublished"],
            ["author" => "Awa Melvine", "title" => "The Stuff of Cuteness", "topic" => "Jokes & Memes", "publish" => "Unpublished"],
        
           
        ];

        foreach ($posts as $index => $post) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>"; 
            echo "<td>" . $post['author'] . "</td>";
            echo "<td>" . $post['title'] . "</td>";
            echo "<td>" . $post['topic'] . "</td>";
            echo "<td>" . $post['publish'] . "</td>";
            echo "<td><input type='checkbox' name='postSelect'></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<div class="feature-post-action">
    <button type="submit" class="add-feature-btn">Add Feature Post</button>
    <button type="submit" class="add-delete-btn">Delete Post</button>
</div>

<div class="actions">
    <button class="trash">Trash</button>
    <button class="add-post">Add Post</button>
</div>