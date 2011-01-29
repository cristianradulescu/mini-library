<?php

/**
 * Book form.
 *
 * @package    minilib
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookForm extends BaseBookForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $tiny_mce_config = array(
        'width'  => 600,
        'height' => 250,
        'config' => 'relative_urls: false'
    );

    $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE($tiny_mce_config);
  }
}
