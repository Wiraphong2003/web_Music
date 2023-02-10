<?php
require __DIR__ . '/dbconfig.php';
$id = $_GET['id'];
$conn = $GLOBALS['conn'];
$sql1 = "SELECT * FROM `arlist` WHERE id = $id";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $idss = $row["id"];
        $name = $row["name"];
        $vote = $row["vote"];
        $type = $row["type"];
        $img = $row["image"];
        $dis = $row["description"];
    }
}
$sql2 = "SELECT * FROM `bandtype` WHERE  id = $type";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $tid = $row["id"];
        $nametype = $row["name"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    body {
        background-image: url('img/background.png');
    }

    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .parent {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .child {
        width: 500px;
        height: 100px;
    }

    #heaet {
        color: red;
    }

    #absolute {
        width: 10;
        height: 10;
        position: absolute;
        bottom: 10px;
        right: 20px;
        margin-top: 100px;
    }
</style>

<header>
    <div style="text-align:right;font-size: 30px; margin-top: 2%;">
        <p style="color:#FFFFFF ;">CSMSU Music Award 2023</p>
    </div>
    <div class="container" style="margin-top: 3%;">
        <div style="text-align:left;font-size: 30px;">
            <p style="color:#FFFFFF ;"><a href="index.php">หน้าแรก/</a><?php echo $name ?> </p>
        </div>
    </div>
</header>

<body>


    <div class="card">
        <div class="row">
            <img src="<?= $img ?>" alt="Avatar" style="width:100%">
            <div class="container">
                <h4><b><?php echo $name ?></b></h4>
                <p class="title">ประเภท:<?php echo $nametype ?></p>
                <p><?php echo $dis ?></p>
            </div>
        </div>
        <div class="row" style="margin-top:70px ;">
            <div id="absolute" style="margin-right: -820px;">
                 <a href="addheart.php?id=<?= $id ?>" onclick="return confirm('ยืนยันการโหวต <?= $name ?>')" style="margin-top: ;100px"><button class="btn btn-outline-light" style="font-size:24px"><i class="fa fa-heart" id="heaet"></i></button></a><?php echo "(". $vote . ")"?>
            </div>
        </div>




    </div>

</body>

</html>