<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <!--<script src="./js/ajax.js" type="text/javascript"></script>-->
  <script src="./js/funciones.js" type="text/javascript"></script>
  <script >
   const formularios_ajax=document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault();

    
    let enviar=confirm("Vuoi mandare questo formulario");

    if(enviar==true){

       

        let data= new FormData(this);
        let method=this.getAttribute("method");
        let action=this.getAttribute("action");

        let encabezados= new Headers();

        let config={
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config)
         .then(respuesta => respuesta.text())
        .then(respuesta =>{ 
         let contenedor=document.querySelector(".form-rest");
          console.log(respuesta.length);
            if(respuesta.length>190){
               contenedor.innerHTML = respuesta;
            }else {
              window.location.href=respuesta;
            }
            
            
           // Limpiar los campos del formulario después de mostrar la respuesta del servidor
           this.reset();
                
           // Borra manualmente el contenido de los campos del formulario
           let campos = this.querySelectorAll("input, textarea");
           campos.forEach(campo => campo.value = "");
                
            });
        
      
    }
   
}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);
   
});



/*const elementoClic = document.querySelectorAll("#Can");

function onClickHandler(e) {
  e.preventDefault();
  var idpElement = this.parentNode.querySelector("#item1");
      var cantidad = this.value;
      var idp = idpElement ? idpElement.value : null;
      var url = "index.php?vista=updatequantita";

      console.log(idp, cantidad);
  let enviar = confirm("Vuoi mandare questo formulario");

  if (enviar == true) {
    // Realiza las acciones que deseas cuando se hace clic en el elemento
    // Por ejemplo, puedes realizar una solicitud AJAX aquí.
  }
}
elementoClic.forEach(Clic=>{
  Clic.addEventListener("click", onClickHandler);
});*/

<!DOCTYPE html>
<html>
<head>
<script>
function submitForm() {
  // Simula un clic en el botón de envío cuando se hace clic en el párrafo.
  document.getElementById("submitButton").click();
}
</script>
</head>
<body>

<!-- Agrega un botón de envío oculto -->
<form action="tu_archivo_de_procesamiento.php" method="POST">
  <!-- Coloca cualquier campo del formulario que necesites aquí -->

  <!-- El botón de envío oculto -->
  <input type="submit" id="submitButton" style="display: none;">
</form>

<!-- Párrafo que se comportará como el botón de envío -->
<p id="demo" onclick="submitForm()">Haz clic para enviar el formulario.</p>

</body>
</html>

 </script>
