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
  <?php foreach($this->views->tarefas as $tarefa):
			foreach ($tarefa->getTag() as $tag):
				if($_GET['id_tag'] == $tag->getId()):
				 $resultado = Date_format($tarefa->getData(), "d/m/Y");?>
				<tr>					
					<td><i class="fa fa-square" aria-hidden="true" title="<?=$tag->getNome()?>" style="color:<?=$tag->getCor();?>; font-size:30px;"></i> </td>
                <?php switch ($tarefa->getEstado()) {
	                case "F":
	                    $classE = "class='fin'";
	                    break;
	                case "A":
	                    $classE = "class='atr'";
	                    break;
	                default:
	                    $classE =  "";
	                    break;} ?>
	                <td <?=$classE?>  style="background-image:none;"><?=$tarefa->getNome();?></td>
	                <?php switch($tarefa->getPrioridade()){
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
					<td><?=$tarefa->getTempoEstimado();?> min</td>	
					<td><?=$tarefa->getDescricao();?></td>
					<td><?=$resultado?></td>
					<?php switch ($tarefa->getEstado()) {
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
			<?php 
				endif;				
			endforeach;
		endforeach;
				?>			
<!-- 				<tr>
					<td colspan="7" class="alert alert-info"> Não exitem tarefas dessa tag para o dia de hoje </td>
				</tr> -->					
			</tbody>
		</table>		
	</div>