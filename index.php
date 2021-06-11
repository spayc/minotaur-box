<?php
//   include('session.php');
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>User Pannel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/userlvl.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php"><i class="fas fa-cog"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                </li>
            </ul>
        </div>
    </nav>


    <div class="jumbotron text-center text-white bg-secondary rounded-0">
        <img src="imgs\labytinth_user.jpg" alt="" class="rounded w-25" />
        <p>Welcome to the beginning of my Labyrinth</p>
        <p>-- Minotaur</p>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" id="select fields">
                    <label>Choose table:</label>
                    <select name="theComboBox" id="theComboBox">
                        <option>People</option>
                        <option>Creatures</option>
                    </select>
                    <br>
                    <label for="selectlist">Choose name:</label>
                    <input type="" name="" id="name-input-field" class="form-control">
                </div>
                <button class="btn btn-secondary" id="btn-choose-name">
                    Show
                </button>
            </div>
        </div>
    </div>

    <br/>

    <div class="container" id="container-details">
        <div class="row">
            <div class="col">
                <table class="center table" id="table-search">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                    </tr> 
                    <tbody id="data"></tbody>
                </table>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>

    <footer class="sticky-footer p-4 bg-secondary text-white text-center mt-5">

        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2EHIF, TINF</p>
            </div>
        </div>
    </footer>
</body>

</html>