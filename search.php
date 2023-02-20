<?php
session_start();
require_once "config.php";
error_reporting(E_ERROR | E_PARSE);
?>

<html>
<head>
    <style>
        .searchHelper {
            color:white;
            text-align:center;
            margin: 0 auto;
            font-size: 30px;
        }
        
        .noResults {
            color:white;
        }

    </style>
    <title>Challenge 3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>
<body>

    <br><br>
    <p class="searchHelper">Search for faculty here</p>

    <form action="search.php" method="get">
    <div class="input-group mb-3" style="width:500px;margin:0 auto;">
        
        <input name="q" type="text" class="form-control" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
        </div>
        
    </div>
    </form>
    <div class="cardList">
        <?php
        //if there's a query being searched already [patched null searches displaying secrets]

        if(isset($_GET["q"])) {
            $searchQuery = $_GET["q"];
            if($_GET["q"] == "") {
                $sql = "SELECT * FROM faculty WHERE id > 1000";
            }
            else{
                $sql = "SELECT * FROM faculty WHERE (`name` LIKE '%".$searchQuery."%') OR (`id` LIKE '%".$searchQuery."%')";
            }
        } else {
            $sql = "SELECT * FROM faculty WHERE id > 0";
        }

        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $user_query = "SELECT username FROM userdata WHERE id = " . $row["id"];
                $user_result = $link->query($user_query)->fetch_assoc();
                echo "
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $row["name"] . "</h5>
                        <p class='card-text'>Email: " . $row["email"] . "</p>
                    </div>
                </div>";
            }
        } else {
            echo "<h1 class='noResults'>0 results</h1>";
        }
        ?>
    </div>

</body>

</html>