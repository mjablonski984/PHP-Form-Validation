<?php 
    // db connection
    include('config/db_connect.php');
 
    $sql = 'SELECT * FROM burgers ORDER BY created_at';

    // make query & get results
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an assoc. array
    $burgers = mysqli_fetch_all($result, MYSQLI_ASSOC);

   // free $result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

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