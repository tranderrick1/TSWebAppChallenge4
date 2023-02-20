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
    <p class="searchHelper">Contact a Faculty Member</p>

    <form action="search.php" method="get">
    <div class="input-group mb-3" style="width:500px;margin:0 auto;">
        
        <input name="q" type="text" class="form-control" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
        </div>
        
    </div>

    <h4 class="hero">Search by faculty name or ID</h4>

    </form>
    <div class="cardList">

    </div>

</body>

</html>