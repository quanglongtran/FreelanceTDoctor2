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
		 $myfile = fopen("i.txt", "r") or die("Unable to open file!");
		$current =  fgets($myfile);
		fclose($myfile);
		$current = trim($current);
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
		$medicine_id = $current;
		//$next= $current;
		//for($i = $current ;$i<($current+100);$i++){
			$url = "https://vicare.vn/thuoc/a-".trim($current)."/" ;
			echo $url;
			$inner = getDetailMediction($url);
			//$next++;
			// /var_dump($medicine);
		//}
		$current++;
		$myfile = fopen("i.txt", "w") or die("Unable to open file!");
		$txt = "$current";
		fwrite($myfile, $txt);
		fclose($myfile);

	// $valuesArr[] = "('$description', '$packing','$standard','$guide','$duration','$manufacturer','$registered_company','$production_company','$registered_country','$production_country','$registered_number','$warning_medicine','$assign_medicine','$contraindication_medicine','$side_effect_medicine','$careful_medicine','$overdose_medicine', '$preservation_medicine ' ,'$forget_take_medicine', '$interactive_medicine' , '$possible_pharmacological_medicine','$pharmacokinetic_medicine ','$type_medicine','$dosage_forms','$info_drugs')";

	    $sql = "INSERT INTO medicine(medicine_id,description, packing, standard,guide,duration,manufacturer,register_company,production_company,
	    register_country,production_country,registered_number,warning_medicine,assign_medicine,contraindication_medicine,side_effect_medicine,careful_medicine,overdose_medicine,preservation_medicine,forget_take_medicine,interactive_medicine, possible_pharmacological_medicine,pharmacokinetic_medicine,type_medicine,dosage_forms,info_drugs) values ";

	   if (is_array($inner)) {
		 //$ID = (int) $inner['R_ID'];
	
		 $description =  $inner['tensanpham'];
		 echo $description;
		 $packing =  '';
		 $standard = '';
		 $duration ='';
		 $registered_company ='';
		 $manufacturer ='';
		 $production_company = '';
		 $registered_country ='';
		 $production_country='';
		 $registered_number ='';
         if(isset($inner['donggoi'])){$packing =  $inner['donggoi'];} 
         
         if(isset($inner['tieuchuan'])){
         	$standard =  $inner['tieuchuan'];
         }
         
         $guide =  $inner['huongdansudung'];
         if(isset($inner['tuoitho'])){ $duration =  $inner['tuoitho']; } 

 		 

         if(isset($inner['nhasanxuat']))
		 {$manufacturer = $inner['nhasanxuat'];}  

		 if(isset($inner['congtydangky']))
		 {$registered_company =  $inner['congtydangky'];}
		 if(isset($inner['congtysanxuat']))
		 {$production_company =  $inner['congtysanxuat'];}
		 if(isset($inner['quocgiadangky']))
		 {$registered_country =  $inner['quocgiadangky'];}
		if(isset($inner['quocgiasanxuat']))
		 {$production_country =  $inner['quocgiasanxuat'];}
		if( isset($inner['sodangky']))
		 {$registered_number  =  $inner['sodangky'];} 


         $warning_medicine = ($inner['canhbao'] );       
         $assign_medicine = $inner['chidinh'] ;
         $contraindication_medicine = $inner['chongchidinh'];
         $side_effect_medicine = $inner['tacdungphu'] ;
         $careful_medicine = $inner['luuy'];
         $overdose_medicine = $inner['qualieu'];
         $preservation_medicine = $inner['baoquan'];
         $forget_take_medicine = $inner['neuquenuong'];
         $interactive_medicine = $inner['tuongtac'];
         $possible_pharmacological_medicine = $inner['duocly'];
         $pharmacokinetic_medicine = $inner['duocdonghoc'];
         //new
         $type_medicine ='';
         $dosage_forms='';
         $info_drugs='';
         if(isset($inner['loaithuoc']))
        {$type_medicine =  $inner['loaithuoc'];}
         if(isset($inner['dangbaoche']))
         {$dosage_forms =  $inner['dangbaoche'];}
         if(isset($inner['thongtinduocchat']))
         {$info_drugs = $inner['thongtinduocchat'];} 
         
		
       
      ;
        
        $valuesArr[] = "('$medicine_id','$description', '$packing','$standard','$guide','$duration','$manufacturer','$registered_company','$production_company','$registered_country','$production_country','$registered_number','$warning_medicine','$assign_medicine','$contraindication_medicine','$side_effect_medicine','$careful_medicine','$overdose_medicine', '$preservation_medicine ' ,'$forget_take_medicine', '$interactive_medicine' , '$possible_pharmacological_medicine','$pharmacokinetic_medicine ','$type_medicine','$dosage_forms','$info_drugs')";
 	    
          $str = implode(',', $valuesArr);
       

	      
	      // echo $str;
          	//$description = htmlentities($description, ENT_QUOTES, "UTF-8");
          	//echo $description;
	     //echo '<pre>';
        //echo $tdp;
		//echo '</pre>';
           $sql .= implode(',', $valuesArr);
           //echo $sql;
  			$db->exeNonQuery($sql);
	}   

   

	function getAllUrlMediction($url) {

			$html = file_get_html($url);
			$mediction = array();
			foreach($html->find('ul.grid-layout') as $items)  
			{

				foreach($items->find('li.grid-item') as $post) {
						    		# remember comments count as nodes
					$mediction[]= trim($post->find('a',0)->href);
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
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			$result=curl_exec($ch);
			$html =  str_get_html($result);
			//echo $html;
			//return;
			$ret = $html->find('div[id=page-404]',0); 
			if($ret!=null){ echo 'not found'; return;}
		    $mediction = array();
		    $mediction['tensanpham']= $html->find('h1',0)->innertext;
			$mediction['canhbao'] =  ($temp = $html->find('section.canh-bao div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['huongdansudung'] =  ($temp = $html->find('section.huong-dan-su-dung div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['thongtinduocchat'] =  ($temp = $html->find('section.thong-tin-duoc-chat div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['chidinh'] =  ($temp = $html->find('section.chi-dinh div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['chongchidinh'] =  ($temp = $html->find('section.chong-chi-dinh div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['tacdungphu'] =  ($temp = $html->find('section.tac-dung-phu div.body',0)) ? preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['luuy'] =  ($temp = $html->find('section.luu-y div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['qualieu'] =  ($temp = $html->find('section.qua-lieu  div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['baoquan'] =  ($temp = $html->find('section.bao-quan div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['neuquenuong'] =  ($temp = $html->find('section.neu-quen-uong-thuoc div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
		 	
			$mediction['tuongtac'] =  ($temp = $html->find('section.tuong-tac div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['duocly'] =  ($temp = $html->find('section.duoc-ly-co-the div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
			$mediction['duocdonghoc'] =  ($temp = $html->find('section.duoc-dong-hoc div.body',0)) ?  preg_replace('/\s+/', ' ',($temp->innertext)) : null;
		  	
			foreach($html->find('div.drug-info') as $items)  
			{			
			   	$temp = trim($items->find('h4',0)->innertext);
			   //	echo $temp;
			//$mediction[] = trim($items->find('text',2)->innertext);
			if(strpos($temp,'Nhà sản xuất')!== false)
			{
			   		$mediction['nhasanxuat'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Số đăng ký')!== false)
			{

			$mediction['sodangky'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Đóng gói')!== false)
			{
			$mediction['donggoi'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Tiêu chuẩn')!== false)
			{
			$mediction['tieuchuan'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Tuổi thọ')!== false)
			{
			$mediction['tuoitho'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Công ty sản xuất')!== false)
			{
			$mediction['congtysanxuat'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Quốc gia sản xuất')!== false)
			{
			$mediction['quocgiasanxuat'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Công ty đăng ký')!== false)
			{
			$mediction['congtydangky'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Quốc gia đăng ký:')!== false)
			{
			$mediction['quocgiadangky'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Loại thuốc')!== false)
			{
			$mediction['loaithuoc'] = trim($items->find('text',2)->innertext);
			}
			if(strpos($temp,'Dạng bào chế')!== false)
			{
			$mediction['dangbaoche'] = trim($items->find('text',2)->innertext);
			}
		//	var_dump($items);
			}
			$html->clear();
	    	unset($html);
	    	// /var_dump($mediction);
			return $mediction;

		}
