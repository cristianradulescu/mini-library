<?php

/**
 * BookTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BookTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object BookTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('Book');
  }

  /**
   * Book list table method
   *
   * @param Doctrine_Query $q
   * 
   * @return Doctrine_Query
   */
  public function retrieveAdminBookList(Doctrine_Query $q)
  {
    $rootAlias = $q->getRootAlias();
    $q->leftJoin($rootAlias . '.Author a');
    $q->leftJoin($rootAlias . '.Publisher p');

    return $q;
  }
}