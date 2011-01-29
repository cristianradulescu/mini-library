<div class="title">
  <span class="title_icon"><img src="/images/bullet3.gif" alt="" title=""></span>
  <?php echo $book->getTitle() ?>
</div>

<div class="feat_prod_box">
  <div class="prod_img">
    <a class="fancy_book_image" href="<?php MinilibImage::getInstance($book->getImage())->renderImageSrc() ?>">
      <img src="<?php MinilibImage::getInstance($book->getImage())->renderThumbnailSrc() ?>" width="98" height="150" alt="" title="" border="0">
    </a>
  </div>
  <div class="prod_det_box">
    <div class="box_top"></div>
    <div class="box_center">
      <div class="prod_title">Description</div>
      <p class="details"><?php echo $book->getRaw('description') ?></p>
      <div class="separator"></div><div class="clear"></div>

      <div class="prod_title">Author</div>
      <p class="details"><?php echo $book->getAuthor() ?></p>
      <div class="separator"></div><div class="clear"></div>

      <div class="prod_title">Publisher</div>
      <p class="details"><?php echo $book->getPublisher() ?></p>
      <div class="separator"></div><div class="clear"></div>

      <div class="prod_title">ISBN</div>
      <p class="details"><?php echo $book->getIsbn() ?></p>
      <div class="separator"></div><div class="clear"></div>

      <div class="prod_title">Year</div>
      <p class="details"><?php echo $book->getYear() ?></p>
      <div class="clear"></div>

    </div>
    <div class="box_bottom"></div>
  </div>
  <div class="clear"></div>
</div>
