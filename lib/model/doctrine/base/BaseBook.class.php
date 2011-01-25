<?php

/**
 * BaseBook
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property integer $author_id
 * @property integer $publisher_id
 * @property string $isbn
 * @property integer $year
 * @property string $description
 * @property string $image
 * @property Author $Author
 * @property Publisher $Publisher
 * 
 * @method string    getTitle()        Returns the current record's "title" value
 * @method integer   getAuthorId()     Returns the current record's "author_id" value
 * @method integer   getPublisherId()  Returns the current record's "publisher_id" value
 * @method string    getIsbn()         Returns the current record's "isbn" value
 * @method integer   getYear()         Returns the current record's "year" value
 * @method string    getDescription()  Returns the current record's "description" value
 * @method string    getImage()        Returns the current record's "image" value
 * @method Author    getAuthor()       Returns the current record's "Author" value
 * @method Publisher getPublisher()    Returns the current record's "Publisher" value
 * @method Book      setTitle()        Sets the current record's "title" value
 * @method Book      setAuthorId()     Sets the current record's "author_id" value
 * @method Book      setPublisherId()  Sets the current record's "publisher_id" value
 * @method Book      setIsbn()         Sets the current record's "isbn" value
 * @method Book      setYear()         Sets the current record's "year" value
 * @method Book      setDescription()  Sets the current record's "description" value
 * @method Book      setImage()        Sets the current record's "image" value
 * @method Book      setAuthor()       Sets the current record's "Author" value
 * @method Book      setPublisher()    Sets the current record's "Publisher" value
 * 
 * @package    minilib
 * @subpackage model
 * @author     Cristian Radulescu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBook extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('book');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('author_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('publisher_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('isbn', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('year', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Author', array(
             'local' => 'author_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Publisher', array(
             'local' => 'publisher_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}