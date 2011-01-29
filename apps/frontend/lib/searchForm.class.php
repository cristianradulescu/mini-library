<?php
/**
 * Search form class
 *
 * @author Cristian Radulescu
 */
class searchForm extends BaseForm
{
  public function configure()
  {
    $url = sfContext::getInstance()->getRouting()->generate('search_autocompleter');
    $this->setWidgets(array(
      'q' => new sfWidgetFormDoctrineJQueryAutocompleter(array('model' => 'book', 'url' => $url), array('class' => 'contact_input'))
    ));

//    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('search_form');
  }
}
