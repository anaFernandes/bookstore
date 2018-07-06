<div class="row mt-5">
    <div class="col-6">
     <h3 class="title"> Photographers</h3>
      <?php if(count($people)): ?>
         <?php foreach ($people as $key => $person):?>
           <?php if($person->kind == 1) :?>
             <p><?php echo $person->name ?> </p><br>
           <?php endif ?>
         <?php endforeach ?>
       <?php endif ?>

    </div>
    <div class="col-6">
      <h3 class="title"> Models </h3>
      <?php if(count($people)): ?>
        <?php foreach ($people as $key => $person):?>
          <?php if($person->kind == 2) :?>
            <p><?php echo $person->name ?> </p><br>
          <?php endif ?>
        <?php endforeach ?>
      <?php endif ?>

    </div>
</div>
