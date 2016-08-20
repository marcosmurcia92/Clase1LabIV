	function Validar()
		{
			var ape = document.getElementById('apellido').value;
			var nom = document.getElementById('nombre').value;
			var legajo = document.getElementById('legajo').value;
			var envio = true;
			
			if(!ValidarCadena(ape)){
				document.getElementById('lblApellido').style.display = "block";
				envio = false;
			}
			else{
				document.getElementById('lblApellido').style.display = "none";
			}
			
			if(!ValidarCadena(nom)){
				document.getElementById('lblNombre').style.display = "block";
				envio = false;
			}
			else{
				document.getElementById('lblNombre').style.display = "none";
			}

			if(!ValidarCadena(legajo)){
				document.getElementById('lbllegajo').style.display = "block";
				envio = false;
			}
			else{
				document.getElementById('lbllegajo').style.display = "none";
			}

			if(envio){
				document.getElementById("hdnAgregar").value="Guardar";
				document.getElementById("FormIngreso").submit();
			}
		}
		function ValidarCadena(cad)
		{
			if(cad === "")
				return false;
			return true;
		}