<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="wrap">

      <div class="header">
        
        <div id="menu">
          <ul>
            <li>
              <img src="/images/icons/house.png" />
              <a href="<?php echo url_for('@homepage') ?>">home</a>
            </li>
            <li class="selected">
              <img src="/images/icons/book_open.png" />
              <a href="<?php echo url_for('book/index') ?>">books</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="center_content">
       	<div class="left_content">
          <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice">
              <?php echo $sf_user->getFlash('notice') ?>
            </div>
          <?php endif ?>

          <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error">
              <?php echo $sf_user->getFlash('error') ?>
            </div>
          <?php endif ?>

          <?php echo $sf_content ?>

          <div class="clear"></div>
        </div><!--end of left content-->

        <!--start right content-->
        <?php include_component('sidebar', 'sidebar') ?>
        <!--end of right content-->

        <div class="clear"></div>
      </div><!--end of center content-->


      <div class="footer">
       	<div class="left_footer"><img src="/images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com"><img src="/images/csscreme.gif" alt="by csscreme.com" title="by csscreme.com" border="0" /></a></div>
        <div class="right_footer">
          <a href="#">home</a>
          <a href="#">about us</a>
          <a href="#">services</a>
          <a href="#">privacy policy</a>
          <a href="#">contact us</a>

        </div>


      </div>


    </div>

  </body>
</html>