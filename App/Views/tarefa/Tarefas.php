<?php 
namespace App\Views\tarefa;
error_reporting(0); ?>            
            <div class="container">            
                <div class="btn-group" role="group">
                    <button type="button" id="yesterday" class="btn btn-default">Ontem</button>                   
                    <button type="button" id="today" class="btn btn-default">Hoje</button>
                    <button type="button" id="week" class="btn btn-default">Semana</button>
                </div>
                <div>
                       <button type="button" id="novaTarefa" class="btn btn-success">Nova Tarefa</button>            
                </div>               
                <div class="calendario-semana">
                    <table class="table calendario table-bordered ">  
                        <tbody>                          
                        <?php   $dia = date("d"); 
                                $mes = date("m");  
                                $ano = date("Y");
                                $diaSemana = date("w"); ?>
                                              
    <?php for($i=0; $i <=6 ; $i++){                            
          $dataSemana = date("d/m/Y",mktime(0,0,0,$mes,($dia-$diaSemana)+$i,$ano)); ?>
            <tr class="active">
                <td><?=$dataSemana?></td>
            </tr>
            <?php
                echo "<tr>";               
                     echo "<td >";
                    foreach($this->views->tarefas as $tarefa):
                        $string = explode("-",$tarefa['data']);
                        $resultado = $string[2]."/".$string[1]."/".$string[0];
                        if($resultado == $dataSemana){
                        echo "<span class='span-tag'>";
                            foreach($this->views->cor as $tag):
                                   if($tarefa['id'] == $tag['id']){ ?>                                        
                                      <i class="fa fa-circle" title="<?=$tag['nome']?>" aria-hidden="true" style="color:<?=$tag['cor'] ?>"></i>
                                     
                                   <?php } 
                                        endforeach ;
                        echo "</span>";
                                    switch ($tarefa['estado']) {
                                case "F":
                                    $classE = "class='fin'";
                                    break;
                                case "A":
                                    $classE = "class='atr'";
                                    break;
                                default:
                                    $classE =  "";
                                    break;} ?>                                                                                   
                                <span <?=$classE?> style="background-image:none; width:49%; display:inline-block; text-align:left;"><?=$tarefa['nome']?></span><br/>
                     <?php }                                                   
                    endforeach;            
                    echo "</td>";        
                echo "</tr>"; 
                            }
                        ?>                        
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>

                
                <div class="calendario-dia-hoje">
                    <table class="table calendario table-bordered ">  
                        <tbody> 
                            <tr class="active"> 
                        <?php   $hoje = date("d/m/Y");
                                $minutosRestantes = 1440;
                                $qtdeHoras = 0; ?>
                                <td colspan="4" class="titulo"><?=$hoje?></td>                               
                            </tr>                            
                    <?php foreach($this->views->tarefas as $tarefa):
                            $string = explode("-",$tarefa['data']);
                            $resultado = $string[2]."/".$string[1]."/".$string[0];             
                    if($resultado == $hoje){  ?>
                        <tr>
                            <td>                            
                        <?php foreach($this->views->cor as $tag):
                            if ($tarefa['id'] == $tag['id']){ ?> 
                            <i class="fa fa-circle" title="<?=$tag['nome']?>" aria-hidden="true" style="color:<?=$tag['cor'] ?>"></i>
                        <?php } ?> 
                        <?php  endforeach ; ?>
                                <?php switch ($tarefa['estado']) {
                                    case "F":
                                        $classE = "class='fin'";
                                        break;
                                    case "A":
                                        $classE = "class='atr'";
                                        break;
                                    default:
                                        $classE =  "";
                                        break;
                                } ?>
                                <td <?=$classE?> ><?=$tarefa['nome']?></td>
                                <td><?=$tarefa['tempoEstimado']?> min</td>
                                <td>
                                    <form action="<?=URL?>alteraStatus" method="POST">
                                        <input type="hidden" name="tarefa_id" value="<?=$tarefa['id']?>">
                                        <button class="btn btn-info">Alterar Status</button>
                                    </form>                                   
                                </td>                                                      
                            </td>                                        
                        <?php $minutosRestantes = $minutosRestantes - $tarefa['tempoEstimado'];
                              $seconds = $minutosRestantes * 60;
                              $qtdeHoras = gmdate("H:i:s", $seconds);
                              $separaTempo = explode(":",$qtdeHoras);
                            if($separaTempo['0'] == '01'){
                                 $stringHoras = $separaTempo['0']." hora e ".$separaTempo['1']." minutos";
                             } else {
                                $stringHoras = $separaTempo['0']." horas e ".$separaTempo['1']." minutos";
                            }                               
                        }  
                        endforeach ?>                        
                            </tr>          
                            <tr>
                                <?php if($minutosRestantes == '0'){ ?>
                                <td colspan="4"  class="alert-info text-center">Não tem mais horas disponíveis para novas tarefas hoje :C</td>
                                <?php } else {?>                                
                                <td colspan="4"  class="alert-info text-center">Ainda lhe restam <?=$stringHoras?> do seu dia</td>
                                <?php } ?>
                            </tr>                  
                        </tbody>
                    </table>                                    
                </div>
                <div class="clear"></div>

                <div class="calendario-dia-ontem">
                    <table class="table calendario table-bordered ">  
                        <tbody> 
                            <tr class="active"> 
                        <?php   $horasUsadas = 0;                                
                                $diaOntem = date("d") - 1;
                                $dataOntem = mktime(0,0,0,$mes,$diaOntem,$ano);
                                $ontem = date('d/m/Y',$dataOntem); ?>
                                <td colspan="3" class="titulo"><?=$ontem?></td>
                            </tr>                            
                    <?php foreach($this->views->tarefas as $tarefa):                          
                            $data = $tarefa['data'];
                            $string = explode("-",$data);
                            $resultado = $string[2]."/".$string[1]."/".$string[0]; 
                    if($resultado == $ontem){?>                        
                            <tr>
                                <td>                            
                    <?php foreach($this->views->cor as $tag):
                                if ($tarefa['id'] == $tag['id']){ ?> 
                                    <i class="fa fa-circle" title="<?=$tag['nome']?>" aria-hidden="true" style="color:<?=$tag['cor'] ?>"></i>
                            <?php } ?> 
                            <?php  endforeach; ?>
                                    <?php switch ($tarefa['estado']) {
                                        case "F":
                                            $classE = "class='fin'";
                                            break;
                                        case "A":
                                            $classE = "class='atr'";
                                            break;
                                        default:
                                            $classE =  "";
                                            break;
                                    } ?>
                                    <td <?=$classE?> ><?=$tarefa['nome']?></td>
                                    <td><?=$tarefa['tempoEstimado']?> min</td>                                         
                                </td> 

                        <?php   if($tarefa['estado'] == "F"){                            
                                    $horasUsadas = $horasUsadas + $tarefa['tempoEstimado'];
                                    $seconds = $horasUsadas * 60;
                                    $qtdeHoras = gmdate("H:i:s", $seconds);
                                    $separaTempo = explode(":",$qtdeHoras);
                                    $stringHorasOntem = ''; 
                                    if($separaTempo['0'] == '01'){
                                        $stringHorasOntem = $separaTempo['0']." hora e ".$separaTempo['1']." minutos";
                                    }else{
                                        $stringHorasOntem = $separaTempo['0']." horas e ".$separaTempo['1']." minutos";
                                    }
                                }                            
                            }
                        endforeach ?>                        
                            </tr>
                                <?php if ($stringHorasOntem == '') { ?>
                                <td colspan="4"  class="alert-info text-center">Não realizou nenhuma tarefa ontem :C</td>
                                <?php } else { ?>                                
                                <td colspan="4"  class="alert-info text-center">Você gastou <?=$stringHorasOntem?> ontem</td>
                                <?php } ?>                             
                        </tbody>
                    </table>
                </div>

                <div class="clear"></div>

                <?php if (isset($_GET["msg"])) { ?>
                <div class="alert alert-info text-center">
                    <?= $_GET["msg"]; ?>
                </div>
                <?php }?>

               <div class="clear"></div>

                <div class="painel-tarefa-tag">               
                    <div class="panel panel-default">
                       <div class="panel-heading"><h4 >Tarefa por tag diária</h4></div>
                            <div class="panel-body">
                                <?php foreach($this->views->tags as $tag): ?>                                  
                                     <div class="input-group">
                                        <span class="input-group-addon">                                            
                                            <i class="fa fa-circle" for="id_tag" aria-hidden="true" style="color:<?=$tag['cor']?>"></i> 
                                        </span>
                                    <a href="<?=URL?>tarefaTag?id_tag=<?=$tag['id']?>"><label class="form-control" style="background-color:#fff;" value=""><?=$tag['nome']?></label></a>
                                    </div> 
                                    <?php endforeach;?>
                             </div>
                        </div>
                    </div> 

               <div class="clear"></div>

                <div id="novaTarefaForm" class="painel-tarefa">
                <div class="sombra"></div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                            <h4>Adicionar Tarefa</h4>
                            <a><i class="fa fa-window-close" aria-hidden="true"></i></a>
                      </div>
                      <div class="panel-body">
                        <form method="POST" action="<?=URL?>adicionaTarefa">                            
                            <div class="form-group">
                                <label for="nomeT">Nome: </label>
                                <input type="text" class="form-control" name="nome" id="nomeT">
                              </div>
                            <div class="form-group">
                                <label for="descricaoT">Descricao </label>
                                <input type="text" class="form-control" name="descricao" id="descricaoT">
                            </div>
                            <div class="form-group">
                              <label class="mr-sm-2" for="pridoridadeT">Nivel de Prioridade</label>
                              <select class="form-control" name="prioridade" id="pridoridadeT">
                                    <option selected>Escolha um...</option>
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Baixo</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="dataT">Data: </label>
                                <input type="date" class="form-control" name="data" id="dataT">
                            </div>
                            <div class="form-group">
                                <label for="dataE">Tempo Estimado: </label>
                                <input type="number" class="form-control" id="dataE" name="tempoEstimado">
                            </div>
                            <?php foreach($this->views->tags as $tag):
                                    $tarefa_tag = array('id_tag' => "");
                                    $tarefa_tag['id_tag'] == $tag['id'];  ?>
                            <div class="form-check">                           
                                <input type="hidden" value=<?=$tag['id'];?>>
                                <label class="form-check-label">                               
                                    <input class="form-check-input" type="checkbox" name="id_tag[]" value="<?=$tag['id']?>">
                                      <i class="fa fa-circle" aria-hidden="true" style="color:<?=$tag['cor']?>"></i> <?=$tag['nome']?>        
                                </label>
                              <?php endforeach ?>                             
                              <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>                 
                        </form>
                    </div>                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
