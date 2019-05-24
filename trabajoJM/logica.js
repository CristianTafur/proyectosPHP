document.getElementById("user").addEventListener("click",crearFormu);
document.getElementById("list").addEventListener("click",crearFormu);
  
 
function crearFormu() {
    ocultarForm();
       switch (this.id) {
            case "user":
                 mostrarForm('adminSesion.php',"20%","330px","45%");        
                break;
            case "list":
                 mostrarForm('listaUsuarios.php' ,"60%","330px","30%");        
                break;
                
            default:
                
                break;
        }
      
       
     
}
function mostrarForm(doc,w,h,left) {
    document.getElementById("block").innerHTML=
   '<iframe src="'+doc+'"  width="100%" height="100%" frameborder="0" allowtransparency="true" style="visibility: visible;"></iframe>';
   document.getElementById("block").style.border="solid";
   document.getElementById("block").style.borderColor="#00324b";
   document.getElementById("contenido").style.width=w;
   document.getElementById("contenido").style.height=h;
   document.getElementById("contenido").style. marginLeft=left;
}
function ocultarForm() {
    document.getElementById("block").innerHTML='';
    document.getElementById("block").style.border="0";
}