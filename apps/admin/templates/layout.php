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

    <div id="nav">
      <ul>
        <li<?php if ($sf_params->get('module') == 'book'): ?> class="current"<?php endif ?>>
          <a href="<?php echo url_for('@book') ?>"><b>Books</b></a>
        </li>
        <li<?php if ($sf_params->get('module') == 'author'): ?> class="current"<?php endif ?>>
          <a href="<?php echo url_for('@author') ?>"><b>Authors</b></a>
        </li>
        <li<?php if ($sf_params->get('module') == 'publisher'): ?> class="current"<?php endif ?>>
          <a href="<?php echo url_for('@publisher') ?>"><b>Publishers</b></a>
        </li>
      </ul>
    </div>

    <?php echo $sf_content ?>
  </body>
</html>