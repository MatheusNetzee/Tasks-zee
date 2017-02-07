<?php 
namespace App\Views\tarefa; ?>
	<div class="container">		
		<table class="table fundo table-bordered">
			<tbody>
				<tr>
					<h1>Tarefas por tag</h1>
				</tr>	 
				<tr class="active">
					<td class="tagCor">Tag</td>
					<td>Tarefa</td>
					<td>Prioridade</td>
					<td>Tempo Estimado</td>
					<td>Descrição</td>
					<td>Data</td>
					<td>Status</td>
				</tr>
			<?php foreach($this->views->buscarTarefaTag as $tarefa): 
				 	$data = $tarefa['data'];
                	$string = explode("-",$data);
					$resultado = $string[2]."/".$string[1]."/".$string[0];   ?>
				<tr>					
					<td><i class="fa fa-square" aria-hidden="true" title="<?=$tarefa['nomeTag']?>" style="color:<?=$tarefa['cor']?>; font-size:30px;"></i> </td>
                <?php switch ($tarefa['estado']) {
	                case "F":
	                    $classE = "class='fin'";
	                    break;
	                case "A":
	                    $classE = "class='atr'";
	                    break;
	                default:
	                    $classE =  "";
	                    break;} ?>
	                <td <?=$classE?>  style="background-image:none;"><?=$tarefa['nome']?></td>
	                <?php switch($tarefa['prioridade']){
	                		case '1':
	                			$prioridade = "Alta";
	                			break;
	                		case '2':
	                			$prioridade = "Media";
	                			break;
	                		case '3':
	                			$prioridade = "Baixa";
	                			break;
	                	} ?>
	                <td><?=$prioridade?></td>  
					<td><?=$tarefa['tempoEstimado']?> min</td>	
					<td><?=$tarefa['descricao']?></td>
					<td><?=$resultado?></td>
					<?php switch ($tarefa['estado']) {
						case 'A':
							$status = "Atrasada";
							break;
						case 'F':
							$status = "Finalizada";
							break;
						default:
							$status = "Não iniciada ou em processo";
							break;
					} ?>				
					<td> <?=$status?></td>
									
				</tr>
			<?php endforeach;?>
			<?php if($this->views->buscarTarefaTag == NULL){ ?>
				<tr>
					<td colspan="7" class="alert alert-info"> Não exitem tarefas dessa tag para o dia de hoje </td>
				</tr>
					
			<?php } ?>
			</tbody>
		</table>		
	</div>