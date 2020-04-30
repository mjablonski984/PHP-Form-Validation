<?php 
    require('form_validator.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
      
    <main class="container brown-text">
        <h3 class="center"> Create a Burger</h3>

        <form class="white" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
            <label>Name your burger: </label>
            <input type="text" name="name"  value="<?php echo htmlspecialchars($name);?>"> 
            <div class="red-text"><?php echo $errors['name']?></div>

            <div class="input-field">    
                <select name="type">
                <option value="" disabled selected></option>
                <option value="beef" <?php echo ($type=='beef')?'selected="selected"':'' ?>>Beef</option>
                <option value="chicken" <?php echo ($type=='chicken')?'selected="selected"':'' ?> >Chicken</option>
                <option value="veggie" <?php echo ($type=='veggie')?'selected="selected"':'' ?> >Veggie</option>
                </select>
                <label>Burger Type:</label>
            </div>
            <div class="red-text"><?php echo $errors['type']?></div>
            
            <p>
            <label>Roll Type:</label>
            <label>
            <input name="roll" type="radio" value="sesame" <?php echo ($roll=='sesame')?'checked':'' ?> />
            <span>Sesame</span>
            </label>
            <label>
            <input name="roll" type="radio" value="pretzel" <?php echo ($roll=='pretzel')?'checked':'' ?> />
            <span>Pretzel</span>
            </label>
            <label>
            <input name="roll" type="radio" value="onion" <?php echo ($roll=='onion')?'checked':'' ?> />
            <span>Onion</span>
            </label>
            </p>
            <div class="red-text"><?php echo $errors['roll']?></div>
            
            <label>Other Ingredients (coma separated): </label>
            <textarea name="ingredients"   class="materialize-textarea" ><?php echo htmlspecialchars($ingredients);?></textarea>
            <div class="red-text"><?php echo $errors['ingredients']?></div>
            
            <label>Your Email: </label>
            <input type="text" name="email"  value="<?php echo htmlspecialchars($email);?>">
            <div class="red-text"><?php echo $errors['email']?></div>

            <div class="center">
                <input type="submit" class="btn amber darken-2" name="submit" value="Submit">
            </div>
        </form>
    </main>

    <?php include('templates/footer.php');?>
</html>