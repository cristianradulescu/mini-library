<?php

/**
 * sidebar components.
 *
 * @package    minilib
 * @subpackage sidebar
 * @author     Cristian Radulescu
 */
class sidebarComponents extends sfComponents
{
 /**
  * Executes sidebar action
  *
  * @param sfRequest $request A request object
  */
  public function executeSidebar(sfWebRequest $request)
  {
    $this->publishers = PublisherTable::getInstance()
                        ->createQuery('p')
                        ->addOrderBy('p.name')
                        ->execute();

    $this->authors = AuthorTable::getInstance()
                      ->createQuery('a')
                      ->addOrderBy('a.name')
                      ->execute();
  }
}
