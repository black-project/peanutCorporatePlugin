<?php

/**
 * peanutLink form.
 *
 * @package    peanutCorporatePlugin
 * @subpackage form
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com> <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutLinkForm extends BasepeanutLinkForm
{
  public function setup()
  {
    parent::setup();
    
    $user = self::getValidUser();
    
    $this->useFields(array(
     'title',
     'slug',
     'url',
     'content',     
     'author',
     'status',
     'menu',
     'created_at'
    ));
        
    $this->widgetSchema['url'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'http://www.mywebsite.com'        
    ));

    $this->widgetSchema['content'] = new sfWidgetFormTextarea($options = array(), $attributes = array(
        'placeholder' => 'Simple description about my link'
    ));
    
    $this->embedRelation('peanutXfn');
    $this->widgetSchema['peanutXfn']->setLabel('XFN');

    $this->embedRelation('peanutSeo');
    $this->widgetSchema['peanutSeo']->setLabel('SEO');
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
    $this->validatorSchema['url'] = new sfValidatorUrl($options = array(
      'required'  => true
    ),$messages = array(
      'required'  => 'Fill this please'
    ));

    $this->widgetSchema['author'] = new sfWidgetFormChoice(array(
          'choices' => $this->_getUsers()
      ));

    }
    
    protected function _getUsers()
    {
      $users = array();
      $choices = Doctrine::getTable('sfGuardUser')->getUsersWhereGroupIs('2')->execute();

      foreach($choices as $user)
      {
        $users[$user->getId()] = $user->getName();
      }

      return $users;
    }
    
    public function doBind(array $values) 
    { 
      $url = ($values['url'] );

      if(preg_match('#^https?://.+#', $url) ){             

      $this->validatorSchema['url'] = new sfValidatorUrl($options = array(
          'required'  => true
        ),$messages = array(
          'required'  => 'Fill this please'
      ));

      }
      else if(preg_match('#^/.+\.html$#', $url)) {         
           $this->validatorSchema['url'] = new sfValidatorPass($options = array(
            'required'  => true
          ),$messages = array(
            'required'  => 'Fill this please'
          ));       
       }   

      function clearIfMe( $values )
      {
        if($values['peanutXfn']['me'] == "on") {              
          foreach($values['peanutXfn'] as $key => $val){
            if($key != "me")
              $values['peanutXfn'][$key] = null;          
          }     
        }    
        return $values['peanutXfn'];
      }

      $values['peanutXfn'] = clearIfMe($values);

      parent::doBind($values); 
    }
  
}
