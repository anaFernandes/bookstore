<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<div class="row">
  <br>
  <br>
<?php if(count($videos)): ?>
            <?php $video_counter = 0; ?>
            <?php foreach ($videos as $key => $video):?>
              <?php if($video_counter == 0) :?>
                <?php endif ?>
                  <div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 40px; margin-right:30px">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$video->address;?>"> allowfullscreen></iframe>
                  </div>
                  <?php $video_counter++; if($video_counter == 4) : ?>
                  <?php  $video_counter = 0 ?>
                <!-- </div> -->
              <?php endif?>
            <?php endforeach ?>
          <?php endif ?>
</div>
