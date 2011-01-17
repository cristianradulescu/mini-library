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
        <div class="logo"><a href="index.html"><img src="/images/logo.gif" alt="" title="" border="0" /></a></div>
        <div id="menu">
          <ul>
            <li><a href="<?php echo url_for('@homepage') ?>">home</a></li>
            <li class="selected"><a href="<?php echo url_for('book/index') ?>">books</a></li>
          </ul>
        </div>
      </div>

      <div class="center_content">
       	<div class="left_content">

          <?php echo $sf_content ?>

          <div class="clear"></div>
        </div><!--end of left content-->

        <div class="right_content">

          <div class="title"><span class="title_icon"><img src="/images/bullet3.gif" alt="" title="" /></span>About Our Store</div>
          <div class="about">
            <p>
              <img src="/images/about.gif" alt="" title="" class="right" />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
            </p>

          </div>

          <div class="right_box">

            <div class="title"><span class="title_icon"><img src="/images/bullet5.gif" alt="" title="" /></span>Publishers</div>

            <ul class="list">
              <li><a href="#">accesories</a></li>
              <li><a href="#">books gifts</a></li>
              <li><a href="#">specials</a></li>
              <li><a href="#">hollidays gifts</a></li>
              <li><a href="#">accesories</a></li>
              <li><a href="#">books gifts</a></li>
              <li><a href="#">specials</a></li>
              <li><a href="#">hollidays gifts</a></li>
              <li><a href="#">accesories</a></li>
              <li><a href="#">books gifts</a></li>
              <li><a href="#">specials</a></li>
            </ul>
          </div>

          <div class="right_box">
            <div class="title"><span class="title_icon"><img src="/images/bullet6.gif" alt="" title="" /></span>Authors</div>

            <ul class="list">
              <li><a href="#">accesories</a></li>
              <li><a href="#">books gifts</a></li>
              <li><a href="#">specials</a></li>
              <li><a href="#">hollidays gifts</a></li>
              <li><a href="#">accesories</a></li>
              <li><a href="#">books gifts</a></li>
              <li><a href="#">specials</a></li>
              <li><a href="#">hollidays gifts</a></li>
              <li><a href="#">accesories</a></li>
            </ul>

          </div>


        </div><!--end of right content-->




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