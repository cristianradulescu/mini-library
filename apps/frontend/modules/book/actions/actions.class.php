<?php

/**
 * book actions.
 *
 * @package    minilib
 * @subpackage book
 * @author     Cristian Radulescu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookActions extends sfActions
{
  /**
   * Execute the index action
   *
   * @param sfWebRequest $request
   *
   * @return void
   */
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('Book')
      ->createQuery()
      ->addOrderBy('title');

    $this->pager = new sfDoctrinePager('Book', sfConfig::get('app_book_list_max_per_page'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Execute the show action
   *
   * @param sfWebRequest $request
   *
   * @return void
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->book = Doctrine_Core::getTable('Book')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->book);
  }

  /**
   * Executes the show action with filtering on author
   *
   * @param sfWebRequest $request
   *
   * @return void
   */
  public function executeShowBooksByAuthor(sfWebRequest $request)
  {
    $author_id = $request->getParameter('author_id');
    $author = AuthorTable::getInstance()->findOneById($author_id);

    if (!$author)
    {
      $this->getUser()->setFlash('error', 'Author not found');
      $this->redirect('book/index');
    }

    $this->getUser()->setFlash('notice', 'Displaying books for author '.$author->getName());

    $q = Doctrine_Core::getTable('Book')
      ->createQuery()
      ->addWhere('author_id = ?', $author_id)
      ->addOrderBy('title');

    $this->pager = new sfDoctrinePager('Book', sfConfig::get('app_book_list_max_per_page'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->setTemplate('index');
  }

  /**
   * Executes the show action with filtering on publisher
   *
   * @param sfWebRequest $request
   *
   * @return void
   */
  public function executeShowBooksByPublisher(sfWebRequest $request)
  {
    $publisher_id = $request->getParameter('publisher_id');
    $publisher = PublisherTable::getInstance()->findOneById($publisher_id);

    if (!$publisher)
    {
      $this->getUser()->setFlash('error', 'Publisher not found');
      $this->redirect('book/index');
    }

    $this->getUser()->setFlash('notice', 'Displaying books for publisher '.$publisher->getName());

    $q = Doctrine_Core::getTable('Book')
      ->createQuery()
      ->addWhere('publisher_id = ?', $publisher_id)
      ->addOrderBy('title');

    $this->pager = new sfDoctrinePager('Book', sfConfig::get('app_book_list_max_per_page'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->setTemplate('index');
  }


//  public function executeNew(sfWebRequest $request)
//  {
//    $this->form = new BookForm();
//  }
//
//  public function executeCreate(sfWebRequest $request)
//  {
//    $this->forward404Unless($request->isMethod(sfRequest::POST));
//
//    $this->form = new BookForm();
//
//    $this->processForm($request, $this->form);
//
//    $this->setTemplate('new');
//  }
//
//  public function executeEdit(sfWebRequest $request)
//  {
//    $this->forward404Unless($book = Doctrine_Core::getTable('Book')->find(array($request->getParameter('id'))), sprintf('Object book does not exist (%s).', $request->getParameter('id')));
//    $this->form = new BookForm($book);
//  }
//
//  public function executeUpdate(sfWebRequest $request)
//  {
//    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//    $this->forward404Unless($book = Doctrine_Core::getTable('Book')->find(array($request->getParameter('id'))), sprintf('Object book does not exist (%s).', $request->getParameter('id')));
//    $this->form = new BookForm($book);
//
//    $this->processForm($request, $this->form);
//
//    $this->setTemplate('edit');
//  }
//
//  public function executeDelete(sfWebRequest $request)
//  {
//    $request->checkCSRFProtection();
//
//    $this->forward404Unless($book = Doctrine_Core::getTable('Book')->find(array($request->getParameter('id'))), sprintf('Object book does not exist (%s).', $request->getParameter('id')));
//    $book->delete();
//
//    $this->redirect('book/index');
//  }
//
//  protected function processForm(sfWebRequest $request, sfForm $form)
//  {
//    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//    if ($form->isValid())
//    {
//      $book = $form->save();
//
//      $this->redirect('book/edit?id='.$book->getId());
//    }
//  }
}
