
<script>
  $(document).ready(function(){

    // Para recargar la opcion
    $("#id_cancelar").click(function(evento){
      evento.preventDefault();
      $('#id_container').load("articulos/div_articulos.php");
    });

  	$("#id_grabar").click(function(evento){
  		evento.preventDefault();
  		grabardatosarticulos("M");
  	});

    traerrubro();
  });
</script>


<form role="form" name="f_abm_articulos" id="id_abm_articulos" class="form-horizontal">

  <div class="form-group form-group-sm">
    <label for="idarticulos" class="col-sm-3 control-label text-label">Código</label>
    <div class="col-sm-2 contenedor">
        <input type="text"  class="form-control text-campo text-right" name="idarticulos" value="<?= $id;?>" id="idarticulos" disabled >
    </div>
  </div>

  <div class="form-group form-group-sm">
    <label for="nombre" class="col-sm-3 control-label text-label">Nombre</label>
    <div class="col-sm-6 contenedor">
      <input type="text" class="form-control text-campo" id="nombre" value="<?= $nombre;?>" placeholder="Ingrese el nombre">
    </div>
  </div>
  
  <div class="form-group form-group-sm">
    <label for="sel_rubro" class="col-sm-3 control-label text-label">Rubro</label>
    <div class="col-sm-6 contenedor">
      <div id="sel_rubro"></div>
    </div>
  </div>

  <div class="form-group form-group-sm">
    <label for="sel_materiales" class="col-sm-3 control-label text-label">Materiales</label>
    <div class="col-sm-6 contenedor">
      <div id="sel_materiales" ><?php include 'combomateriales.php'; ?></div>
    </div>
  </div>

  <div class="form-group form-group-sm">
    <label for="precio" class="col-sm-3 control-label text-label">Precio</label>
    <div class="col-sm-2 contenedor">
      <div class="input-group">
        <span class="input-group-addon">$</span>
          <input type="text" class="form-control input-sm text-right" id="precio" value="<?= $precio;?>" onkeypress="return permite(event, 'num_real')" >
       </div>
    </div>
  </div>

  <div class="form-group form-group-sm">
    <label for="stock" class="col-sm-3 control-label text-label">Stock</label>
    <div class="col-sm-2 contenedor">
        <input type="text" class="form-control input-sm text-right" id="stock" value="<?= $stock;?>"  onkeypress="return permite(event, 'num')" >      
    </div>
  </div>
  

  <input type="text" name="cod_materiales" value="<?= $cod_materiales;?>" id="cod_materiales" style="display:none">
  <input type="text" name="cod_rubro" value="<?= $cod_rubro;?>" id="cod_rubro" style="display:none">
	<input type="hidden" name="doper" value="A" style="display:none">

  <div class="control-label">
    <button type="submit" class="btn btn-success" id="id_grabar">Grabar</button>
    <button type="text" class="btn btn-default" id="id_cancelar">Cancelar</button>
  </div>
</form>
