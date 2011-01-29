<div class="title">
  <span class="title_icon"><img src="/images/bullet3.gif" alt="" title="" /></span>
  <?php echo __('Search books') ?>
</div>
<div>
  <form name="register" action="<?php echo url_for('@search') ?>">
    <div class="form_row">
      <?php echo $form['q']->render() ?>
      <input type="submit" class="register" value="<?php echo __('search') ?>">
    </div>
  </form>
</div>