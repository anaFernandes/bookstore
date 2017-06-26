<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-commerce</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url('public/bootstrap/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css')?>">
		    <link rel="stylesheet" href="<?php echo base_url('public/css/form-elements.css')?>">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <?php if($active == "books") : ?>
                <li class="active"><a href="<?php echo base_url('book')?>"> Livros</a></li>
                <li><a href="<?php echo base_url('author')?>"> Autores </a></li>
                <li><a href="<?php echo base_url('category')?>"> Categorias </a></li>
              <?php endif ?>
              <?php if($active == "authors") : ?>
                <li><a href="<?php echo base_url('book')?>"> Livros</a></li>
                <li class="active"><a href="<?php echo base_url('author')?>"> Autores </a></li>
                <li><a href="<?php echo base_url('category')?>"> Categorias </a></li>
              <?php endif ?>
              <?php if($active == "categories") : ?>
                <li><a href="<?php echo base_url('book')?>"> Livros</span></a></li>
                <li><a href="<?php echo base_url('author')?>"> Autores </a></li>
                <li class="active"><a href="<?php echo base_url('category')?>"> Categorias </a></li>
              <?php endif?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('Admin/logout')?>"> Logout </a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
