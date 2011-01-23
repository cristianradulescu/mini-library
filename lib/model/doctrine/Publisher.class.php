<?php

/**
 * Publisher
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    minilib
 * @subpackage model
 * @author     Cristian Radulescu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Publisher extends BasePublisher
{
  public function getBooksCount()
  {
    return BookTable::getInstance()->createQuery('b')->addWhere('b.publisher_id = ?', $this->getId())->count();
  }
}
