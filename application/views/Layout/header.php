<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("public/css/style.css");?>>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    </head>
  <body>
      <?php if($page == "exist"):?>
        <?php $var = base_url('public/outras-imagens/DSC_0919.jpg');?>
        <div class="container-fluid h-inherit; id=tall" style="background-image:url(<?php echo $var?>); background-size:auto; background-repeat:no-repeat;">
          <?php else:?>
          <div class="container-fluid h-inherit" style="background-color:#fff ">
      <?php endif ?>
      <div class="row d-lg-none"></div>
      <div class="row align-items-first h-inherit">
        <div class="col-3 pr-5 d-none d-lg-flex justify-content-end">
          <div class="col-10" id="panelmenu" style="background-color:#fff; -webkit-box-shadow: 0px 0px 21px 0px rgba(0,0,0,0.4); -moz-box-shadow: 0px 0px 21px 0px rgba(0,0,0,0.4); box-shadow: 0px 0px 21px 0px rgba(0,0,0,0.4);">
            <br><a href="<?php echo base_url('portifolio/index')?>"> <img src="<?php echo base_url('public/outras-imagens/logocarol.PNG');?>" alt="logo" height="auto" width="100%"> </a>
            <div class="menu">
                <form action="<?php echo base_url("portifolio/searchAll")?>" method="post">
                    <div class="col-md-8 d-inline-block" style="padding-right: 0px!important; text-align:right">
                      <div class="form-group">
                        <input type="text" name="SearchString" class="form-control" placeholder="Seach">
                      </div>
                    </div>
                    <div class="col-md-3 d-inline-block">
                      <button type="submit" class="btn btn-primary btn-block" style="background:#2c3e50">Ok</button>
                    </div>
                  </form>
              <ul class="p-0">
                <img src="<?php echo base_url('public/outras-imagens/hr.PNG');?>" style="width:100%">
                <br><br>
                  <li><a href="<?php echo base_url('portifolio/image')?>"> Portifolio </a></li>
                <li><a href="<?php echo base_url('video/index')?>" onclick="do_click();">Video</a></li>
                <li><a href="#" onclick="do_click();"> Anothers Jobs</a></li>
              </ul>
              <br>
              <ul class="p-0">
                <li><a href="<?php echo base_url('aboutme')?>" onclick="do_click();">About me</a></li>
                <li><a href="<?php echo base_url('businesspartners')?>" onclick="do_click();">Contact me</a></li>
              </ul>
              <br><img src="<?php echo base_url('public/outras-imagens/hr.PNG');?>" style="width:100%">
              <br>
              <br>
                <a href="https://www.facebook.com/carolribasmakeup/" target="_blank"><img class="link" src="<?php echo base_url('public/outras-imagens/facebook.png');?>" alt="face" height="auto"></a>
                <a href="https://www.instagram.com/carolribasmakeup/" target="_blank"><img class="link" src="<?php echo base_url('public/outras-imagens/instagram.jpg');?>" alt="insta" height="auto"></a>
                <?php if($user_type == 0) : ?>
                  <a href="<?php echo base_url('admin')?>"><img class="link" src="<?php echo base_url('public/outras-imagens/login.png');?>" alt="login" height="auto"></a>
                <?php else : ?>
                  <a href="<?php echo base_url('admin/logout')?>"><img class="link" src="<?php echo base_url('public/outras-imagens/login.png');?>" alt="login" height="auto"></a>
                <?php endif ?>
                <br><br>
            </div>
          </div>
        </div>
      <div class='col-9 h-inherit'>
       <div class="content h-inherit">
          <!--
          <a href="http://www.juniorqueiros.com/files/gimgs/16_dsc9330-editar-editar-editar.jpg" title="" class="image"  data-toggle="modal" data-target=".bd-example-modal-lg"><img src="http://www.juniorqueiros.com/files/gimgs/th-16_dsc9330-editar-editar-editar.jpg" alt="" height="133"></a>
          -->

<script>
  $(document).ready(function() {
    var height = $('.content').getHeight();
    $('.col-3').height(height);
  })
</script>
