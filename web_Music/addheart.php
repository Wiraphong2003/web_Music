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
    $i=$vote+1;
    $stme = $conn->prepare("UPDATE `arlist` SET vote=$i WHERE id = ? ");
      $stme->bind_param("i", $id);
      $stme->execute();
      if($stme->affected_rows>0){
        //echo "Record updated successfully";
        include_once 'show.php';
      }else{
        echo "Error updating record: " . $conn->error;
      }
?>
