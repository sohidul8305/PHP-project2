<?php
$catdata = $obj->display_category();

if(isset($_GET['status'])){
    if($_GET['status']=='delete'){
       $delid = $_GET['id'];
       $msg = $obj->delete_category($delid);
    }
}
?>
<?php
if(isset($_GET['status'])){
    if($_GET['status']=='edit'){
        $delid = $_GET['id'];
        $msg = $obj->update_category($delid);
    }
}
?>

<h2>Manage Category Page</h2>
<?php if(isset($msg)){
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong><?php echo $msg ?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
}
?>
<?php
if(isset($run)){
    echo $run;
}
?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($cat=mysqli_fetch_assoc($catdata)){ ?>
     <tr>
        <td><?php echo $cat['cat_id']; ?></td>
        <td><?php echo $cat['cat_name']; ?></td>
        <td><?php echo $cat['cat_des']; ?></td>
        <td>
            <a class="btn btn-primary" href="?status=edit&&id=<?php echo $cat['cat_id']; ?>">Edit</a>
            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $cat['cat_id']; ?>">Delete</a>
        </td>
     </tr>
     <?php }?>
     
</tbody>
</table>