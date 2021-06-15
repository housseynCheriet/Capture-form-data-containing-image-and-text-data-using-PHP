<?php 

      function upload_img($name,$folder,$id){ //$name is the name of the html for "avatar"
if(isset($_FILES[$name])){
     $errors= array();
     $file_name = $_FILES[$name]['name'];
     $file_size =$_FILES[$name]['size'];
     $file_tmp =$_FILES[$name]['tmp_name'];
     $file_type=$_FILES[$name]['type'];
      echo $_FILES[$name]['name'];
     
     $file_ext=strtolower(end(explode('.',$_FILES[$name]['name'])));
     $expensions= array("jpeg","jpg","png");

     if(in_array($file_ext,$expensions)=== false){
            $errors[]="Do not accept this image format, please choose JPEG or PNG.";
     }

     if($file_size > 2097152){
            $errors[]='File size must be less than or equal to 2MB';
     }

     if(empty($errors)==true){
      $srcImg=$folder.$file_name;
       // or $srcImg=$folder.$id.'.'.$file_ext;
            move_uploaded_file($file_tmp,$srcImg);

        // or move_uploaded_file($file_tmp,$folder.$id.'.'.$file_ext);
            echo "
Success!!!";
return $srcImg;

     }
     else{
            print_r($errors);
            return "noImage";
            exit;
     }
}
}


$srcImg=upload_img('avatar',"./img/","36566845");
?>
      <html>
  <head>
    <title>Thank You</title>
    <style type="text/css">
      
      dd {
    color: red;
}
    </style>
  </head>
  <body style="
    font-size: 30px;
">
    Thank You

    <p>Thank you for registering. Here is the information you submitted:</p>

    <dl>
      <dt>First name:</dt><dd><?php echo $_POST["firstName"]?></dd>
      <dt>Last name:</dt><dd><?php echo $_POST["lastName"]?></dd>
      <img src="<?php echo $srcImg?>">

      <dt>Gender:</dt><dd><?php echo $_POST["gender"]?></dd>
      <dt>Favorite widget:</dt><dd><?php echo $_POST["favoriteWidget"]?></dd>
      <dt>Do you want to receive our newsletter?</dt><dd><?php echo $_POST["newsletter"]?></dd>
      <dt>Comments:</dt><dd><?php echo $_POST["comments"]?></dd>
    </dl>
  </body>
</html>
