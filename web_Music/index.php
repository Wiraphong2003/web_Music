<?php
require __DIR__ . '/dbconfig.php';
isset($_GET['searchder']) ? $searchder = $_GET['searchder'] : $searchder = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSMSU Music Award 2023</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<header>
    <div style="text-align:right;font-size: 30px; margin-top: 2%;">
        <p style="color:#FFFFFF ;">CSMSU Music Award 2023</p>
    </div>
</header>
<style>
    body {
        background-image: url('img/background.png');


    }

    .zoom {
        transition: transform .2s;
    }

    .zoom:hover {
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    img {
        border-radius: 5%;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        padding: 5px;
    }
</style>

<body>

    <!-- หัว -->
    <div class="container">
        <div style="text-align:left;font-size: 30px;">
            <p style="color:#FFFFFF ;">วงดนตรี</p>
        </div>
        <!-- onchange="this.form.submit() -->
        <form action="index.php" method="get" style="width: 200px;">
            <select class="form-select" aria-label="Default select example" name="searchder" onchange="this.form.submit()">
                <option selected="" value="">วงดนตรีทั้งหมด</option>
                <option value="2">ไทย</option>
                <option value="3">ไทยลุกทุ่ง</option>
                <option value="4">สากล</option>
                <option value="1">เกาหลี</option>
                <option  value="">วงดนตรีทั้งหมด</option>
            </select>
        </form>
    </div>

    <!-- ตารางวงดนตรี -->
    <!-- <div class="container" style="margin-top: 5%;">
        <div class="row" style="margin-top: 20px;">
            <div class="col-4" style="display: flex; justify-content: center;">
                <a href="show.php?id=2">
                    <img class="zoom rcorner" src="https://thestandard.co/wp-content/uploads/2022/07/BLACKPINK.jpg" width="100%" height="100%">
                </a>
            </div>
            <div class="col-4" style="display: flex; justify-content: center;">
                <a href="show.php?id=5">
                    <img class="zoom rcorner" src="https://thestandard.co/wp-content/uploads/2022/09/4EVE1.jpg" width="100%" height="100%">
                </a>
            </div>
            <div class="col-4" style="display: flex; justify-content: center;">
                <a href="show.php?id=3">
                    <img class="zoom rcorner" src="https://storage.thaipost.net/main/uploads2/photos/big/20210106/image_big_5ff52c72e343d.jpg" width="100%" height="100%">
                </a>
            </div>
        </div>
    </div> -->

    <?php
    $conn = $GLOBALS['conn'];
    if (isset($_GET['searchder']) && trim($_GET['searchder']) != '') {
        echo $_GET['searchder'];
        $sql = "SELECT * FROM `arlist` WHERE type = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_GET['searchder']);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "SELECT * FROM arlist ORDER BY vote DESC";
        $result = $conn->query($sql);
    }
    // $sql = "SELECT * FROM `arlist`";
    //    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <div class="grid-container">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <!-- <div class="container" style="margin-top: 5%;">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-4" style="display: flex; justify-content: center;">
                        <a href="show.php?id=<?= $row["id"] ?>">
                            <img class="zoom rcorner" src="<?= $row["image"] ?>" width="100%" height="100%">
                        </a>
                    </div>
                </div>
            </div> -->

                    <div class="grid-item" style="margin-top: 10%;margin-left: 100px;">
                        <div class="col-4" style="display: flex; justify-content: center;">
                            <a href="show.php?id=<?= $row["id"] ?>">
                                <img class="zoom rcorner" src="<?= $row["image"] ?>" width="365px" height="211px%">
                            </a>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>