<?php
	include("menu.php");
	include("verificacao.php");
	include("conexao.php");
	
	if($_SESSION["CliOuLoja"] != "Loja"){
		echo '<div class = "row"><div class = "col-12 text-center p-5"><h2>Esta página não pode ser acessada por você!!!</h2></div></div>';
		die();
	}
?>		<script src = "cadastrar.js"></script>
		<script>
			$(document).ready(function(){
				$(document).on("click",'img[name="excluir"]',function(){
					tabela = $(this).attr("tabela");
					id_roupa = $(this).attr("id_roupa");
					linha = $(this).closest("table");
					$.ajax({
						url:"remover.php",
						type:"post",
						data:{tabela: tabela, id_roupa: id_roupa},
						
						beforeSend:function(){
							$("#ex").html("<div class = 'text-center'>Excluinto roupa...</div>");
							$("#ex").css("color","brown");
						},
						
						success: function(data){
							if(data==1){
								$("#ex").html("<div class = 'text-center'>Roupa excluída!</div>");
								$("#ex").css("color","green");
								linha.remove();
							}else{
								$("#ex").html("<div class = 'text-center'>Erro: roupa não pode ser excluída.</div>");
								$("#ex").css("color","red");
							}
						},
						
						error: function(e){
							$("#ex").html("<div class = 'text-center'>Erro: sistema de remoção indisponível.</div>");
							$("#ex").css("color","red");
						}
					});
				});
				
				pg = 0;
				function carrega_roupa(pg){
					$.ajax({
						url: "listar_minhas_roupas1.php",
						type: "get",
						data: {pagina: pg},
						success: function(matriz_roupas){
							console.log(pg);
							for(i=0;i<matriz_roupas["roupa"].length; i++){
								list = "<table class = 'table table-bordered w-50 text-center m-auto'>";
								list += "<tbody>";
								list += "<tr>";
								list += "<td>CNPJ: " + matriz_roupas["roupa"][i].CNPJ+"</td>";
								list += "<td rowspan = '11'><img src='fotos/" + matriz_roupas["roupa"][i].foto + "' name = 'foto' class='rounded w-100' /></td>";
								list += "</tr>";
								list += "<tr><td>Cor: " + matriz_roupas["roupa"][i].cor + "</td></tr>";
								list += "<tr><td>Tipo: " + matriz_roupas["roupa"][i].tipo + "</td></tr>";
								list += "<tr><td>Marca: " + matriz_roupas["roupa"][i].marca + "</td></tr>";
								list += "<tr><td>Tamanho: " + matriz_roupas["roupa"][i].tamanho + "</td></tr>";
								list += "<tr><td>Material: " + matriz_roupas["roupa"][i].material + "</td></tr>";
								list += "<tr><td>Quantidade: " + matriz_roupas["roupa"][i].quantidade + "</td></tr>";
								list += "<tr><td>Preço: " + matriz_roupas["roupa"][i].preco + "</td></tr>";
								list += "<tr><td>Gênero: " + matriz_roupas["roupa"][i].genero + "</td></tr>";
								list += "<tr><td>Data de Lançamento: " + matriz_roupas["roupa"][i].ano_lancamento + "</td></tr>";
								list += "<tr>";
								list += "<td><img src='apagar.png' class = 'w-25' name = 'excluir' tabela = 'roupa' id_roupa = " + matriz_roupas["roupa"][i].id_roupa + " /></td>";
								list += "</tr>";
								list += "</tbody>";
								list += "</table><br/>";
								
								console.log(list);
								
								$("#listagem").append(list);
							}
						}	
					});
				
				} 

				carrega_roupa(pg);
				
				$("a[name = 'btn_pagina']").click(function(){
					valor_botao = $(this).html();
					console.log(valor_botao);
					p = (valor_botao-1)*2;
					$("#listagem").html("");
					carrega_roupa(p);
				});
			});
		
		</script>
		
		<div class = "container-fluid">
			<div class = "row"><div class = "col-12 text-center p-3"><h3>Inserir roupa</h3></div></div>
			<form id = "f">
				<div class = "form-row"> 
					<!-- <form id="f" enctype = "multipart/form-data"> -->
					<div class = "form-group col-md-4">
						<!--<div class = "col-12"><h3>Inserir Roupa</h3></div>-->
						<label for="material"> Material: </label>
						<input name = "material" class = "form-control" required="required" />
					</div>
						
					<div class = "form-group col-md-4">	
						<label for="tamanho"> Tamanho: </label>
						<input type="text" name = "tamanho" class = "form-control" required="required" />
					</div>
						
					<div class = "form-group col-md-4">
						<label for="ano_lancamento"> Data de Lançamento: </label>
						<input type="date" name = "ano_lancamento" class = "form-control" required="required" />
					</div>
					
					<div class = "form-group col-md-4">	
						<label for="quantidade"> Quantidade: </label>
						<input type="number" name = "quantidade" class = "form-control" required="required" />
					</div>
						
					<div class = "form-group col-md-4">
						<label for="marca"> Marca: </label>
						<input type="text" name = "marca" class = "form-control" required="required" />
					</div>
						
					<div class = "form-group col-md-4">
						<label for="cor"> Cor: </label>
						<input type="color" name = "cor" class = "form-control" required="required" />
					</div>
						
					<div class = "form-group col-md-6">
						<label for="tipo"> Tipo: </label>
						<input type="text" name = "tipo" required="required" class = "form-control" placeholder="EX: saia, blusa..." />
					</div>
						
					<div class = "form-group col-md-6">	
						<label for="preco"> Preço: </label>
						<input type="number" name = "preco" required="required" class = "form-control" step = "0.01" placeholder = "R$" />
					</div>
						
					<div class = "form-group col-md-3">	
						<div class = "form-check form-check-inline">
							<input type="radio" class = "form-check-input" name = "genero" value="F" />
							<label class = "form-check-label" for = "F"> Gênero feminino </label>
						</div>
					</div>
					
					<div class = "form-group col-md-3">	
						<div class = "form-check form-check-inline">
							<input type="radio" class = "form-check-input" name = "genero" value="M" />
							<label class = "form-check-label" for = "M"> Gênero Masculino </label>
						</div>
					</div>
					
					<div class = "form-group col-md-6">	
						<div class="custom-file">
							<label class="custom-file-label" for="foto">Atualizar foto </label>
							<input type="file" class = "custom-file-input" name = "arquivo" />
						</div>
					</div>
						
					<div class = "form-group col-md-12">
						<input type = "button" value = "Inserir" id = "enviar" class = "btn btn-dark" />
					</div>
					
					<div id = "c"></div>
						
					<!-- </form> -->
				</div>
			</form>
			
		</div>
		
		<div class = "container-fluid">
			<div class = "row"><div class = "col-12 text-center p-3"><h3>Roupas Cadastradas</h3></div>
		</div>
		
		<div class = "container-fluid">
			<div class = "row justify-content-center">
				<div class = "col-12" id = "listagem" ></div>
			</div>
		</div>
			
		<div id = "ex"></div>
		<div id = "paginacao">
			<?php include("paginacao_roupa.php");?>
		</div>
		
		<?php include("rodaspe.html"); ?>
			
	</div>
	
</body>

</html>