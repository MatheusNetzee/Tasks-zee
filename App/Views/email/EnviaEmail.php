<?php
	$mail = new PHPMailer();
	$mensagem = "<table class='table fundo table-bordered' style='width: auto; text-align:left; color:#000000;'>
			<tbody>	
			<tr><h2> Tarefas de Hoje ". date('d/m/Y')." </h2></tr>
			<tr>
				<th>Tag</th>
				<th style='padding-right:100px'>Tarefa</th>
				<th style='padding-right:15px'>Prioridade</th>
				<th style='padding-right:15px'>Tempo Estimado</th>
				<th style='padding-right:100px'>Descrição</th>
				<th>Status</th>
			</tr>";
			foreach($this->views->tarefas as $tarefa) {				
			$resultado = Date_format($tarefa->getData(), "d/m/Y");             
			$hoje = date('d/m/Y');  
	    	if($resultado == $hoje){ 
	$mensagem .=  "<tr><td>";
		    foreach($tarefa->getTag() as $tag):		            
		           $mensagem .=  "<span title='". $tag->getNome()."' style=' margin-right:5px; height:25px; width: 25px; display:inline-block; background:".$tag->getCor()."'></span>";         
		         endforeach ;
	      $mensagem .=	"</td><td>". $tarefa->getNome() ."</td>";
	        	 switch($tarefa->getPrioridade()){
	                		case '1':
	                			$prioridade = "Alta";
	                			break;
	                		case '2':
	                			$prioridade = "Media";
	                			break;
	                		case '3':
	                			$prioridade = "Baixa";
	                			break;
	                	} 
   $mensagem .="<td>".  $prioridade ."</td>
	        	<td>".  $tarefa->getTempoEstimado() ." minutos </td>
	        	<td>".  $tarefa->getDescricao() ."</td>";
			    switch ($tarefa->getEstado()) {
					case 'A':
						$status = 'Atrasada';
						break;
					case 'F':
						$status = 'Finalizada';
						break;
					default:
						$status = 'Não iniciada ou em processo';
						break;
				} 			
			$mensagem .= "<td>".  $status ."</td></tr>"; } }  	


	// echo $mensagem;

	// die();
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$enderecoEmail = $_POST['enderecoEmail'];

	
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
	$mail->Port = 587;
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'tasks.zee12@gmail.com'; // Usuário do servidor SMTP
	$mail->Password = 'teste123456789'; // Senha do servidor SMTP
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "tasks.zee12@gmail.com"; // Seu e-mail
	$mail->FromName = "Tasks-zee"; // Seu nome
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress($email, $nome);
	$mail->AddAddress($enderecoEmail);
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Today's tasks"; // Assunto da mensagem
	$mail->Body = $mensagem;
	$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
	// Envia o e-mail
	$enviado = $mail->Send();
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	// Exibe uma mensagem de resultado
	if ($enviado) {
	  echo "<div class='alert alert-info text-center' style='margin-top:15px;'><h3>E-mail enviado com sucesso!</h3></div>";
	} else {
	  echo "Não foi possível enviar o e-mail.";
	  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}

	echo $mensagem;