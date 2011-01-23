<?php

/**
 * Rating form base class.
 *
 * @method Rating getObject() Returns the current form's model object
 *
 * @package    minilib
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRatingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'book_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'value'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'))),
      'value'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('rating[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rating';
  }

}
