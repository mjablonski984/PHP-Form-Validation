<?php 
    include('config/db_connect.php');


     $name=$type=$roll=$ingredients=$email='';

     $errors = array( 'name'=>'' ,'type'=> '', 'roll'=>'', 'ingredients'=>'', 'email'=>'');
    
     function test_input($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }   

     if(isset($_POST['submit'])){

        if(empty($_POST['name'])){
            $errors['name'] = 'A name is required <br>';
        }else{
            $name = test_input($_POST['name']);
            if(!preg_match('/^[a-zA-Z\s]{1,30}$/', $name)){
                $errors['name'] = 'The name may contain max 30 characters (letters and spaces)';
            }
        }

        if(empty($_POST['type'])){
            $errors['type'] = 'Please select a burger type<br>';
        }else{
            if(in_array($_POST['type'], ['beef','chicken','veggie'])){
                $type = test_input($_POST['type']);
               
            }else{ 
                $errors['type'] = 'Select on of burger types: beef, chicken or veggie';
            }             
        }

        if(empty($_POST['roll'])){
            $errors['roll'] = 'Please select a roll type<br>';
        }else{
            if(in_array($_POST['roll'], ['sesame','pretzel','onion'])){
            $roll = test_input($_POST['roll']);
            
            }else{ 
            $errors['roll'] = 'Select one of the roll types: sesame, pretzel or onion';
            }         
        }


        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one ingredient is required <br>';
        }else{
            $ingredients = test_input($_POST['ingredients']);
        
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }

        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br>';
        }else{
            $email = test_input($_POST['email']);
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Please enter a valid email address'; 
            }
        }    


        if(!array_filter($errors)){
            //prepare data to saving in db (real_escape_string protects from sql injections);
            $name = mysqli_real_escape_string($conn,test_input($_POST['name']));
            $type = mysqli_real_escape_string($conn,test_input($_POST['type']));
            $roll = mysqli_real_escape_string($conn,test_input($_POST['roll']));
            $ingredients = mysqli_real_escape_string($conn,test_input($_POST['ingredients']));
            $email = mysqli_real_escape_string($conn,test_input($_POST['email']));
        
            $sql = "INSERT INTO burgers(name,email,ingredients,type,roll) VALUES('$name','$email','$ingredients','$type','$roll')";
        
                // save to db and check
            if(mysqli_query($conn,$sql)){
                header('Location: index.php');// succes - redirect to index.php
            } else {
                echo 'Query error: ' . mysqli_error($conn);
            }
          }
     }

     
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