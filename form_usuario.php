<?php
	include("menu.php");
?>

	<script>
		$(document).ready(function(){
			$("#enviar").click(function(){
				$.ajax({
					url: "insere_usuario.php",
					type: "post",
					data: {nome:$("#nome").val(), cpf:$("#cpf").val(), data_nascimento:$("#data_nascimento").val(), email:$("#email").val(), sexo:$("input[name='sexo']:checked").val(), cidade:$("#cidade").val(), estado:$("#estado").val(), rua:$("#rua").val(), pais:$("#pais").val(), cartao:$("#cartao_credito").val(), senha:$("#senha").val()},
					
					beforeSend: function(){
						$("#d").html("Inserindo usuário...");
						$("#d").css("color", "purple");
					},
					
					success: function(data){
						if(data==1){
							$("#d").html("Usuário inserido no sistema com sucesso!");
							$("#d").css("color", "green");
							
							$("#nome").val("");
							$("#cpf").val("");
							$("#data_nascimento").val("");
							$("#email").val("");
							$("input[name='sexo']:checked").prop("checked",false);
							$("#cidade").val("");
							$("#estado").val("");
							$("#rua").val("");
							$("#pais").val("");
							$("#cartao").val("");
							$("#senha").val("");
						}else{
							$("#d").html("Não foi possível inserir usuário no sistema!");
							$("#d").css("color", "red");
						}
					},
					
					error: function(e){
						$("#d").html("Sistema em manutenção. Tente novamente mais tarde!" + e);
						$("#d").css("color", "red");
					}
				});
			});
		});
		
	</script>

			<div class = "container-fluid">
				<div class = "row"><div class = "col-12 text-center p-3"><h3>Formulário de Usuário</h3></div></div>
				
				<form>
					<div class = "form-row"> 
						<div class = "form-group col-md-4">
							<label for="nome"> Nome: </label>
							<input type="text" id = "nome" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-4">
							<label for="cpf"> CPF: </label>
							<input type ="number" id = "cpf" class = "form-control" required="required" />
						</div>
						
						<div class = "form-group col-md-4">
							<label for="data_nascimento"> Data Nascimento: </label>
							<input type="date" id = "data_nascimento" class = "form-control" required="required"/>
						</div>
					
						<div class = "form-group col-md-4">
							<label for="email"> E-mail: </label>
							<input type="email" id = "email" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-4">
							<label for="cidade"> Cidade: </label>
							<input type="text" id = "cidade" class = "form-control" required="required" />
						</div>
						
						<div class = "form-group col-md-4">
							<label for="rua"> Rua: </label>
							<input type="text" id = "rua" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-4">
							<label for="estado"> Estado: </label>
							<input type="text" id = "estado" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-4">
							<label for="pais"> País: </label>
							<input type="text" id = "pais" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-4">
							<label for="cartao_credito"> Cartão de Crédito: </label>
							<input type="number" id = "cartao_credito" class = "form-control" required="required"/>
						</div>
						
						<div class = "form-group col-md-3">	
							<div class = "form-check form-check-inline">
								<input type="radio" class = "form-check-input" name = "sexo" value="F" />
								<label class = "form-check-label" for = "F"> Sexo Feminino </label>
							</div>
						</div>
						
						<div class = "form-group col-md-3">	
							<div class = "form-check form-check-inline">
								<input type="radio" class = "form-check-input" name = "sexo" value="M" />
								<label class = "form-check-label" for = "M"> Sexo Masculino </label>
							</div>
						</div>
						
						<div class = "form-group col-md-6">
							<label for="senha"> Senha: </label>
							<input type="password" id = "senha" class = "form-control" required="required"/>
						</div>
					
						<div class = "form-group col-md-12">
							<input type = "button" value = "Inserir" id = "enviar" class = "btn btn-dark" />
						</div>
					</div>
				</form>
				<div id = "d"></div>
				
			</div>
			
			<?php include("rodaspe.html"); ?>
			
		</div>
		
	</body>
	
</html>