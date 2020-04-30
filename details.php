<?php 
    require('./classes/burgers.php');
    
    $burgers_class = new Burgers;

    if(isset($_GET['id'])){
    $burger = $burgers_class->getBurger($_GET['id']);
    }

    if(isset($_POST['delete'])){ 
     $burgers_class->deleteBurger($_POST['id_to_delete']);
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
            <!-- Hidden input with id to delete passed to the method -->
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