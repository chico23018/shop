const formularios_ajax=document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault();

    
    let enviar=confirm("Quieres enviar el formulario");

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
         let contenedor=document.querySelectorAll(".form-rest");
           contenedor.innerHTML = respuesta;
           // Limpiar los campos del formulario después de mostrar la respuesta del servidor
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