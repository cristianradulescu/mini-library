<div class="title">
  <span class="title_icon"><img src="/images/bullet3.gif" alt="" title=""></span>
  <?php echo $book->getTitle() ?>
</div>

<div class="feat_prod_box">
  <div class="prod_img">
    <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>">
      <?php $image_name = $book->getImage() ? $book->getImage() : 'not_available' ?>
      <img src="<?php MinilibImage::getInstance($image_name)->getBase64ThumbnailSrc() ?>" width="98" height="150" alt="" title="" border="0">
    </a>
  </div>
  <div class="prod_det_box">
    <div class="box_top"></div>
    <div class="box_center">
      <div class="prod_title">Description</div>
      <p class="details"><?php echo $book->getDescription() ?></p>
      <div class="clear"></div>

      <div class="prod_title">Author</div>
      <p class="details"><?php echo $book->getAuthor() ?></p>
      <div class="clear"></div>

      <div class="prod_title">Publisher</div>
      <p class="details"><?php echo $book->getPublisher() ?></p>
      <div class="clear"></div>

      <div class="prod_title">ISBN</div>
      <p class="details"><?php echo $book->getIsbn() ?></p>
      <div class="clear"></div>

      <div class="prod_title">Year</div>
      <p class="details"><?php echo $book->getYear() ?></p>
      <div class="clear"></div>

      <div class="prod_title">Rating</div>
      <p class="details">
        <form>
        <?php for ($i = 1; $i <= 5; $i++): ?>
           <input name="star" type="radio" class="auto-submit-star"<?php echo $i == $book->getRatingAverage() ? ' checked="checked"' : '' ?> />
        <?php endfor ?>
        (<?php echo count($book->getRating()) ?> votes)
        </form>
        <script type="text/javascript">
          $('.auto-submit-star').rating({
            callback: function(value, link){
              alert(value);
            }
          });
        </script>
      </p>
      <div class="clear"></div>
    </div>
    <div class="box_bottom"></div>
  </div>
  <div class="clear"></div>
</div>
