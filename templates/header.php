<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
    
    <style>
        body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        }
        main {
        flex: 1 0 auto;
        }
        form {
        max-width: 500px;
        padding: 1.5rem;
        margin: 1.5rem auto;  
        }
        .burger{
        width: 100px;
        margin: 2rem auto -30px;
        display: block;
        position: relative;
        top: -30px;;
        }
    </style>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
        let elems = document.querySelectorAll('.sidenav');
        let instances = M.Sidenav.init(elems);
  });

        document.addEventListener('DOMContentLoaded', function() {
            let select = document.querySelectorAll('select');
            var instances = M.FormSelect.init(select);
        });

    </script>

    <title>Burger Wizard</title>
</head>
<body class="amber lighten-4">
    <nav class="amber darken-4">
        <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo">Burger Wizard</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="create.php">CREATE A BURGER</a></li>      
        </ul>
        </div>
    </nav>

