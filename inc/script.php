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

 </script>
