
<script>
$(document).ready(function(){

  // Para recargar la opcion
  $("#id_cancelar").click(function(evento){
    evento.preventDefault();
    $('#id_container').load("materiales/div_materiales.php");
  });

	$("#id_grabar").click(function(evento){
		evento.preventDefault();
		grabardatosmateriales("M");
	});

/*  $("#id_abm_materiales").keypress(function(e)
  {
    if(e.which == 13){
      return false;
    }
  });*/

});
</script>


<form role="form" name="f_abm_materiales" id="id_abm_materiales" class="form-horizontal">

  <div class="form-group form-group-sm">
    <label for="nombre" class="col-sm-3 control-label text-label">Nombre</label>
    <div class="col-sm-6 contenedor">
      <input type="text" class="form-control text-campo" id="nombre" value="<?= $nombre;?>" placeholder="Ingrese el nombre">
    </div>
  </div>

 <div class="form-group form-group-sm">
    <label for="color" class="col-sm-3 control-label text-label">Color</label>
    <div class="col-sm-6 contenedor">
      <input type="text" class="form-control text-campo" id="color" value="<?= $color;?>" placeholder="Ingrese el color">
    </div>
  </div>

  <label for="sel_mapa" class="col-sm-3 control-label text-label">Tipo</label>
  <div class="col-sm-4 contenedor">
         <select name="codtipo" class="form-control" id="codtipo" onchange="">
          <option value="1">Unidades</option>
          <option value="2">Medida</option>
        </select>
  </div>
 
  <input type="hidden" name="codtipo" value="<?= $codtipo;?>" id="codtipo" style="display:none">
  <input type="hidden" name="idmateriales" value="<?= $id;?>" id="idmateriales" style="display:none">
	<input type="hidden" name="doper" value="A" style="display:none">

  <div class="control-label">
    <button type="submit" class="btn btn-success" id="id_grabar">Grabar</button>
    <button type="text" class="btn btn-default" id="id_cancelar">Cancelar</button>
  </div>

</form>
