<?php 
    require('./classes/burgers.php');
    $burgers_class = new Burgers;
    $burgers = $burgers_class->getBurgers();

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>    
    <main class="container">
        <div class="center show-on-small">
        <a href="create.php" class="btn amber darken-2 waves-effect waves-red ">CREATE A BURGER</a>
        </div>

        <h3 class="center brown-text">Burgers</h3>
        <div>
          <div class="row">
               <?php foreach($burgers as $burger):?>
                <div class="col s12 m6 l4">
                    <div class="card small hoverable">
                        <img src="img/burger.svg" class="burger" alt="burger">
                        <div class="card-content center">
                            <h5><?php echo htmlspecialchars($burger['name']); ?></h5>
                            <p>A <?php echo htmlspecialchars($burger['type']); ?> burger</p>
                            <p>Roll : <?php echo htmlspecialchars($burger['roll']); ?> </p>
                           
                        </div>
                        <div class="card-action center">
                         <a href="details.php?id=<?php echo $burger['id']; ?>" class="btn amber darken-2 waves-effect waves-red">More Info</a>
                        </div>
                    </div>
                </div>
               <?php endforeach ?>   
          </div>

        </div>


    </main>

    <?php include('templates/footer.php') ?>    
</body>
</html>