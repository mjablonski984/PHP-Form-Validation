<?php 
     $name=$type=$roll=$ingredients=$email='';

     $errors = array( 'name'=>'' ,'type'=> '', 'roll'=>'', 'ingredients'=>'', 'email'=>''); 

     if(isset($_POST['submit'])){

        if(empty($_POST['name'])){
            $errors['name'] = 'A name is required <br>';
        }else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]{1,30}$/', $name)){
                $errors['name'] = 'The name may contain max 30 characters (letters and spaces)';
            }
        }

        if(empty($_POST['type'])){
            $errors['type'] = 'Please select a burger type<br>';
        }else{
            if(in_array($_POST['type'], ['beef','chicken','veggie'])){
                $type = $_POST['type'];
               
            }else{ 
                $errors['type'] = 'Select on of burger types: beef, chicken or veggie';
            }             
        }

        if(empty($_POST['roll'])){
            $errors['roll'] = 'Please select a roll type<br>';
        }else{
            if(in_array($_POST['roll'], ['sesame','pretzel','onion'])){
            $roll = $_POST['roll'];
            
            }else{ 
            $errors['roll'] = 'Select one of the roll types: sesame, pretzel or onion';
            }         
        }

        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one ingredient is required <br>';
        }else{
            $ingredients = $_POST['ingredients'];
        
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }

        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br>';
        }else{
            $email = $_POST['email'];
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Please enter a valid email address'; 
            }
        }    


        if(!array_filter($errors)){

            require('./classes/burgers.php');
            $burgers_class = new Burgers;
            // add burger to the burgers table in the db
            $burgers_class->addBurger($_POST['name'],$_POST['type'],$_POST['roll'],$_POST['ingredients'],$_POST['email']);          
        }
     }
     