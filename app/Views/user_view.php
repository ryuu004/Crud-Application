<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 CRUD App Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('css/user.css') ?>">
</head>
<body>

<img src="<?= base_url('images/japaneselofibg.png') ?>" alt="Background Image" class="img-fluid">


<!-- Container for Search Bar and Add User Button -->
<div id="top-controls" class="d-flex justify-content-between mb-3">
    <!-- Custom Search Bar Container -->
    <div id="custom-search-container">
        <input type="text" id="custom-search" class="form-control" placeholder="Search Users...">
    </div>
    
    <!-- Add User Button -->
    <div id="add-user-button">
        <a href="<?php echo site_url('/user-form') ?>" class="btn btn-primary">Add User</a>
    </div>
</div>

    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?> 

  <div class="mt-3" id="users-list-wrapper">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>User Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['name']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td>
              <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm"> <img src="<?= base_url('images/pencil.png') ?>" alt="Edit" style="width: 20px; height: 20px;"> </a>
              <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm"> <img src="<?= base_url('images/delete.png') ?>" alt="Delete" style="width: 20px; height: 20px;"> </a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>


 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    var table = $('#users-list').DataTable({
        "dom": '<"top"fl>rt<"bottom"p><"clear">', // Restore and position the "Show entries" dropdown
        "language": {
            "lengthMenu": "Show _MENU_ entries" // Custom text for the "Show entries" dropdown
        }
    });

        // Custom search functionality
        $('#custom-search').on('keyup', function () {
                table.search(this.value).draw();
            });
    });

</script>
</body>
</html>