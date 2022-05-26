
<script>
$(document).ready(function(){

  // Para recargar la opcion
  $("#id_cancelar").click(function(evento){
    evento.preventDefault();
    $('#id_container').load("usuarios/div_usuarios.php");
  });

	$("#id_grabar").click(function(evento){
		evento.preventDefault();
		grabardatosusuarios("M");
	});

  $("#id_abm_usuarios").keypress(function(e)
  {
    if(e.which == 13){
      return false;
    }
  });

});
</script>


<form role="form" name="f_abm_usuarios" id="id_abm_usuarios" class="form-horizontal">
  <div class="form-group form-group-sm">
    <label for="dapellido" class="col-sm-3 control-label text-label">Apellido</label>
    <div class="col-sm-9">
    	<input type="text" class="form-control text-campo" id="dapellido" value="<?= $apellido;?>" placeholder="Ingrese el apellido" autofocus>
  	</div>
  </div>
  <div class="form-group form-group-sm">
    <label for="dnombres" class="col-sm-3 control-label text-label">Nombres</label>
    <div class="col-sm-9">
      <input type="text" class="form-control text-campo" id="dnombres" value="<?= $nombres;?>" placeholder="Ingrese los nombres">
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label for="demail" class="col-sm-3 control-label text-label">Email</label>
    <div class="col-sm-9">
    	<input type="text" class="form-control text-campo" id="demail" value="<?= $email;?>" placeholder="Ingrese el mail">
  	</div>
  </div>
  <div class="form-group form-group-sm">
    <label for="dpassword" class="col-sm-3 control-label text-label">Contraseña</label>
    <div class="col-sm-9">
      <input type="text" class="form-control text-campo" id="dpassword" value="<?= $password;?>" placeholder="Ingrese la Contraseña">
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label for="sel_nivel" class="col-sm-3 control-label text-label">Perfil</label>
    <div class="col-sm-9">
      <select name="sel_nivel" class="form-control text-campo" id="sel_nivel">
        <option value="1">ADMINISTRADOR</option>
        <option value="2">VENDEDOR</option>
      </select>
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label for="rbhabilitado" class="col-sm-3 control-label text-label">Habilitado</label>
    <div class="col-sm-4">
        <fieldset id="rbhabilitado" ><input type="radio" name="hab" id="habsi" checked><span> Si</span>
         <span><input type="radio" name="hab"  id="habno" ><span> No</span></span></fieldset>
    </div>
  </div>

	<input type="hidden" name="idusuario" value="<?= $id;?>" id="idusuario" style="display:none">
 	<input type="text" name="codhab" value="<?= $habilitado;?>" id="codhab" style="display:none">
  <input type="text" name="codnivel" value="<?= $perfil;?>" id="codnivel" style="display:none">
	<input type="hidden" name="doper" value="A" style="display:none">

  <div class="control-label">
    <button type="submit" class="btn btn-success" id="id_grabar">Grabar</button>
    <button type="text" class="btn btn-default" id="id_cancelar">Cancelar</button>
  </div>
</form>



