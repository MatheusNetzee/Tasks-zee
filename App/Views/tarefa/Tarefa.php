<?php error_reporting(0); ?>            
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
                     echo "<td>";
                    foreach($this->views->tarefas as $tarefa):
                         $resultado = Date_format($tarefa->getData(), "d/m/Y");      
                        if($resultado == $dataSemana){
                        echo "<span class='span-tag'>";
                            foreach($tarefa->getTag() as $tag): ?>                                        
                                      <i class="fa fa-circle" title="<?=$tag->getNome();?>" aria-hidden="true" style="color:<?=$tag->getCor();?>"></i>                                     
                      <?php endforeach ;
                        echo "</span>";
                                    switch ($tarefa->getEstado()) {
                                case "F":
                                    $classE = "class='fin'";
                                    break;
                                case "A":
                                    $classE = "class='atr'";
                                    break;
                                default:
                                    $classE =  "";
                                    break;} ?>                                                                                   
                                <span <?=$classE?> style="width:49%; display:inline-block; text-align:left;"><?=$tarefa->getNome();?></span><br/>
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
                            $resultado = Date_format($tarefa->getData(), "d/m/Y");                           
                    if($resultado == $hoje){  ?>
                        <tr>
                            <td>                            
                        <?php foreach($tarefa->getTag() as $tag): ?> 
                            <i class="fa fa-circle" title="<?=$tag->getNome();?>" aria-hidden="true" style="color:<?=$tag->getCor();?>"></i>                        
                        <?php  endforeach ; ?>
                                <?php switch ($tarefa->getEstado()) {
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
                                <td <?=$classE?> ><?=$tarefa->getNome();?></td>
                                <td><?=$tarefa->getTempoEstimado();?> min</td>
                                <td>
                                    <form action="<?=URL?>alteraStatus" method="POST">
                                        <input type="hidden" name="tarefa_id" value="<?=$tarefa->getId();?>">
                                        <button class="btn btn-info">Alterar Status</button>
                                    </form>                                   
                                </td>                                                      
                            </td>                                        
                        <?php $minutosRestantes = $minutosRestantes - $tarefa->getTempoEstimado();;
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
                                <td colspan="4"  class="alert-info text-center">Não tem mais horas disponíveis para novas tarefas hoje :C </td>
                                <?php } elseif($stringHoras == NULL){?>                                
                                <td colspan="4"  class="alert-info text-center">Ainda lhe restam 24 horas do seu dia</td>
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
                            $resultado = Date_format($tarefa->getData(), "d/m/Y");         
                    if($resultado == $ontem){?>                        
                            <tr>
                                <td>                            
                    <?php foreach($tarefa->getTag() as $tag): ?> 
                                    <i class="fa fa-circle" title="<?=$tag->getNome();?>" aria-hidden="true" style="color:<?=$tag->getCor();?>"></i>                         
                            <?php  endforeach; ?>
                                    <?php switch ($tarefa->getEstado()) {
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
                                    <td <?=$classE?> ><?=$tarefa->getNome();?></td>
                                    <td><?=$tarefa->getTempoEstimado();?> min</td>                                         
                                </td> 

                        <?php   if($tarefa->getEstado() == "F"){                            
                                    $horasUsadas = $horasUsadas + $tarefa->getTempoEstimado();
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
                                            <i class="fa fa-circle" for="id_tag" aria-hidden="true" style="color:<?=$tag->getCor();?>"></i> 
                                        </span>
                                    <a href="<?=URL?>tarefaTag?id_tag=<?=$tag->getId();?>"><label class="form-control" style="background-color:#fff;" value=""><?=$tag->getNome();?></label></a>
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
                                    $tarefa_tag['id_tag'] == $tag->getId();?>
                            <div class="form-check">                           
                                <input type="hidden" value=<?=$tag->getId();?>>
                                <label class="form-check-label">                               
                                    <input class="form-check-input" type="checkbox" name="id_tag[]" value="<?=$tag->getId();?>">
                                      <i class="fa fa-circle" aria-hidden="true" style="color:<?=$tag->getCor();?>"></i> <?=$tag->getNome();?>        
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

