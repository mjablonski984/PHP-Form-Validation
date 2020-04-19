<?php 
  include('config/db_connect.php');

    // check id param
   if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql = "SELECT * FROM burgers WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn,$sql);

    //fetch single row in array format
    $burger = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    mysqli_close($conn);
   }
   
   if(isset($_POST['delete'])){    
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    
    $sql = "DELETE FROM burgers WHERE id=$id_to_delete";

    if(mysqli_query($conn,$sql)){
        header('Location: index.php');
    }else{
        echo 'Query error: ' . mysqli_error($conn);
    };
    }

?>

<html lang="en">
    <?php include('templates/header.php') ?>    
    <main class="container">
        <div class="container center blue-grey-text">
            <?php if($burger): ?>
            <h4><?php echo htmlspecialchars($burger['name']);?></h4>
            <p><?php echo htmlspecialchars($burger['name']);?></p>
            <p>A <?php echo htmlspecialchars($burger['type']); ?> burger</p>
            <p>Roll type: <?php echo htmlspecialchars($burger['roll']); ?> </p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($burger['ingredients']); ?></p>

            <p>Created by: <?php echo htmlspecialchars($burger['email']); ?></p>
            <p><?php echo date($burger['created_at']); ?></p>
            <!-- Delete form -->
            <form action="details.php" method="post">
            <input type="hidden" name="id_to_delete" value=<?php echo $burger['id']; ?>>
            <input type="submit" name="delete" value="Delete" class="btn amber darken-2">
            </form>
            <?php else: ?>
            <h5>No such burger exists</h5>
            <?php endif?>
            </div>
    </main>
    <?php include('templates/footer.php') ?> 
</html>    