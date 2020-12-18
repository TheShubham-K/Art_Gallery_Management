 <?php
    if(isset($_POST['G_ID']) && isset($_POST['GNAME']) && isset($_POST['LOCATION'] )):
     $gid = $_POST['G_ID'];
     $gname = $_POST['GNAME'];
     $location_d = $_POST['LOCATION'];

    $link = new mysqli('localhost', 'root', 'Shubh@123', 'art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO GALLERY(gid, gname, location_d) VALUES ('".$gid."', '".$gname."', '".$location_d."')";

      

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully Inserted into GALLERY table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>
