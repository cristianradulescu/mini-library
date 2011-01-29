<div class="title">
  <span class="title_icon"><img src="/images/bullet3.gif" alt="" title=""></span>
  Books
</div>

<?php foreach ($pager->getResults() as $book): ?>
  <div class="feat_prod_box">
    <div class="prod_img">
      <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>">
        <img src="<?php MinilibImage::getInstance($book->getImage())->renderThumbnailSrc() ?>" width="98" height="150" alt="" title="" border="0">
      </a>
    </div>
    <div class="prod_det_box">
      <div class="box_top"></div>
      <div class="box_center">
        <div class="prod_title">
          <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>">
            <?php echo $book->getTitle() ?>
          </a>
        </div>
        <p class="details"><?php echo substr(strip_tags($book->getRaw('description')), 0, 100) ?>...</p>
        <a href="<?php echo url_for('book/show?id='.$book->getId()) ?>" class="more">- more details -</a>
        <div class="clear"></div>
      </div>
      <div class="box_bottom"></div>
    </div>
    <div class="clear"></div>
  </div>
<?php endforeach ?>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
  <?php if ($pager->haveToPaginate()): ?>
    <p>
      <span class="current"><?php echo count($pager) ?> books</span>
      <span class="current">page <?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></span>
    </p><p>&nbsp;</p>
  <?php endif; ?>

  <?php if (1 == $pager->getPage()): ?>
    <span class="disabled">&lt;&lt;</span>
    <span class="disabled">&lt;</span>
  <?php else: ?>
    <a href="<?php echo url_for('book/index?page=1') ?>">&lt;&lt;</a>
    <a href="<?php echo url_for('book/index?page='.$pager->getPreviousPage()) ?>">&lt;</a>
  <?php endif; ?>

  <?php foreach ($pager->getLinks(sfConfig::get('app_book_list_pagination_links')) as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <span class="current"><?php echo $page ?></span>
    <?php else: ?>
      <a href="<?php echo url_for('book/index?page='.$page) ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>

  <?php if ($pager->getLastPage() == $pager->getPage()): ?>
    <span class="disabled">&gt;</span>
    <span class="disabled">&gt;&gt;</span>
  <?php else: ?>
    <a href="<?php echo url_for('book/index?page='.$pager->getNextPage()) ?>">&gt;</a>
    <a href="<?php echo url_for('book/index?page='.$pager->getLastPage()) ?>">&gt;&gt;</a>
  <?php endif ?>
</div>
<?php endif ?>
