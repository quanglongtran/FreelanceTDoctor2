<?php

  include('simple_html_dom.php');
  include('dbConnect.php');
  $data = array();
   $db = new dbConnect('localhost','root','q#BX^n7MQ^cVfH','medicvn');
  /*  $data = $db->exeQuery('select  from speciality');

     echo '<pre>';
     var_dump($data);
       echo '</pre>';*/
  /*
  tao url lay re duoc url title company
  -> co duoc url cua product roi thi tiep tuc add  url cua product lay them mot song thong tin
 */
   $myfile = fopen("disease.txt", "r") or die("Unable to open file!");
  $current =  fgets($myfile);
  $current = trim($current);
  fclose($myfile);
  //echo $current;
/*
  for( $i =1;$i<2;$i++){
   $myfile = fopen("i.txt", "w") or die("Unable to open file!");
   $txt = "$i";
   fwrite($myfile, $txt);
   fclose($myfile);

   $url = "https://vicare.vn/thuoc/".$i."" ;
   getDetailMediction($url);
  }
 */
  
  //echo $url;
  //getAllUrlMediction();
  
  // /var_dump($medicine);
  
  
  
  $myFile ="text.txt";
  $lines = file($myFile);//file in to an array
  $url = "https://vicare.vn/benh/".$lines[$current] ;
  echo $url;
  
 // $url = $lines[$current]; //line 2
  $inner = getDetailMediction(trim($url));
  $current++;
  $myfile = fopen("disease.txt", "w") or die("Unable to open file!");
  $txt = "$current";
  fwrite($myfile, $txt);
  fclose($myfile);
 // $valuesArr[] = "('$description', '$packing','$standard','$guide','$duration','$manufacturer','$registered_company','$production_company','$registered_country','$production_country','$registered_number','$warning_medicine','$assign_medicine','$contraindication_medicine','$side_effect_medicine','$careful_medicine','$overdose_medicine', '$preservation_medicine ' ,'$forget_take_medicine', '$interactive_medicine' , '$possible_pharmacological_medicine','$pharmacokinetic_medicine ','$type_medicine','$dosage_forms','$info_drugs')";

     $sql = "INSERT INTO disease(disease_name,disease_content,overview,cause,prevent,treatment) values ";

    if (is_array($inner)) { 
        $disease_content = $inner['disease_content'];
        $disease_name = $inner['disease_name'];
	$disease_name = substr($disease_name,7);
        $overview = $inner['overview'];
        $cause = $inner['cause'];
        $prevent = $inner['prevent'];
        $treatment = $inner['treatment'];
        $valuesArr[] = "('$disease_name','$disease_content','$overview','$cause','$prevent','$treatment')";
      
          $str = implode(',', $valuesArr);
       

       
       // echo $str;
           //$description = htmlentities($description, ENT_QUOTES, "UTF-8");
           //echo $description;
      //echo '<pre>';
        //echo $tdp;
  //echo '</pre>';
           $sql .= implode(',', $valuesArr);
          // echo $sql;
     $db->exeNonQuery($sql);
 }   

   

 function getAllUrlMediction() {

   $html = file_get_html("https://vicare.vn/benh/");
   $mediction = array();
   foreach($html->find('section[id]') as $items)  
   {

    foreach($items->find('ul li') as $post) {
            # remember comments count as nodes
     $arr =  explode('-', $post->find('a',0)->href);
     echo $arr[count($arr)-1];
     echo '<br/>';
     //$mediction[] = trim($post->find('h3',0)->innertext);
     //$mediction['company'] = trim($post->find('div.cms',0)->innertext);

    }

   }
   return $mediction;
  }
  //lay thong tin chi tiet cua cac loai thuoc 
  function getDetailMediction($url)
  {
   $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_URL,$url);
   curl_setopt($ch, CURLOPT_USERAGENT, $agent);
   $result=curl_exec($ch);
   $html =  str_get_html($result);
   //echo $html;
   //return;
   $ret = $html->find('div[id=page-404]',0); 
   if($ret!=null){ echo 'not found'; return;}
      $mediction = array();
      $mediction['disease_name']= $html->find('h1',0)->innertext;
      $section =  $html->find('section');
      if($section!=null){
       $mediction['disease_content'] = null;
       $mediction['overview'] = null;
       $mediction['cause'] = null;
       $mediction['prevent'] = null;
       $mediction['treatment']=null;
       foreach($section as $item){
        if($item->find('h2[id=tom-tat]')!=null){
         $mediction['disease_content']= addslashes($item->find('div[class=body]',0)->innertext);
        }
        if($item->find('h2[id=tong-quan]')!=null){
         $mediction['overview']= htmlentities($item->find('div[class=body]',0)->innertext);
        }
        if($item->find('h2[id=nguyen-nhan]')!=null){
         $mediction['cause']= $item->find('div[class=body]',0)->innertext;
        }
        if($item->find('h2[id=phong-ngua]')!=null){
         $mediction['prevent']= $item->find('div[class=body]',0)->innertext;
        }
        if($item->find('h2[id=dieu-tri]')!=null){
         $mediction['treatment']= $item->find('div[class=body]',0)->innertext;
        }
        //echo $item->find('h2[id=tom-tat]',0)->innertext;
       }
      }
   $html->clear();
      unset($html);
      // var_dump($mediction);
   return $mediction;

  }
