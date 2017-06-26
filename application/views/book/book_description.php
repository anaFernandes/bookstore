<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><?php echo $h1 ?></h1>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
        <img src="http://via.placeholder.com/450x250" width="100%"></img>
      </div>
      <div class="col-md-6" style="">
        <div class="panel panel-defaul" style="height:300px;background:#eee;width:100%;">
            <div class="col-md-12">
              <h2> Informações do livro </h2>
            </div>
            <div class="col-md-12">
               <b>ISBN :</b> <?php echo $book->ISBN ?>
            </div>
            <div class="col-md-12">
               <b>Editora :</b> <?php echo $book->publisher ?>
            </div>
            <div class="col-md-12">
               <b>Edição :</b> <?php echo $book->edition ?>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6"style="text-align:right; margin-top:5%">
              <div style="">
                <span style="font-size:1.0em;color:#18bc9c"><b>R$</b></span>
                <span style="font-size:2.3em;color:#f39c12"><?php echo $book->price ?></span>
              </div>
              <div style="margin-top:10%">
                <p>
                  <a href="<?php echo base_url('ShoppingCart/add_to_cart/'.$book->ISBN)?>" class="btn btn-primary"
                  style="background:#18bc9c; border:solid 2px #18bc9c">Adicionar ao carrinho</a>
                </p>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
          <div class="panel panel-defaul" style="height:100%;background:#eee;width:100%; padding:20px">
            <h2> Descrição </h2>
            <hr>
            <?php echo $book->description?>
          </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
          <div class="panel panel-defaul" style="height:100%;background:#FFF;width:100%; padding:20px">
            <h2> Autores & Categorias </h2>
            <hr>
          </div>
        </div>
    </div>
  </div>
</div>
