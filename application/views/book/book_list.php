        <div class="container">
          <div class="row">
            <?php if($user_type != 1) : ?>
              <div class="jumbotron" style="padding:90px">
                <h2> Nossa da empresa </h2>
                <hr>
                <p style="font-size:21px;color:#999"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, tempus vehicula tempus
                  ac, semper ut nisi. Proin eros arcu, efficitur et velit ut, fermentum suscipit lacus. Lorem ipsum dolor
                  sit amet, consectetur adipiscing elit. In hac habitasse platea dictumst. Nullam egestas, arcu et rutrum
                  scelerisque, tortor sem vehicula neque, eget volutpat felis dolor sit amet orci. Vivamus id bibendum eros.
                </p>
              </div>
            <?php endif?>
          </div>
          <div class="row">
            <div class="col-md-12" style="border-bottom: 1px solid #ccc">
              <div class="col-md-6">
                <h2 style="padding:none; margin:0px"><?php echo $h1 ?></h2>
              </div>
              <div class="col-md-6">
                <div class="col-md-12" style="padding-right: 0px!important; text-align:right">
                  <form action="<?php echo base_url("book/searchAll/")?>" method="post">
                    <div class="col-md-8" style="padding-right: 0px!important; text-align:right">
                      <div class="form-group">
                        <input type="text" name="SearchString" class="form-control" placeholder="Buscar">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-block" style="background:#2c3e50">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php if(count($books)): ?>
            <?php $book_counter = 0; ?>
            <?php foreach ($books as $key => $book):?>
              <?php if($book_counter == 0) :?>
                <div class="col-md-12" style="padding:30px!important">
              <?php endif ?>
                  <div class="col-md-3">
                    <div class="card">
                      <img class="card-img-top" src="http://via.placeholder.com/250x150" alt="Card image cap" width="100%">
                      <div class="card-block" style="height:160px!important">
                        <span class="card-title"><b><?php echo $book->title; ?></b></span>
                        <p class="card-text"><?php echo $book->description." ..." ?></p>
                      </div>
                    </div>
                    <?php if($user_type == 1) : ?>
                      <a href="<?php echo base_url('book/edit/'.$book->ISBN)  ?>" class="btn btn-primary btn-block">Alterar Livro</a>
                    <?php else : ?>
                      <a href="<?php echo base_url('book')?>" class="btn btn-primary btn-block">Ver detalhes</a>
                    <?php endif ?>
                  </div>
              <?php
              $book_counter++;
              if($book_counter == 4) : ?>
                <?php  $book_counter = 0 ?>
                </div>
              <?php endif?>

            <?php endforeach ?>
          <?php endif ?>
      </div>
