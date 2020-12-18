<!DOCTYPE html>
<html>
<head>
 <title>Exhibition Display</title>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script type="text/javascript" src="js/display.js"></script>
<script type="text/javascript">
    
  jQuery(document).ready(function(e) {
    jQuery('#mymodal').trigger('click');
});
</script>
 <style>
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   text-align: center;
   border-radius: 14px;
  } 
  th 
  {
   background-color: mediumpurple;
   color: white;
   border-radius: 14px;
  }
  h1{
    font-family: "Arial";
    font-size: 50px;
     color: slategrey;
  }
  td{
    padding: 12px;
    border-radius: 14px;
  }
  tr:nth-child(even) {background-color: #f2f2f2; 
    border-radius: 14px;}
  #pictag
  {
    width:30%;
   margin: 0;
  position: fixed;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  }
.hfc{
  position:relative;
}
.hfc img{
  width:100%;
}
.close{
  position:absolute;
  top:5px;
  right:5px;
}
     .modal-backdrop {
   background-color: transparent;
}
 </style>
</head>
<body style="background-color: lavender">
    <h1><center><font style="border:9px solid grey">ArtWorks of all the artist</font></center></h1>


 <table>
 <tr>
  <th><br>Artwork ID<br><br></th> 
  <th><br>Title<br><br></th> 
  <th><br>Year<br><br></th>
  <th><br>Type of Art<br><br></th>
  <th><br>Price<br><br></th>
  <th><br>E_ID<br><br></th>
  <th><br>G_ID<br><br></th>
  <th><br>Artist ID<br><br></th>
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "Shubh@123", "art_gallery");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT artid, title, year_a, type_of_art, price, eid, gid, artistid FROM artwork";
  $result = $conn->query($sql);
  if ($result->num_rows > 0 )
   {
   
   while($row = $result->fetch_assoc())
    {
      $artd=$row["artid"];
      $artdi='"'.$artd.'"';
    echo "<tr><td><button type='button' id='mymodal' class='btn btn-secondary btn-lg' data-toggle='modal' data-target='#myModal' onclick='picDisp(".$artdi.")'>".$row["artid"]. "</button></td><td>" . $row["title"]. "</td><td>" . $row["year_a"]. "</td><td>" . $row["type_of_art"]. "</td><td>" . $row["price"]. "</td><td>" . $row["eid"]. "</td><td>" . $row["gid"]. "</td><td>". $row["artistid"]. "</td></tr>";
    }
    echo "</table>";
   
    }
else 
  { 
    echo "0 results"; 
  }
$conn->close();
?>
</table>

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body" style="background-color:#e6e6  " >
        <div class="hfc">
      <img id="pictag" class="mySlides w3-animate-fading" src=""/>
            <button type="button" style="display:none"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
      </div>
      </div>
    
    </div>
  </div>
</div>

</body>
</html>