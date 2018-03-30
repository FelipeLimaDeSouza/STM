<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		$tipo = $_POST['tipo'];

		if(($nome == "") || ($email == "") || ($mensagem == "") || ($tipo < 1) || ($tipo > 2)){

			$array = array('status' => 1);

			echo json_encode($array);

		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

	    	$array = array('status' => 2);

			echo json_encode($array);

		}else{

			$quebra_linha = "\n";

			if($tipo == 1){

				$emailsender="email@email.email";

				$emaildestinatario = "email@email.email";

			}elseif ($tipo == 2) {

				$emailsender="email@email.email";

				$emaildestinatario = "email@email.email";

			}

			$nomeremetente     = $nome;
			$emailremetente    = $email;
			$assunto           = "Contato via Site";
			$mensagem          = $mensagem;

			if(!empty($_FILES['curriculo']['name'])){
                        
                $arqVal = substr($_FILES['curriculo']['name'], -4);

                if((!$arqVal === ".pdf") && (!$arqVal === ".doc") && (!$arqVal === "docx") && (!$arqVal === ".odt")){

                    $array = array('status' => 4);

					echo json_encode($array);

                }else{

                	$arquivo = $_FILES["curriculo"]; 

	                $fp = fopen($_FILES["curriculo"]["tmp_name"],"rb"); 
					$anexo = fread($fp,filesize($_FILES["curriculo"]["tmp_name"])); 
					$anexo = base64_encode($anexo); 
					 
					fclose($fp); 
					 
					$anexo = chunk_split($anexo); 
					 
					 
					$boundary = "XYZ-" . date("dmYis") . "-ZYX"; 
					 
					$mens = "--$boundary" . $quebra_linha . ""; 
					$mens .= "Content-Transfer-Encoding: 8bits" . $quebra_linha . ""; 
					$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $quebra_linha . "" . $quebra_linha . ""; 
					$mens .= "<p>".$nome.", via site diz:</p><p>".$mensagem."</p>". $quebra_linha; 
					$mens .= "--$boundary" . $quebra_linha . ""; 
					$mens .= "Content-Type: ".$arquivo["type"]."" . $quebra_linha . ""; 
					$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"" . $quebra_linha . ""; 
					$mens .= "Content-Transfer-Encoding: base64" . $quebra_linha . "" . $quebra_linha . ""; 
					$mens .= "$anexo" . $quebra_linha . ""; 
					$mens .= "--$boundary--" . $quebra_linha . ""; 
					 
					$headers = "MIME-Version: 1.0" . $quebra_linha . ""; 
					$headers .= "From: $emailsender " . $quebra_linha . ""; 
					$headers .= "Return-Path: $emailsender " . $quebra_linha . ""; 
					$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"" . $quebra_linha . ""; 
					$headers .= "$boundary" . $quebra_linha . ""; 
					 
					 
					mail($emaildestinatario,$assunto,$mens,$headers, "-r".$emailsender); 
					 
					$array = array('status' => 3);

					echo json_encode($array);

				}

			}else{

				$mensagem = '<p>'.$nome.', via site diz:</p>
				<p>'.$mensagem.'</p>';

				$headers = "MIME-Version: 1.1".$quebra_linha;
				$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
				$headers .= "From: ".$emailsender.$quebra_linha;
				$headers .= "Return-Path: " . $emailsender . $quebra_linha;
				$headers .= "Reply-To: ".$emailremetente.$quebra_linha;

				mail($emaildestinatario, $assunto, $mensagem, $headers, "-r". $emailsender);

				$array = array('status' => 3);

				echo json_encode($array);

			}

		}

	}else{

		header('Location:home');

	}

?>