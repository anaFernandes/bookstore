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
      <div class="col-md-6">
        <div class="panel panel-defaul" style="height:300px;background:#eee;width:100%;padding-left:50px">
            <div class="row">
              <h2> Informações do livro </h2>
            </div>
            <div class="row">
               ISBN : <?php echo $book->ISBN ?>
            </div>
            <div class="row">
               Editora : <?php echo $book->publisher ?>
            </div>
            <div class="row">
               Edição : <?php echo $book->edition ?>
            </div>
            <div class="row">
               Preço : <?php echo $book->price ?>
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
            <?php foreach($authors as $author) : ?>
              <div class="col-md-6">
                <?php var_dump($author) ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
    </div>
  </div>
</div>
