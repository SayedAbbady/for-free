<?php


  namespace App\Traits;


  Trait PhotoTrait 
  {

    function savePhoto($photo = null, $path)
    {
      
      // $file_extension =  $photo->getClientOriginalExtension();
      $file_name =  $photo->getClientOriginalName();
      // $file_name      = $file_name.'.'.$file_extension;
      
      $photo->move($path, $file_name);
      return $file_name;
    }
  
  }

?>