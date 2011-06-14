<?php

/**
 * items actions.
 *
 * @package    peanutCorporatePlugin
 * @subpackage items
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $items = Doctrine_Core::getTable('peanutPage')->getItemsByMenu(1);
    $this->item = $items->fetchOne();

    $this->forward404Unless($this->item);
  }

  public function executeShow(sfWebRequest $request)
  {
    $item = Doctrine_Core::getTable('peanutItem')->showItem($this->getRequestParameter('slug'));
    $this->item = $item->fetchOne();
    
    $this->forward404Unless($this->item);
  }

  public function executeList(sfWebRequest $request)
  {
    $items = Doctrine_Core::getTable('peanutItem')->getItems();
    $items = $this->_processing($request, $items);
    
    $this->items = $items;
  }

  public function executeListByAuthor(sfWebRequest $request)
  {
    $items = Doctrine_Core::getTable('peanutPage')->getItemsByAuthor($this->getRequestParameter('author'));
    $items = $this->_processing($request, $items);
    
    $this->items = $items;
  }

  public function executeListByMenu(sfWebRequest $request)
  {
    $items = Doctrine_Core::getTable('peanutItem')->getItemsByMenu($this->getRequestParameter('menu'));
    $items = $this->_processing($request, $items);
    
    $this->items = $items;
  }

  public function executeListLinkByRelation(sfWebRequest $request)
  {
    $links = Doctrine_core::getTable('peanutLink')->getItemsByRelation($this->getRequestParameter('relation'));
    $items = $this->_processing($request, $links);
    
    $this->items = $items;
  }
  
  
  protected function _processing($request, $object)
  {
    if('json' === $request->getRequestFormat())
    {   
      $items = $object->execute();
        
      $fetch = array();
      $i = 0;
      foreach($items as $item)
      {
        $fetch[$i++] = $item->asArray();
      }

      $items = $fetch;
    }
    else
    {
      $items = $object->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    }
    
    return $items;
  }

}
