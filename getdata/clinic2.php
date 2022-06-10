		<?php

		include('simple_html_dom.php');
		include('dbConnect.php');
		$data = array();
			$db = new dbConnect('localhost','root','q#BX^n7MQ^cVfH','medicvn');
		$i = 0;
		/*  $data = $db->exeQuery('select * from speciality');
		
		  	echo '<pre>';
		  	var_dump($data);
		  	 	echo '</pre>';*/
		/*
		tao url lay re duoc url title company
		-> co duoc url cua product roi thi tiep tuc add  url cua product lay them mot song thong tin
	*/
		 $myfile = fopen("clinic.txt", "r") or die("Unable to open file!");
		$current =  fgets($myfile);
		fclose($myfile);

		$url = "https://vicare.vn/a-".trim($current).'/' ;
		//$url = "https://vicare.vn/khoa-kham-chua-benh-theo-yeu-cau-benh-vien-dai-hoc-y-ha-noi-29068/";
		echo $url;
		$clinic_id = $current;
	//	$url = $lines[$current]; //line 2
		$inner = getDetailMediction(trim($url));
		save($inner);
	function save($inner){
		
	// $valuesArr[] = "('$description', '$packing','$standard','$guide','$duration','$manufacturer','$registered_company','$production_company','$registered_country','$production_country','$registered_number','$warning_medicine','$assign_medicine','$contraindication_medicine','$side_effect_medicine','$careful_medicine','$overdose_medicine', '$preservation_medicine ' ,'$forget_take_medicine', '$interactive_medicine' , '$possible_pharmacological_medicine','$pharmacokinetic_medicine ','$type_medicine','$dosage_forms','$info_drugs')";

	    $sql = "INSERT INTO clinic(clinic_id,clinic_name,clinic_url,profile_image,clinic_desc,clinic_address,facilities) values ";

	   if (is_array($inner)) { 
        $clinic_name = $inner['clinic_name'];
        $clinic_url = $inner['clinic_url'];
        $profile_image = $inner['profile_image'];
        $clinic_description = $inner['clinic_desc'];
        $address = $inner['clinic_address'];
        $cosovatchat = $inner['cosovatchat'];
        $valuesArr[] = "('$clinic_id','$clinic_name','$clinic_url','$profile_image','$clinic_description','$address','$cosovatchat')";
 	    
          $str = implode(',', $valuesArr);
       

	      
	      // echo $str;
          	//$description = htmlentities($description, ENT_QUOTES, "UTF-8");
          	//echo $description;
	     //echo '<pre>';
        //echo $tdp;
		//echo '</pre>';
           $sql .= implode(',', $valuesArr);
           
           $sql=trim($sql);
          // echo $sql;
  			$db->exeNonQuery($sql);
		}
		
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
			$myfile = fopen("clinic.txt", "r") or die("Unable to open file!");
			$current =  fgets($myfile);
			$current=$current+1;
			$myfile = fopen("clinic.txt", "w") or die("Unable to open file!");
			$txt = "$current";
			fwrite($myfile, $txt);
			fclose($myfile);
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
			//return;
			$ret = $html->find('div[id=page-404]',0); 
			if($ret!=null){ echo 'not found'; 
			  //  if($i<10){
					 $myfile = fopen("clinic.txt", "r") or die("Unable to open file!");
					$current =  fgets($myfile);
					fclose($myfile);
					$url = "https://vicare.vn/a-".trim($current).'/' ;
					$inner = getDetailMediction($url);
					save($inner);
				//}
			//	$i=$i+1;
				return;
			}
		    $mediction = array();
		   // $mediction['clinic_name']= split('<',substr($html->find('h1',0)->innertext,22))[0];
		     $mediction['clinic_name']= $html->find('h1 span[itemprop=name]',0)->innertext;
		    $mediction['clinic_url'] = to_url($mediction['clinic_name']);
		    $mediction['clinic_desc']= null;
		    $mediction['profile_image'] = null;
		    $mediction['clinic_address'] = null;
		    $mediction['cosovatchat'] = null;
		    $gioithieu = $html->find('section[id=gioi-thieu] div' ,0);
		    $kinhnghiem = $html->find('section div h2[id=kinh-nghiem]',0);
		  //  echo $gioithieu;
		    if($gioithieu!=null){
		    	$mediction['clinic_desc']= $gioithieu->innertext;
		    }
		    $mediction['profile_image'] =null;
		    if($html->find('aside div[id=hero-image]',0)!=null){
		    	$image = $html->find('aside div[id=hero-image]',0);
		    //	var_dump($image);
		    	//$image = split('url',$image);
		    	$mediction['profile_image'] = $image->attr['data-images'];
		    }
		      if($html->find('aside dl[class=contact-info]',0)!=null){
 					$address = $html->find('aside dl[class=contact-info]',0);
		    //	var_dump($image);
		    	//$image = split('url',$image);
		    	$mediction['clinic_address'] = $address->find('span[itemprop=streetAddress]',0)->innertext;
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
		    		if($item->find('h2[id=co-so-vat-chat-trang-thiet-bi]',0)!=null){
		    			echo 'abc';
		    			//var_dump($item->find('div',0)->innertext);
		    			$mediction['cosovatchat'] = $item->find('div[class]',0)->innertext;
		    		}
		    		if($item->find('h2 i[class=fa fa-graduation-cap]')!=null){
		    			$mediction['training'] = $item->find('div div[class]',1)->innertext;
		    		}

		    	}
		    }
			$html->clear();
	    	unset($html);
	        // var_dump($mediction);

			return $mediction;

		}

