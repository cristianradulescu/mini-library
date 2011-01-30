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

    // add tiny mce for description
    $tiny_mce_config = array(
        'width'  => 600,
        'height' => 250,
        'config' => 'relative_urls: false'
    );

    $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE($tiny_mce_config);

    // image handling
    $img_name = MinilibImage::getInstance($this->getObject()->getImage())->getThumbnailSrc();

    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
			'file_src'     => $img_name,
			'is_image'     => true,
			'with_delete' => false
		));

    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('app_images_path'),
      'mime_types' => 'web_images',
      'validated_file_class' => 'MinilibValidatedFile'
    ));

   $this->validatorSchema['image']->setOption('mime_type_guessers', array(
      array($this->validatorSchema['image'], 'guessFromFileinfo'),
      array($this->validatorSchema['image'], 'guessFromFileBinary'),
      array($this->validatorSchema['image'], 'guessFromMimeContentType')
    ));
  }
}
