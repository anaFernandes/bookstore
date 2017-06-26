<div class="container">

  <h2> <?php echo $h1; ?> </h2>
  <hr>

  <div class="panel panel-default" >
    <div class="panel-heading">
      <h3> Confirmar compra </h3>
    </div>
    <?php if(isset($customer->email)) : ?>
      <div class="panel-body" style="padding:25px">
        <form action="<?php echo base_url('Customer/save') ?>" method="post">
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nome">Email</label>
                <input type="text" class="form-control" value="<?php echo $customer->email ?>" name="email" >
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" value="<?php echo $customer->fname ?>" name="fname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Sobrenome</label>
                <input type="text" class="form-control" value="<?php echo $customer->lname ?>" name="lname" >
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-8">
              <div class="form-group">
                <label for="nome">Cidade</label>
                <input type="text" class="form-control" value="<?php echo $customer->city ?>" name="city" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Estado</label>
                <input type="text" class="form-control" value="<?php echo $customer->state ?>" name="state" >
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-8">
              <div class="form-group">
                <label for="nome">Rua</label>
                <input type="text" class="form-control" value="<?php echo $customer->street ?>" name="street">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Código postal</label>
                <input type="text" class="form-control" value="<?php echo $customer->zip ?>" name="zip" >
              </div>
            </div>
          </div>

          <div class="col-md-12" style="margin-top:5%">
            <div class="col-md-12" style="text-align:right">
              <button type="submit" class="btn btn-default">Cadastrar</button>
            </div>
          </div>

        </form>
      </div>
  <?php else : ?>
    <div class="panel-body" style="padding:25px">
      <form action="<?php echo base_url('Customer/save') ?>" method="post">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label for="nome">Email</label>
              <input type="text" class="form-control" name="email" >
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" name="fname">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome">Sobrenome</label>
              <input type="text" class="form-control" name="lname" >
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-8">
            <div class="form-group">
              <label for="nome">Cidade</label>
              <input type="text" class="form-control" name="city" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nome">Estado</label>
              <input type="text" class="form-control" name="state" >
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-8">
            <div class="form-group">
              <label for="nome">Rua</label>
              <input type="text" class="form-control" name="street">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nome">Código postal</label>
              <input type="text" class="form-control" name="zip" >
            </div>
          </div>
        </div>

        <div class="col-md-12" style="margin-top:5%">
          <div class="col-md-12" style="text-align:right">
            <button type="submit" class="btn btn-default">Cadastrar</button>
          </div>
        </div>

      </form>
    </div>
  <?php endif; ?>
</div>
