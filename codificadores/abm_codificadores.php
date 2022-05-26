
<script>
$(document).ready(function(){

  $("#id_cancelar").click(function(evento){
    evento.preventDefault();
    cargar_codificadores_lista('por_filtro');
  });

	$("#id_grabar").click(function(evento){
		evento.preventDefault();
		grabardatoscodificadores("M");
	});

});
</script>


<form role="form" name="f_abm_codificadores" id="id_abm_codificadores" class="form-horizontal">

    <div class="form-group form-group-sm">
      <label for="cdescripcion" class="col-sm-3 control-label text-label">Descripcion</label>
      <div class="col-sm-9">
      	<input type="text" class="form-control text-campo" autofocus id="cdescripcion" value="<?= $descripcion;?>" placeholder="Ingrese la descripcion" >
    	</div>
    </div>

    <div class="form-group form-group-sm">
      <label for="fshabil" class="col-sm-3 control-label text-label">Habilitada</label>
        <div class="col-sm-8">
            <fieldset id="fshabil">
               <input type="radio" name="rbhabilitada" id="rbhabilitadosi" checked>
                  <span> Si </span>
               <span>
                  <input type="radio" name="rbhabilitada"  id="rbhabilitadono">
                   <span> No </span>
               </span>
            </fieldset>
        </div>     
    </div>
    
  	<input type="hidden" name="id" value="<?= $id;?>" id="id" style="display:none">
    <input type="hidden" name="idcodificador" value="<?= $idcodificador;?>" id="idcodificador" style="display:none">
    <input type="hidden" name="habilitado" value="<?= $habilitado;?>" id="habilitado" style="display:none">

  	<input type="hidden" name="oper" value="A" style="display:none">

    <div class="control-label">
    	<button type="submit" class="btn btn-success" id="id_grabar">Grabar</button>
      <button type="text" class="btn btn-default" id="id_cancelar">Cancelar</button>
    </div>

</form>



