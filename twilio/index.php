<?php
   // Git the data
   // http://doineedanumbrella.com/api/?zip=94103 

   $zip = "95032";
   if (isset($_REQUEST['body'])) {
      $zip = $_REQUEST['body'];
   }

   $json = file_get_contents("http://doineedanumbrella.com/api/?zip={$zip}");
   $data = json_decode($json);
   $out = isset($data->description) ? $data->description : 'invalid zip';

   header("content-type: text/xml");
   echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Sms><?php echo $out; ?></Sms>
</Response>

