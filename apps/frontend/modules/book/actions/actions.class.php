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
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('Book')
      ->createQuery('b')
      ->addOrderBy('b.title');

    $this->pager = new sfDoctrinePager('Book', sfConfig::get('app_book_list_max_per_page'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->book = Doctrine_Core::getTable('Book')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->book);
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
