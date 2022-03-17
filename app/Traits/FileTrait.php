<?php


  namespace App\Traits;
  

  use ZipArchive;

  Trait FileTrait 
  {

    function saveFile($file = null, $path)
    {
      
      $file_name_extention =  str_replace('.zip',"",$file->getClientOriginalName());
      
      
      $zip = new ZipArchive;
      if ($zip->open($file) === TRUE) {
          
          if (!file_exists($path.$file_name_extention)) {
            
            mkdir($path.time().$file_name_extention,0777,true);
          }
          $zip->extractTo($path.time().$file_name_extention.'/');
          $zip->close();
          return $path.time().$file_name_extention.'/';
      } else {
          return 'failed';
      }
      
    }
  
  }

?>