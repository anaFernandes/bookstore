<div class="container">
  <div class="row">
    <div class="col-md-12" style="border-bottom: 1px solid #ccc; padding:20px">
      <h2 style="padding:none; margin:0px"><?php echo $h1 ?></h2>
    </div>
  </div>
  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <th>ISBN</th>
            <th>Título</th>
            <th style="text-align:right">Preço</th>
          </thead>
          <tbody>
            <?php if(count($books)): ?>
              <?php foreach ($books as $book): ?>
                <tr>
                  <th><?php echo $book['ISBN'] ?></th>
                  <th><?php echo $book['title'] ?></th>
                  <th style="text-align:right"><?php echo $book['price'] ?></th>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
      <div style="text-align:right; padding-right:1%">
        <span style="font-size:12px">R$</span><span style="font-size:24px"><?php echo $final_price ?></span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12" style="border-bottom: 1px solid #ccc; padding:20px">
      <h2 style="padding:none; margin:0px">Confirmar compra</h2>
    </div>
  </div>
</div>
<div class="container" style="padding-top:20px">
  <div class="row">
    <form action="<?php echo base_url('ShoppingCart/first_checkout')?>" method="post">
      <div class="col-md-6">
        <input type="text" name="input_email" placeholder="email" style="min-width: 80%;">
        <?php if(isset($error_label)) : ?>
          <br>
          <label style="color:red"> <?php echo $error_label ?> </label>
        <?php endif ?>
      </div>
      <div class="col-md-6" style="text-align:right; padding-right:1%">
        <button type="submit" class="btn btn-primary"> Comprar </a>
      </div>
    </form>
  </div>
</div>
