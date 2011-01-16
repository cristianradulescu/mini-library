<?php

class extractBooksTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      new sfCommandOption('url', null, sfCommandOption::PARAMETER_OPTIONAL, 'URL', 'http://www.automation.ucv.ro/Romana/biblAU.htm'),
      // add your own options here
    ));

    $this->namespace        = 'lib';
    $this->name             = 'extractBooks';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [extractBooks|INFO] extract books info from web.
Call it with:

  [php symfony extractBooks|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    try
    {
      // add your code here
      $dom = new DomDocument('1.0', 'utf-8');
      $dom->validateOnParse = true;

      $this->logSection('info', 'Loading url: '.$options['url']);
      @$dom->loadHTMLFile($options['url']);

      $c = new sfDomCssSelector($dom);

      $this->logSection('info', 'Retrieving data');
      $values = $c->matchAll('table[border="1"] > tr[class="text"] > td')->getValues();

      $counter = 0;
      for ($i = 0; $i < count($values); $i = $i+5)
      {
        $books[$counter]['title'] = str_replace(PHP_EOL.'                        ', '', trim($values[$i]));
        $books[$counter]['author'] = trim($values[$i+1]);
        $books[$counter]['publisher'] = trim($values[$i+2]);
        $books[$counter]['isbn'] = trim($values[$i+3]);
        $books[$counter]['year'] = trim($values[$i+4]);

        $author = Doctrine::getTable('author')->findOneByName($books[$counter]['author']);

        if (!$author)
        {
          $author = new Author();
          $author->setName($books[$counter]['author']);
          $author->save();
        }

        $publisher = Doctrine::getTable('publisher')->findOneByName($books[$counter]['publisher']);

        if (!$publisher)
        {
          $publisher = new Publisher();
          $publisher->setName($books[$counter]['publisher']);
          $publisher->save();
        }

        $book = Doctrine::getTable('book')->findOneByTitle($books[$counter]['title']);

        if (!$book)
        {
          $book = new Book();
          $book->setTitle($books[$counter]['title']);
          $book->setAuthor($author);
          $book->setPublisher($publisher);
          $book->setIsbn($books[$counter]['isbn']);
          $book->setYear($books[$counter]['year']);
          $book->save();
        }

        $counter++;
      }
    }
    catch (Exception $e)
    {
      $this->logSection('error', $e->getMessage(), null, 'ERROR');
    }

    $this->logSection('info', 'Done');
  }
}
