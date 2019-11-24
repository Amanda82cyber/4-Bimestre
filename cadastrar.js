 $(document).ready(function(){
	 
	$("#enviar").click(function(){
		var form = $("#f")[0]; //recebe o formulário inteiro
		var formData = new FormData(form);
		$.ajax({
			url: "insere_roupa.php",
			type: "post",
			enctype: "multipart/form-data",
			data: formData,
			processData: false,
			contentType: false, //processa o cabeçalho???
			
			beforeSend: function(){
				$("#c").html("<div class = 'text-center'>Inserindo roupa...</div>");
			},
			
			success: function(data){
				if(data==1){
					$("#c").html("<div class = 'text-center'>Roupa inserida no sistema com sucesso!</div>");
					$("#c").css("color", "green");
					
					$("input[name='material']").val("");
					$("input[name='tamanho']").val("");
					$("input[name='ano_lancamento']").val("");
					$("input[name='quantidade']").val("");
					$("input[name='marca']").val("");
					$("input[name='cor']").val("");
					$("input[name='tipo']").val("");
					$("input[name='preco']").val("");
					$("input[name='genero']:checked").prop("checked",false);
					$("input[name='arquivo']").val("");
					
				}else{
					console.log(formData);
					console.log(data);
					$("#c").html("<div class = 'text-center'>Não foi possível inserir roupa no sistema!</div>");
					$("#c").css("color", "red");
				}
			},
			
			error: function(e){
				$("#c").html("Sistema em manutenção. Tente novamente mais tarde!" + e);
				$("#c").css("color", "red");
			}
		});
	});
});