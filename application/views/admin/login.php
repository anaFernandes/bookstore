<div class="container">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="panel panel-default mt-5">
        <div class="panel-heading">
          <h3> Login </h3>
        </div>
        <div class="panel-body" style="padding:25px">
          <form action="<?php echo base_url('Admin/checkLogin') ?>" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group" style="text-align:left">
                  <label for="nome">Email</label>
                  <input type="text" class="form-control" name="email" >
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group" style="text-align:left">
                  <label for="nome">Password</label>
                  <input type="password" class="form-control" name="pass" >
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12" style="text-align:right">
                <button type="submit" class="btn btn-block" style="background:#57747b!important">Login</button>
                <?php if(isset($error)) : ?>
                  <label style="color:red"> <?php echo $error ?> </label>
                <?php endif?>
              </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-3">
  </div>

</div>
