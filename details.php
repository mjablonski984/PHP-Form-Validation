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
    <main class="container valign-wrapper">
        <div class="container center white brown-text ">
            <?php if($burger): ?>
            <img src="img/burger.svg" class="burger" alt="burger">

            <h4 class="brown-text"><?php echo htmlspecialchars($burger['name']);?></h4>
            <p><?php echo htmlspecialchars($burger['name']);?></p>
            <p>A <?php echo htmlspecialchars($burger['type']); ?> burger</p>
            <p>Roll type: <?php echo htmlspecialchars($burger['roll']); ?> </p>
            <h5>Ingredients:</h5>
            <ul>
                <?php foreach( explode(',',$burger['ingredients']) as $ing): ?>
                <li><?php echo htmlspecialchars($ing); ?></li>
                <?php endforeach ?> 
            </ul>

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