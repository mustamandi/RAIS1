<?php
  $data = array();
  $data = explode("|", "slkdjflksjdf.jpg|lksdjflksdf.jpg|kjsdfkjhsdf.jpg|");
  print_r($data);
  for($i=0;$i<count($data);$i++)
  {
      echo $data[$i] ."<br/>";
  }
?>