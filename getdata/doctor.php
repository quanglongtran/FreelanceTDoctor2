		<?php

		include('simple_html_dom.php');
		include('dbConnect.php');
		$data = array();
			$db = new dbConnect('localhost','root','q#BX^n7MQ^cVfH','medicvn');
		/*  $data = $db->exeQuery('select * from speciality');

		  	echo '<pre>';
		  	var_dump($data);
		  	 	echo '</pre>';*/
		/*
		tao url lay re duoc url title company
		-> co duoc url cua product roi thi tiep tuc add  url cua product lay them mot song thong tin
	*/
		 $myfile = fopen("dr.txt", "r") or die("Unable to open file read! ");
		$current =  fgets($myfile);
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
		
		
		
		//$myFile ="text.txt";
		//$lines = file($myFile);//file in to an array
		$url = "https://vicare.vn/danh-sach/bac-si/a-".trim($current) ;
		echo $url;
		$doctor_id = $current;
	//	$url = $lines[$current]; //line 2
		$inner = getDetailMediction(trim($url));
		$current= $current+1;
		$myfile = fopen("dr.txt", "w") or die("Unable to open file write!");
		$txt = "$current";
		fwrite($myfile, $txt);
		fclose($myfile);
	// $valuesArr[] = "('$description', '$packing','$standard','$guide','$duration','$manufacturer','$registered_company','$production_company','$registered_country','$production_country','$registered_number','$warning_medicine','$assign_medicine','$contraindication_medicine','$side_effect_medicine','$careful_medicine','$overdose_medicine', '$preservation_medicine ' ,'$forget_take_medicine', '$interactive_medicine' , '$possible_pharmacological_medicine','$pharmacokinetic_medicine ','$type_medicine','$dosage_forms','$info_drugs')";

	    $sql = "INSERT INTO doctor(doctor_id,doctor_name,doctor_url,profile_image,doctor_description,experience,training) values ";

	   if (is_array($inner)) { 
        $doctor_name = $inner['doctor_name'];
        $doctor_url = $inner['doctor_url'];
        $profile_image = $inner['profile_image'];
        $doctor_description = $inner['doctor_description'];
        $experience = $inner['experience'];
        $training = $inner['training'];
        $valuesArr[] = "('$doctor_id','$doctor_name','$doctor_url','$profile_image','$doctor_description','$experience','$training')";
 	    
          $str = implode(',', $valuesArr);
       

	      
	      // echo $str;
          	//$description = htmlentities($description, ENT_QUOTES, "UTF-8");
          	//echo $description;
	     //echo '<pre>';
        //echo $tdp;
		//echo '</pre>';
           $sql .= implode(',', $valuesArr);
           
           $sql=trim($sql);
           echo $sql;
  			$db->exeNonQuery($sql);
	}   

   function to_url($str){
   	 $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;

   }

	function getAllUrlMediction() {

			$html = file_get_html("https://vicare.vn/danh-sach/bac-si/");
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
			////echo $html;
			//return;
			$ret = $html->find('div[id=page-404]',0); 
			if($ret!=null){ echo 'not found'; return;}
		    $mediction = array();
		    $mediction['doctor_name']= split('<',substr($html->find('h1',0)->innertext,22))[0];
		    $mediction['doctor_url'] = to_url($mediction['doctor_name']);
		    $mediction['doctor_description']= null;
		    $mediction['training'] = null;
		    $mediction['experience'] = null;
		    $gioithieu = $html->find('section[id=gioi-thieu] div' ,0);
		    $kinhnghiem = $html->find('section div h2[id=kinh-nghiem]',0);
		  //  echo $gioithieu;
		    if($gioithieu!=null){
		    	$mediction['doctor_description']= $gioithieu->innertext;
		    }
		    $mediction['profile_image'] =null;
		    if($html->find('aside div[class=item] a',0)!=null){
		    	$image = $html->find('aside div[class=item] a',0)->style;
		    	//$image = split('url',$image);
		    	$mediction['profile_image'] = split('\)',split('\(', $image)[1])[0];
		    }
		    
		 //   var_dump($image);
		    $section = $html->find('section');
		    if($section!=null){
		    	$mediction['disease_content'] = null;
		    	$mediction['overview'] = null;
		    	$mediction['cause'] = null;
		    	$mediction['prevent'] = null;
		    	$mediction['treatment']=null;

		    	foreach($section as $item){
		    		//$item = $item->find('div',0);
		    		if($item->find('h2[id=kinh-nghiem]')!=null){
		    			///echo 'abc';
		    			//var_dump($item->find('div div[class]',0)->innertext);
		    			$mediction['experience'] = $item->find('div div[class]',0)->innertext;
		    		}
		    		if($item->find('h2 i[class=fa fa-graduation-cap]')!=null){
		    			$mediction['training'] = $item->find('div div[class]',1)->innertext;
		    		}

		    	}
		    }
			$html->clear();
	    	unset($html);
	    //  var_dump($mediction);
			return $mediction;

		}

