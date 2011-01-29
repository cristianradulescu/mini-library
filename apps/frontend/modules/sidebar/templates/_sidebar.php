<div class="right_content">
  <?php include_component('book', 'searchBox') ?>
  <div class="right_box">
    <div class="title">
      <span class="title_icon"><img src="/images/bullet5.gif" alt="" title="" /></span>
      <?php echo __('Publishers') ?>
    </div>

    <ul class="list">
      <?php foreach ($publishers as $publisher): ?>
        <li>
          <a href="<?php echo url_for2('filter_books_by_publisher', array('publisher_id' => $publisher->getId()))?>">
            <?php echo $publisher->getName() ?>
          </a> (<?php echo $publisher->getBooksCount() ?>)
        </li>
      <?php endforeach ?>
    </ul>
  </div>

  <div class="right_box">
    <div class="title">
      <span class="title_icon"><img src="/images/bullet6.gif" alt="" title="" /></span>
      <?php echo __('Authors') ?>
    </div>

    <ul class="list">
      <?php foreach ($authors as $author): ?>
        <li>
          <a href="<?php echo url_for2('filter_books_by_author', array('author_id' => $author->getId()))?>">
            <?php echo $author->getName() ?>
          </a> (<?php echo $author->getBooksCount() ?>)
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>