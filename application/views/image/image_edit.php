<div class="container">
  <h2>Dados da Imagem</h2>
  <hr>
  <div class="row">
    <form action="<?php echo base_url('portifolio/update/'.$image->imageid) ?>" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
            <label for="nome">Model</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $image->model ?>"
            placeholder="title" required="required"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Photographer</label>
            <input type="text" class="form-control" id="title" value="<?php echo $image->photographer ?>" name="ISBN" required="required"/>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label for="nome">Section</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $image->section ?>"
            placeholder="title" required="required"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Keywords</label>
            <input type="text" class="form-control" id="title" value="<?php echo $image->keyword ?>" name="ISBN" required="required"/>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12" style="margin-bottom:20px; padding:20px" required="required"/>
        <div class="col-md-4">
          <label for="nome">Imagem pequena</label>
          <input type="file" class="form-control" id="file" name="Small_File" size='20' value="" placeholder="" style="height:50px;border:none">
        </div>
      </div>
    </div>
    <input type="hidden" name="imageid" value="<?=$image->imageid?>">
    <input type="hidden" name="section" value="<?=$image->section?>"/>
    <hr>
    <div class="row">
      <div class="col-md-12" style="margin-top:40px">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
          <div class="col-md-6">
            <a href="<?php echo base_url('image/del/'.$image->imageid)?>" class="btn btn-danger btn-block">Excluir</a>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block" style="background:#128f76">Enviar</button>
          </div>
        </div>

      </div>
    </div>

  </form>
</div>
