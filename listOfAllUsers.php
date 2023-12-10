
  
  <table id="tableUser">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created</th>
        </tr>
  <?php
      
    $stmt= $conn->query("SELECT * FROM users");
    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
    <?php foreach($results as $row): ?>
        <tr>
          <td> <?= $name = $row["title"] . " " . $row["firstname"] . " " . $row["lastname"]; ?></td>
          <td> <?= $row["email"]; ?></td>
          <td> <?= $row["role"]; ?></td>
          <td> <?= $row["created_at"]; ?></td>
        </tr>
    <?php endforeach ?>
  </table>
</section>
