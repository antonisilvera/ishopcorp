$(document).ready(function(){
	$("#loginForm").bind("submit", function(){
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend: function(){
				$("#loginForm button[type=submit]").html("enviando...");
				$("#loginForm button[type=submit]").attr("disabled","disabled");
			},
			success: function(response){
				console.log(response);
				if(response.estado == "true"){
					$("body").overhang({
						type: "success",
						message: "usuario correcto, te estados redirigiendo....",
						callback: function(){
							window.location.href = "/../ishopcorp/";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "usuario o password incorrecto"
					});
				}
				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");
			},
			error: function(){
				$("body").overhang({
						type: "error",
						message: "usuario o password incorrecto"
					});
				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");
			}
		});
		return false;
	});
});

$(document).ready(function(){
	$("#sesionForm").bind("submit", function(){
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend: function(){
				$("#sesionForm button[type=submit]").html("enviando...");
				$("#sesionForm button[type=submit]").attr("disabled","disabled");
			},
			success: function(response){
				console.log(response);
				if(response.estado == "true"){
					$("body").overhang({
						type: "success",
						message: "usuario correcto, te estados redirigiendo....",
						callback: function(){
							window.location.href = "/../ishopcorp/";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "usuario o password incorrecto"
					});
				}
				$("#sesionForm button[type=submit]").html("Ingresar");
				$("#sesionForm button[type=submit]").removeAttr("disabled");
			},
			error: function(){
				$("body").overhang({
						type: "error",
						message: "usuario o password incorrecto"
					});
				$("#sesionForm button[type=submit]").html("Ingresar");
				$("#sesionForm button[type=submit]").removeAttr("disabled");
			}
		});
		return false;
	});
});

$(document).ready(function(){
	$("#f1").bind("submit", function(){
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend: function(){
				$("#f1 button[type=submit]").html("enviando...");
				$("#f1 button[type=submit]").attr("disabled","disabled");
			},
			success: function(response){
				console.log(response);
				if(response.estado == "true"){
					$("body").overhang({
						type: "success",
						message: "Se registro correctamente ...",
						callback: function(){
							window.location.href = "/../ishopcorp/";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "No se pudo registrar"
					});
				}
				$("#f1 button[type=submit]").html("Ingresar");
				$("#f1 button[type=submit]").removeAttr("disabled");
			},
			error: function(){
				$("body").overhang({
						type: "error",
						message: "Error al cargar la información"
					});
				$("#f1 button[type=submit]").html("Ingresar");
				$("#f1 button[type=submit]").removeAttr("disabled");
			}
		});
		return false;
	});
});

$(document).ready(function(){
	$("#forget").bind("submit", function(){
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend: function(){
				$("#forget button[type=submit]").html("enviando...");
				$("#forget button[type=submit]").attr("disabled","disabled");
			},
			success: function(response){
				console.log(response);
				if(response.estado == "true"){
					$("body").overhang({
						type: "success",
						message: "Se envió el correo satisfactoriamente ...",
						callback: function(){
							window.location.href = "/../ishopcorp/vista/forgetpass.php";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "El correo no existe ..."
					});
				}
				$("#forget button[type=submit]").html("Ingresar");
				$("#forget button[type=submit]").removeAttr("disabled");
			},
			error: function(){
				$("body").overhang({
						type: "error",
						message: "Error al cargar la información"
					});
				$("#forget button[type=submit]").html("Ingresar");
				$("#forget button[type=submit]").removeAttr("disabled");
			}
		});
		return false;
	});
});

$(document).ready(function(){
	$("#formcontact").bind("submit", function(){
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend: function(){
				$("#formcontact button[type=submit]").html("enviando...");
				$("#formcontact button[type=submit]").attr("disabled","disabled");
			},
			success: function(response){
				console.log(response);
				if(response.estado == "true"){
					$("body").overhang({
						type: "success",
						message: "Se envió el correo satisfactoriamente ...",
						callback: function(){
							window.location.href = "/../ishopcorp/vista/contacto.php";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "No se pudo enviar el correo ..."
					});
				}
				$("#formcontact button[type=submit]").html("Enviar");
				$("#formcontact button[type=submit]").removeAttr("disabled");
			},
			error: function(){
				$("body").overhang({
						type: "error",
						message: "Error al cargar la información"
					});
				$("#formcontact button[type=submit]").html("Enviar");
				$("#formcontact button[type=submit]").removeAttr("disabled");
			}
		});
		return false;
	});
});