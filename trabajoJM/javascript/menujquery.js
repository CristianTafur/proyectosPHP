
        $(document).ready(function() {
	$("#menu_usuarios").click(function(event) {
		$("#contenido").load('adminSesion.php');
                document.getElementById("contenido").style.marginLeft="45%";
	});
	});
        $(document).ready(function() {
	$("#crear_cita").click(function(event) {
		$("#contenido").load('pacienteSesion.php');
                document.getElementById("contenido").style.marginLeft="35%";
	});
	}); 
   $(document).ready(function() {
	$("#lista_usuarios").click(function(event) {
		$("#contenido").load('listaUsuarios.php');
               document.getElementById("contenido").style.marginLeft="35%";
	});
	});

   $(document).ready(function() {
	$("#menu_registro").click(function(event) {
		$("#contenido").load('clientes.php');
	});
	});
  $(document).ready(function() {
	$("#ver_citas").click(function(event) {
		$("#contenido").load('listaCitas.php');
              document.getElementById("contenido").style.marginLeft="35%";  
	});
	});
 function cargar_lista_medicos() {
    $("#contenido").load('pacienteSesion.php');
     document.getElementById("contenido").style.marginLeft="35%";
}
function cargar_lista_citas()
{
    $("#contenido").load('listaCitas.php');
     document.getElementById("contenido").style.marginLeft="35%";
}
function cargar_crear_cita(doc)
{
    $("#contenido").load('crearCita.php?medico='+doc+'');
     document.getElementById("contenido").style.marginLeft="45%";
}
function cargar_editar_usuario(doc,tab)
{
    $("#contenido").load('editarUsuario.php?editar='+doc+'&tabla='+tab+'');
     document.getElementById("contenido").style.marginLeft="45%";
}
function cargar_lista_Usuarios()
{
    $("#contenido").load('listaUsuarios.php');
  document.getElementById("contenido").style.marginLeft="35%";
}



function cargar_sesion()
{
    $("#interface").load('mediMax.php');
}
function cargar_sesion_Admin()
{
    $("#interface").load('sesionAdmin.php');
}
 
function cargar_ingreso(){
	$("#interface").load('sesion.php');
	document.getElementById("interface").style.marginLeft="40%";
	document.getElementById("interface").style.marginTop="5%";
	document.getElementById("interface").style.width="20%";
}
/* <select class="select" name="3" >
                <option value="paciente" <?php if($p["rol"]=='paciente') echo'selected';?>>paciente</option>
                <option value="medico" <?php if($p["rol"]=='medico') echo'selected';?>>medico</option>
               
                <option value="admin" <?php if($p["rol"]=='admin') echo'selected';?>>administrador</option>
            </select><br><br>*/