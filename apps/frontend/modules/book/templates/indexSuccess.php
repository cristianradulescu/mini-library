<div class="title">
  <span class="title_icon"><img src="/images/bullet1.gif" alt="" title=""></span>
  Books
</div>

<?php foreach ($books as $book): ?>
  <div class="feat_prod_box">
    <div class="prod_img">
      <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>">
        <img src="/images/not_available.png" alt="" title="" border="0">
      </a>
    </div>
    <div class="prod_det_box">
      <div class="box_top"></div>
      <div class="box_center">
        <div class="prod_title"><?php echo $book->getTitle() ?></div>
        <p class="details"><?php echo $book->getDescription() ?></p>
        <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>" class="more">- more details -</a>
        <div class="clear"></div>
      </div>
      <div class="box_bottom"></div>
    </div>
    <div class="clear"></div>
  </div>
<?php endforeach ?>
