<?php
/*
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname ='medicvn';	
$conn = mysqli_connect($servername, $username, $password,$dbname);
 
if(!$conn)
{
	echo "Connect Failed!". mysqli_connect_error($conn);
}
else
{
	echo "Successsful";
}


			$sqlSelect = "SELECT * FROM medicine";

			$result = mysqli_query($conn, $sqlSelect);

			$sql = "SELECT  COUNT(description) FROM medicine";
			$kq = mysqli_query($conn, $sql);
			$row2 = mysqli_fetch_assoc($kq);
			if(mysqli_fetch_assoc($result) > 0)
				{
					while ($row = mysqli_fetch_assoc($result))
	{
		//echo $row2;
		echo "<br/>";
		echo $row['description'];
		echo "<br />";
	}	
}*/
        set_time_limit(12000);
		include('simple_html_dom.php');
		include('dbConnect.php');
		$data = array();
		$db = new dbConnect('localhost','root','','medicvn');

		function getAllurlDisease($url)
		{
			$html = file_get_html($url);
			$disease = array();
			foreach($html->find('ul.collapsible-targe') as $items)  
			{

				foreach($items->find('li') as $post) {
						    		# remember comments count as nodes
					$disease[]= trim($post->find('a',0)->href);
					//$disease[] = trim($post->find('h3',0)->plaintext);
					//$disease[''] = trim($post->find('div.cms',0)->plaintext);

				}

			}
			return $disease;
		}
		
		$benhs = array();
		$benh = array();
		$ketqua = array();

		//$i =  170;
	$url = "https://vicare.vn/benh/";

	// Start from the main page

	//$nextLink = $url;
	$html = new simple_html_dom();
    $html->load_file($url);
	$benh=  getAllurlDisease("$url");
	array_push($benhs, $benh);
    $html->clear();
	unset($html);
	    //$i++;
	$benh = [];
	    //echo "<hr>nextLink: $nextLink<br>";
					
	echo '<pre>';
	print_r($benhs);
	echo '</pre>';

?>