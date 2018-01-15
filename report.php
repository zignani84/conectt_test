<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);	
	
	function relEnroll(){
	    require_once("connection/connect.php");
		
		$query = $conn->prepare("SELECT name, data 
			FROM `users`");
		try{
			$query->execute();
			$query_result = $query->fetchAll(PDO::FETCH_ASSOC);
			if ($query_result){
				//var_dump($query_result);
				
				$newArray = array();
				foreach($query_result as $key => $value) {
					if (array_key_exists("data", $value)) {
						//var_dump($value);
						$value = array($value['name'],getAge($value['data']));
					}
					array_push($newArray, $value);
				}
				
				array_multisort($newArray, SORT_ASC, SORT_NUMERIC);			
				//var_dump($newArray);
				
				foreach($newArray as $key => $value) {
					echo ("<tr><td>".$value[0]."</td>". "<td>".$value[1]."</td></tr>");
				}
				
			}else{
				echo "Nenhuma inscrição.";				
			}
		}catch(PDOException  $e ){
			echo "Error: ".$e;
		}
	}
	
	function removeBlank ( $value ){
		$fullData = explode("-",$value);
		$year = $fullData[0];
		$month = $fullData[1];
		$day = $fullData[2];
		
		return $newData = $year.$month.$day;
	}
	
	function getAge ( $value ){
		$data_nasc = removeBlank($value);
		
		$data = new DateTime($data_nasc);
		
		$yearData = $data->diff(new DateTime());
		
		return $yearData->y;	
	}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">       
        
        <title>Relatório de Inscritos</title>
        
        <link href='http://fonts.googleapis.com/css?family=OpenSans:300,400,700' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        
   </head>

<body>   
	<section>

        <div class="container">
          <h2>Relatório de Inscritos</h2>
          <p>Por ordem de Idade:</p>                                                                                      
          <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Idade</th>
              </tr>
            </thead>
            <tbody>
				<?php echo relEnroll(); ?>
            </tbody>
          </table>
          </div>
        </div>

    </section>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

</body>
</html>