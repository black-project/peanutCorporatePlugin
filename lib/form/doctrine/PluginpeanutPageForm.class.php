<?php

/**
 * peanutPage form.
 *
 * @package    peanutCorporatePlugin
 * @subpackage form
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com> <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutPageForm extends BasepeanutPageForm
{
  public function setup()
  {
    parent::setup();
    
    $user = self::getValidUser();
    
    $this->useFields(array(
     'status',
     'author',
     'menu',
     'created_at'
    ));

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
    
    $this->validatorSchema['content'] = new sfValidatorString($options = array(
      'required'  => true
    ),$messages = array(
      'required'  => 'Fill this please'
    ));
    
    $this->embedI18n(array('en', 'fr'));
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('fr', 'Français');
  }
}
