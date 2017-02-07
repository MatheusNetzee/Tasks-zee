$(document).ready(function(){
	$(".calendario-dia-ontem").hide();
	$(".calendario-semana").hide();
	$("#novaTarefaForm").hide();
	
	$("#week").click(function(){
		$(".calendario-semana").show();
		$(".calendario-dia-hoje").hide();
		$(".calendario-dia-ontem").hide();
	});

	$("#today").click(function(){
		$(".calendario-semana").hide();
		$(".calendario-dia-hoje").show();
		$(".calendario-dia-ontem").hide();
	});

	$("#yesterday").click(function(){
		$(".calendario-dia-ontem").show();
		$(".calendario-dia-hoje").hide();
		$(".calendario-semana").hide();
	});
	$("#novaTarefa").click(function(){
		$(".sombra").addClass('active');
		$("#novaTarefaForm").fadeIn();		
	});
    $(".sombra").click(function(){

		$("#novaTarefaForm").fadeOut(); 
    	$(".sombra").removeClass('active');	
	});
 });
