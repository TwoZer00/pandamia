<?php

class likes{
    function getLikes($id_zi){
        require 'db/loginDB.php';
        $query="SELECT infection_zone.id_iz,COUNT(likes.id_like) AS likes FROM ((infection_zone INNER JOIN users ON infection_zone.id_user= users.id_user) INNER JOIN likes ON infection_zone.id_iz=likes.id_iz) WHERE infection_zone.id_iz=".$id_zi;
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row["likes"];
            }
        } else {
            echo "0";
        }
    }
    function getLikesByPerson($id_user,$id_zi){
        require 'db/loginDB.php';
        $query ="SELECT * FROM `likes` WHERE id_user=".$id_user." AND id_iz=".$id_zi;
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row["id_like"];
            }
        } else {
            return 0;
        }
    }
}
//$likes = new likes();
//echo $likes->getLikesByPerson(2,2);