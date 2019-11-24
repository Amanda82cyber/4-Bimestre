<?php
	include("menu.php");
?>

	<script>
		$(document).ready(function(){
			$("#cadastrar").click(function(){
				$.ajax({
					url: "inserir_loja.php",
					type: "post",
					data: {nome:$("#nome").val(), cnpj:$("#cnpj").val(), email:$("#email").val(), estado:$("#est").val(), cidade:$("#cid").val(), rua:$("#rua").val(), pais:$("#pais").val(), senha:$("#senha").val()},
					
					beforeSend: function(){
						$("#b").html("Inserindo loja...");
						$("#b").css("color", "purple");
					},
					
					success: function(data){
						if(data==1){
							$("#b").html("Loja inserida no sistema com sucesso!");
							$("#b").css("color", "green");
							
							$("#nome").val("");
							$("#cnpj").val("");
							$("#email").val("");
							$("#est").val("");
							$("#cid").val("");
							$("#rua").val("");
							$("#pais").val("");
							$("#senha").val("");
						}else{
							$("#b").html("Não foi possível inserir loja no sistema!");
							$("#b").css("color", "red");
						}
					},
					
					error: function(e){
						$("#b").html("Sistema em manutenção. Tente novamente mais tarde!" + e);
						$("#b").css("color", "red");
					}
				});
			});
		});
	</script>

	<div class = "container-fluid">
	
		<div class = "row"><div class = "col-12 text-center p-3"><h3>Cadastrar Loja</h3></div></div>
		
		<form>
			<div class = "form-row"> 
				<div class = "form-group col-md-4">
					<label for = "nome">Nome: </label>
					<input type = "text" id = "nome" required = "required" class = "form-control" />
				</div>	
			
				<div class = "form-group col-md-4">
					<label for = "cnpj">CNPJ: </label> 
					<input type = "number" id = "cnpj" required = "required" class = "form-control" />
				</div>
				
				<div class = "form-group col-md-4">
					<label for = "email">E-mail: </label>
					<input type = "email" id = "email" required = "required" class = "form-control" />
				</div>
			
				<div class = "form-group col-md-4">
					<label for = "est">Estado: </label>
					<input type = "text" id = "est" required = "required" class = "form-control" />
				</div>

				<div class = "form-group col-md-4">
					<label for = "cid">Cidade: </label>
					<input type = "text" id = "cid" required = "required" class = "form-control" />
				</div>
				
				<div class = "form-group col-md-4">
					<label for = "rua">Rua: </label>
					<input type = "text" id = "rua" required = "required" class = "form-control" />
				</div>
			
				<div class = "form-group col-md-4">
					<label for = "pais">País: </label>
					<input type = "text" id = "pais" required = "required" class = "form-control" />
				</div>
				
				<div class = "form-group col-md-4">
					<label for = "senha">Senha: </label>
					<input type = "password" id = "senha" required = "required" class = "form-control" />
				</div>
			
				<div class = "form-group col-md-12">
					<input type = "button" value = "Cadastrar" id = "cadastrar" class = "btn btn-dark" />
				</div>
			
			</div>
		</form>
		
		<div id = "b" ></div>
		
		<?php include("rodaspe.html"); ?>
		
	</div>
</div>	

</body>

</html>
