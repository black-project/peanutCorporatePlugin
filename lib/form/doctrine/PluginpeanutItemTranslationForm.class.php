<?php

/**
 * PluginpeanutItemTranslation form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutItemTranslationForm extends BasepeanutItemTranslationForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();
    
    $this->useFields(array(
      'title',
      'slug',
      'content'
    ));
  }
}
