<?php
	include("menu.php");
?>
			<script>
				$(document).ready(function(){
					$("#entrar").click(function(){
						$.ajax({
							url: "validacao.php",
							type: "post",
							data: {usuario: $("input[name='usu']").val(), oq: $("input[name='oq']:checked").val(), senha: $("input[name='senha']").val()},
							
							success: function(data){
								console.log(data);
								if(data==1){
									window.location.href = 'index.php';
								}
								
								else if(data==2){
									$("#textin").html("<div class='card-body'><blockquote class='blockquote mb-0'><footer class='blockquote-footer'>Usuário ou senha inválidos!</footer></blockquote></div>");
								}else{
									$("#textin").html("<div class='card-body'><blockquote class='blockquote mb-0'><footer class='blockquote-footer'>Erro ao consultar o banco de dados!</footer></blockquote></div>");
								}
							},
							
							error: function(e){
								$("#textin").html("<div class='card-body'><blockquote class='blockquote mb-0'><footer class='blockquote-footer'>Sistema em manutenção. Tente novamente mais tarde!</footer></blockquote></div>" + e);
							}
						});
					});
				});
			</script>
			
			<form>
				<div class = "container-fluid">
					<div class = "form-row align-items-center">
						<div class = "col-auto">
							<div class = "input-group mb-2">
								<label class="sr-only" for = "inlineFormInputGroup">Usuário </label>
								<div class="input-group-prepend">
								  <div class="input-group-text">@</div>
								</div>
								<input type = "text" class="form-control" name = "usu" id="inlineFormInputGroup" placeholder = "Usuário" required = "required" />
							</div>
						</div>
						
						<div class = "col-auto">
							<div class = "input-group mb-2">
								<label class="sr-only" for = "inlineFormInputGroup">Senha </label>
								<input type = "password" class = "form-control" name = "senha" required = "required" id = "inlineFormInputGroup" placeholder = "Senha" />
							</div>
						</div>
						
						<div class = "col-auto">
							<div class = "form-check mb-2">
								<input type = "radio" name = "oq" class = "form-check-input" value = "loja" id = "autoSizingCheck" checked = "checked" />
								<label class = "form-check-label" for = "autoSizingCheck">Loja </label>
							</div>
						</div>
						
						<div class = "col-auto">
							<div class = "form-check mb-2">
								<input type = "radio" name = "oq" class = "form-check-input" value = "cli" id = "autoSizingCheck" />
								<label class = "form-check-label" for = "autoSizingCheck">Cliente </label>
							</div>
						</div>
						
						<div class = "col-auto">
							<input type = "button" value = "Entrar" id = "entrar" class = "btn btn-dark mb-2" />
						</div>
						
						<div class = "col-auto">
							<a href = "form_usuario.php" class="badge badge-secondary">Cadastrar Usuário</a>
						</div>
						
						<div class = "col-auto">
							<a href = "form_loja.php" class="badge badge-secondary">Cadastrar Loja</a>
						</div>
					</div>
				</div>
			</form>
			
			<div id = "textin"></div>
		
			<?php include("rodaspe.html"); ?>
		</div>
		
	</body>

</html>