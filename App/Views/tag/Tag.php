	<div class="container">	
		<table class="table">

			<h1>Adicionar Tags</h1>
			<tbody>
				<form action="<?= URL?>adicionaTag" method="POST">			
					<tr>
						<td>Nome</td>
					<tr>
					<tr>
						<td><input class="form-control" type="text" name="nome"></td>
					</tr>
					<tr>
						<td>Descricao</td>
					</tr>
					<tr>
						<td><textarea class="form-control" name="descricao"></textarea>
					</tr>
					<tr>
						<td>Cor</td>				
					</tr>
					<tr>
						<td><input class="form-control" type="color" name="cor" value="#000000" style="width:7.5%;"></td>		
					</tr>			
					<tr>
						<td><button class="btn btn-primary text-right">Cadastrar</button></td>
					</tr>
				</form>
			</tbody>
		</table>

		<table class="table fundo table-bordered">
			<tbody>
				<tr>
					<h1>Lista Tags</h1>
				</tr>
				<tr class="active">
					<td class="tagCor">Cor tag</td>
					<td>Nome</td>
					<td colspan="2">Descrição</td>
				</tr>				
				<?php foreach($this->views->tags as $tag): ?>
				<tr>
				   	<td>
						<i class="fa fa-square" aria-hidden="true" style="color:<?=$tag['cor']?>; font-size:30px;"></i>						
					</td>
					<td><?=$tag['nome']?></td>
					<td><?=$tag['descricao']?></td>
					<td class="text-center">
						<form action="<?=URL?>removeTag" method="POST">
							<input type="hidden" name="tag_id" value="<?=$tag['id']?>">
							<button class="btn btn-danger">Deletar</button>	
						</form>
					</td>
				</tr>
				<?php endforeach?>				
			</tbody>
		</table>

		<div class="clear"></div>
        <?php if (isset($_GET["msg"])) { ?>
        <div class="alert alert-info text-center">
        <?= $_GET["msg"]; ?>
        </div>
        <?php }?>
	</div>	