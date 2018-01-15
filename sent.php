<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);
	
	require_once("connection/connect.php");

	if( $_SERVER['REQUEST_METHOD']=='POST' )
	{
		$query = $conn->prepare("SELECT cpf, email 
			FROM `users` 
			WHERE cpf LIKE '%".getPost('cpf')."%' 
			AND email LIKE '%".getPost('email')."%' ");
		try{
			$query->execute();
			$query_result = $query->fetchAll();
			if ($query_result){
				echo "Você já está cadastrado. Aguarde que entraremos em contato.";
			}else{
				$sql = $conn->prepare("INSERT INTO `users` (`name`, `cpf`, `data`, `email`, `company`, `telefone`, `cell`)
					VALUES
					('".getPost('nome')."', '".getPost('cpf')."', '".sentData(getPost('data'))."', '".getPost('email')."', '".getPost('empresa')."', '".getPost('telefone')."', '".getPost('celular')."')");
				try{
					if ($sql->execute())
						echo "Formulário enviado com sucesso. Em breve entraremos em contato.";
				}catch(PDOException  $e ){
					echo "Error: ".$e;
				}					
			}
		}catch(PDOException  $e ){
			echo "Error: ".$e;
		}
	}else{
		echo "erro!";
	}
	function getPost( $key ){
		return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
	}
	function sentData ( $value ){
		$fullData = explode("/",$value);
		$day = $fullData[0];
		$month = $fullData[1];
		$year = $fullData[2];
		
		return $newData = $year. "-" .$month. "-" .$day;
	}
	function filter( $var ){
		return $var;
	}
?>