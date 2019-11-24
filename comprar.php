<?php
	include("menu.php");
	include("verificacao.php");
	
	if(!($_SESSION["CliOuLoja"] == "Loja")){
?>

	<script>
		$(document).ready(function(){
			paginacao(0);
			
			$("#comprar").click(function(){
				$.ajax({
					url: "inserir_compra.php",
					type: "post",
					data: {quant: $("input[name='quant']").val(), id_roupa: $("#id_roupa").val()},
					
					beforeSend: function(){
						$("#d").html("Inserindo compra...");
						$("#d").css("color", "brown"); 
					},
					
					success: function(data){
						if(data==1){
							$("#d").html("Compra inserida no sistema com sucesso!");
							$("#d").css("color", "green");
							
							$("#quant").val("");
							
							paginacao(0);
						}
						
						if(data==2){
							$("#d").html("A loja não possui esta quantidade de roupa em seu estoque!");
							$("#d").css("color", "red");
						}
						
						if(data==0){
							$("#d").html("Não foi possível inserir compra no sistema!");
							$("#d").css("color", "red");
						}
					},
					
					error: function(e){
						$("#d").html("Sistema em manutenção. Tente novamente mais tarde!" + e);
						$("#d").css("color", "red");
					}
				});
			});
					
			function paginacao(p){
				console.log("Entreiiii");
				$.ajax({
					url: "listar_minhas_compras.php",
					type: "post",
					data: {pg: p},
					success: function(m){
						console.log(m);
						$("#bodynho").html("");
						for(i=0;i<m.length;i++){
							linhas = "<tr>";
							linhas += "<td>" + m[i].quant_compra + "</td>";
							linhas += "<td>" + m[i].roupa_marca + "</td>";
							linhas += "<td>" + m[i].cor + "</td>";
							linhas += "<td>" + m[i].tipo + "</td>";
							linhas += "<td>" + m[i].preco + "</td>";
							linhas += "<td>" + m[i].total + "</td>";
							linhas += "</tr>";
							
							$("#bodynho").append(linhas);
						}
					}
				});
			}
			
			$("a[name = 'btn_pagina']").click(function(){
				p = $(this).html();
				p = (p-1)*3;
				paginacao(p);
			});
		});
	
	</script>
		
	<form>
		<div class = "container-fluid">
			<div class = "row"><div class = "col-12 text-rigth p-3"><h3>Comprar</h3></div></div>
			<div class = "form-row align-items-center">
				<div class = "col-auto">
					<div class = "input-group mb-2">
						<label class="sr-only" for = "inlineFormInputGroup">Quant </label>
						<input type = "number" class="form-control" name = "quant" id="inlineFormInputGroup" placeholder = "Quantidade..." required = "required" />
					</div>
				</div>
			
				<?php
					$id = $_GET["id"];
					echo '<input type = "hidden" id = "id_roupa" value = "'.$id.'" />';
				?>
			
			
				<div class = "col-auto">
					<input type = "button" value = "Comprar" id = "comprar" class = "btn btn-dark mb-2" />
				</div>
			</div>
		
			<div id = "d"></div>
		</div>
		
	</form>

	<div class = "container-fluid">
		<div class = "row"><div class = "col-12 text-rigth p-3"><h3>Compras Efetuadas</h3></div></div>
		<table class = 'table table-bordered w-100 table-hover text-center table-dark'>
			<thead>
				<tr>
					<th rowspan = "2">Quantidade</th>
					<th colspan = "4">Roupas Compradas</th>
					<th rowspan = "2">Total</th>
				</tr>
			  
				<tr>
					<th>Marca</th>
					<th>Cor</th>
					<th>Tipo</th>
					<th>Preço</th>
				</tr>
			</thead>
			
			<tbody id = "bodynho"></tbody>
		</table>
	</div>

	<div class = "container-fluid">
		<div id = "paginacao">
			<?php include("paginacao_compras.php"); ?>
		</div>
	</div>

	<?php include("rodaspe.html"); ?>
</div>	

</body>

</html>

<?php
	}else{
		echo '<div class = "row"><div class = "col-12 text-center p-3">Esta página não pode ser acessada por você!!!</div></div>';
	}
?>