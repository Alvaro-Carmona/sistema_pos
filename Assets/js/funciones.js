let tblUsuarios;

document.addEventListener("DOMContentLoaded", function(){
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url+'Usuarios/listar',
            dataSrc: ''
        },
        columns: [ {'data' : 'id'}, {'data':'usuario'}, {'data' : 'nombre'},{'data':'caja' },{'data':'estado'},{'data':'acciones'}]
    } );
});

function formLogin(e){
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const clave   = document.getElementById('clave');
    
    if(usuario.value == ""){
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if (clave.value==""){
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();

    }else{
        const url  = base_url + "Usuarios/validar";
        const form = document.getElementById("formLogin");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(form));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if(res == 'ok'){
                    window.location = base_url + 'Usuarios';
                }else{
                    document.getElementById("alerta").classList.remove('d-none');
                    document.getElementById("alerta").innerHTML = res;
                }
            }
        }
    }
}
function registrarUser(e){
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const nombre   = document.getElementById('Nombre');
    const clave   = document.getElementById('Contraseña');
    const confirmar   = document.getElementById('Confirmar');
    const caja   = document.getElementById('caja');
    
    if(usuario.value == ""||nombre.value == ""||clave.value == ""||confirmar.value == ""||caja.value == ""){
        
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })

    }else if (clave.value != confirmar.value ){
        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            showConfirmButton: false,
            timer: 3000
          })

    }else{
        const url  = base_url + "Usuarios/registrar";
        const form = document.getElementById("formnuevoUsuarios");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(form));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
               if(res == "ok"){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usario registrado',
                    showConfirmButton: false,
                    timer: 3000
                  })
                  form.reset();
                  $("#nuevo_usuario").modal("hide");
               }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  }) 
               }  

            }
        }
    }
}
function formUsuario(){
    $("#nuevo_usuario").modal("show");
}
