<div class="row pt-5">
  <br>
  <br>
<?php if(count($images)): ?>
            <?php $image_counter = 0; ?>
            <?php foreach ($images as $key => $image):?>
              <?php if($image_counter == 0) :?>
                <!-- <div class="col-md-12 col-lg-9"> -->
              <?php endif ?>
                  <!-- <div class="col-md-3"  style="padding:6px!important;"> -->
                    <a href="<?php echo base_url('public/upload/'.$image->imageid);?>.jpg" title="" class="image"  data-toggle="modal" data-target="#mod<?= $image->imageid;?>"><img src="<?php echo base_url('public/upload/'.$image->imageid);?>.jpg" alt="" height="150"></a>
                      <div class="modal fade" id="mod<?=$image->imageid;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <img src="<?php echo base_url('public/upload/'.$image->imageid);?>.jpg" alt="logo" height="auto" width="100%">
                            <p>Model:<?php echo $image->model;?>  Photographer: <?php echo $image->photographer;?> kind: <?php echo $image->keyword;?></p>
                            <?php if($user_type == 1) : ?>
                              <a href="<?php echo base_url('portifolio/edit/'.$image->imageid)?>" class="btn btn-primary btn-block">Edit</a>
                              <a href="<?php echo base_url('portifolio/del/'.$image->imageid)?>" class="btn btn-danger btn-block">Delete</a>
                            <?php endif ?>
                          </div>
                        </div>
                      <!-- </div> -->
                    </div>
              <?php $image_counter++; if($image_counter == 4) : ?>
                  <?php  $image_counter = 0 ?>
                <!-- </div> -->
              <?php endif?>
            <?php endforeach ?>
          <?php endif ?>
</div>
