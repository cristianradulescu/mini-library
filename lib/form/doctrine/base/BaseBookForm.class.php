<?php

/**
 * Book form base class.
 *
 * @method Book getObject() Returns the current form's model object
 *
 * @package    minilib
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'publisher_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Publisher'), 'add_empty' => true)),
      'isbn'         => new sfWidgetFormInputText(),
      'year'         => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'image'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'author_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'required' => false)),
      'publisher_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Publisher'), 'required' => false)),
      'isbn'         => new sfValidatorString(array('max_length' => 255)),
      'year'         => new sfValidatorInteger(),
      'description'  => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('book[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Book';
  }

}
