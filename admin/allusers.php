<?php
include 'db/db.php';

$sql = "SELECT * FROM signup";
$query = mysqli_query($conn,$sql);

?>
   

   
<div class="table-responsive">
    <h3 class="text-info">All user</h3>
    <hr>
    <table class="table table-dark rounded">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">Login ID</th>
          <th scope="col">Server ID</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
              <th scope="row"><?= $row['id'];?></th>
              <td><?= $row['email'];?></td>
              <td><?= $row['login_id'];?></td>
              <td><?= $row['server_id'];?></td>
              <td >
                  <a href="main.php?page=edit&id=<?= $row['server_id'];?>" class="btn btn-info btn-sm m-1">Edit</a>
                  <a href="main.php?page=delete&del_user=<?= $row['server_id'];?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Are you sure you want to delete this user?')">Del</a>
              </td>
            </tr>
    
    
        <?php endwhile ?>
          
        
        
      </tbody>
    </table>
    
</div>