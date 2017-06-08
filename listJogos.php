<?php
	include('includes/dbconnect.php');
	$consulta = $conexao->prepare("SELECT * FROM jogos");
	$consulta->execute();
	$registros = $consulta->fetchAll();
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Loja de Jogos.">
	    <title>Admin - Listar Jogos</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal-default-theme.css" rel="stylesheet" type="text/css">
	    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
	</head>

	<body>
	
	    <!-- Navigation -->
	    <?php
	    	include("includes/adminNavigation.php");
	    ?>

	    <!-- Page Content -->
	    <div class="container dataTable">

	    	<a class="btn btn-success btnCreate" href="#editModal">Adicionar</a>
	    	<br>
	    	<br>
	    
	    	<table id="jogos" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Nome</th>
	    				<th>Categoria</th>
	    				<th>Descrição</th>
	    				<th>Preço</th>
	    				<th>Gerenciar</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    				foreach ($registros as $key => $value) 
	    				{
		    				echo "<tr>
				    				<td class='jogoName' data-id='".$value['jogoID']."'>".$value['jogoName']."</td>
				    				<td class='jogoCategory'>".$value['jogoCategory']."</td>
				    				<td class='jogoDescription'>".$value['jogoDescription']."</td>
				    				<td class='jogoPrice'>".$value['jogoPrice']."</td>
				    				<td>
				    					<a href='#editModal' type='button' class='btn btn-sm btn-warning btnEdit'>Editar</a>
				    					<a href='#deleteModal' type='button' class='btn btn-sm btn-danger btnDelete'>Deletar</a>
				    				</td>
				    			</tr>";
	    				}
	    			?>
	    		</tbody>
	    	</table>
	    	
			<div class="remodal" data-remodal-id="editModal">
				<button data-remodal-action="close" class="remodal-close"></button>
				<form class="well form-horizontal" method="post" id="registerForm">
					<fieldset>
						<!-- Form Name -->
						<legend id="modalTitle" class="text-center">Editar Jogo</legend>

						<!-- Hidden ID-->
						<input type="hidden" name="jogoID" value="">
				
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">Nome</label>  
							<div class="col-md-12 center-block text-center pagination-centered inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-gamepad" aria-hidden="true"></i></span>
									<input name="jogoName" placeholder="Nome do jogo" class="form-control" type="text">
								</div>
							</div>
						</div>
				
						<!-- Text input-->
						<div class="form-group"> 
							<label class="col-md-12">Categoria</label>
							<div class="col-md-12 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<select name="jogoCategory" class="form-control selectpicker" >
										<option value=" ">Selecione a Categoria</option>
										<option value="Adventure RPG">Alabama</option>
										<option value="Alaska">Alaska</option>
									</select>
								</div>
							</div>
						</div>
				
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">Descrição</label>  
							<div class="col-md-12 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
									<input name="jogoDescription" placeholder="Descrição do jogo" class="form-control" type="text">
								</div>
							</div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">Preço</label>  
							<div class="col-md-12 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
									<input id="jogoPrice" name="jogoPrice" placeholder="10,00" class="form-control" type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-12">Imagem</label>  
							<div class="col-md-12 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
									<input id="jogoImage" name="jogoImage" class="form-control" type="file">
								</div>
							</div>
						</div>
				
						<!-- Button -->
						<div class="form-group">
							<div class="col-md-12">
								<button type="submit" class="btn btn-warning">Enviar <span class="glyphicon glyphicon-send"></span></button>
							</div>
						</div>
					</fieldset>
				</form>
				<br>
				<button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
			</div>
			
			<div class="remodal" data-remodal-id="deleteModal">
				<button data-remodal-action="close" class="remodal-close"></button>
				<h2>Deseja deletar este jogo?</h2>
				<p class="deleteJogo"></p>
				<br>
				<button data-remodal-action="cancel" class="remodal-cancel">Não</button>
				<button data-remodal-action="confirm" class="remodal-confirm">Sim</button>
			</div>
	
	        <!-- Footer -->
	    <?php
	    	include("includes/footer.php");
	    ?>
		
	    </div>
	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/jquery.dataTables.min.js"></script>
	    <script src="js/jquery.mask.min.js"></script>
	    <script src="js/remodal.js"></script>
	    <script src="js/bootstrapValidator.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#registerForm').bootstrapValidator({
			        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            jogoName: {
			                validators: {
			                        stringLength: {
		                        	message: 'O nome deve conter no mínimo 2 caracteres.',
			                        min: 2,
			                    },
			                        notEmpty: {
			                        message: 'Preencha o nome do jogo.'
			                    }
			                }
			            },
			            jogoCategory: {
			                validators: {
			                     notEmpty: {
			                    	message: 'Selecione a categoria do jogo.'
			                    }
			                }
			            },
			            jogoDescription: {
			                validators: {
			                    notEmpty: {
			                        message: 'Preencha a descrição do jogo.'
			                    },
			                    stringLength: {
		                        	message: 'A descrição deve conter no mínimo 2 caracteres.',
			                        min: 2
			                    }
			                }
			            },
			            jogoPrice: {
			            	validators: {
			            		notEmpty: {
			            			message: 'Preencha o preço do jogo.'
			            		}
			            	}
			            }
	            	}
		        })
		        .on('success.form.bv', function(e) {
		            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
		                $('#registerForm').data('bootstrapValidator').resetForm();
		
		            // Prevent form submission
		            e.preventDefault();
		
		            // Get the form instance
		            var $form = $(e.target);
		
		            // Get the BootstrapValidator instance
		            var bv = $form.data('bootstrapValidator');
		
		            // Use Ajax to submit form data
		            $.post($form.attr('action'), $form.serialize(), function(result) {
		                console.log(result);
		            }, 'json');
		        });
			});
		</script>
	    <script>
	    	$(document).ready(function(){
	    		$("#jogos").DataTable({
	    			"language": {
	    				"url": "json/Portuguese-Brasil.json"
	    			}
	    		});

	    		$("#jogoPrice").mask("00.000,00", {reverse: true});

	    		$(".btnCreate").click(function(){
	    			$("#modalTitle").text("Criar Jogo");
	    			$("input[name='jogoID']").val("");
	    			$("input[name='jogoName']").val("");
	    			$("option[value=' ']").attr("selected", "selected");
	    			$("input[name='jogoDescription']").val("");
	    			$("input[name='jogoPrice']").val("");
	    		});
	    		
	    		$(".btnEdit").click(function(){
	    			$("#modalTitle").text("Editar Jogo");
	    			var $item = $(this).closest("tr");
	    			var jogoName = $($item).find(".jogoName").html();
	    			var jogoCategory = $($item).find(".jogoCategory").html();
	    			var jogoDescription = $($item).find(".jogoDescription").html();
	    			var jogoPrice = $($item).find(".jogoPrice").html();
	    			var jogoID = $($item).find(".jogoName").data("id");

	    			$("input[name='jogoID']").val(jogoID);
	    			$("input[name='jogoName']").val(jogoName);
	    			$("option[value='"+jogoCategory+"']").attr("selected", "selected");
	    			$("input[name='jogoDescription']").val(jogoDescription);
	    			$("input[name='jogoPrice']").val(jogoPrice);
	    		});
	    		
	    		$(".btnDelete").click(function(){
	    			var $item = $(this).closest("tr");
	    			var jogoName = $($item).find(".jogoName").html();
	    			$(".deleteJogo").empty().append(jogoName);
	    		});
	    	});
	    </script>
	</body>
</html>