<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  
  <section class="language clearfix">
    <ul>
      <li class="us">US</li>
      <li class="fr">FR</li>
    </ul>
  </section>
  
  <?php echo form_tag_for($form, '@peanut_page') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
      
    <fieldset id="sf_fieldset_general">
      <div class="content_box_header">
        <h2><?php echo __('Général') ?></h2>
      </div>
      
      <div class="content_box_content clearfix">
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_title fr">
          <?php echo $form['fr']['title']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['fr']['title']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['fr']['title']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_slug fr">
          <?php echo $form['fr']['slug']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['fr']['slug']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['fr']['slug']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_en_title us">
          <?php echo $form['en']['title']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['en']['title']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['en']['title']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_en_slug us">
          <?php echo $form['en']['slug']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['en']['slug']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['en']['slug']->renderHelp() ?>
          </div>
        </div>
        
      </div>
    </fieldset>
  
  
    <fieldset id="sf_fieldset_content">
      <div class="content_box_header">
        <h2><?php echo __('Contenu') ?></h2>
      </div>
      
      <div class="content_box_content">
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_content fr">
          <?php echo $form['fr']['content']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['fr']['content']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['fr']['content']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_excerpt fr">
          <?php echo $form['fr']['excerpt']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['fr']['excerpt']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['fr']['excerpt']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_en_content us">
          <?php echo $form['en']['content']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['en']['content']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['en']['content']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_en_excerpt us">
          <?php echo $form['en']['excerpt']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['en']['excerpt']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['en']['excerpt']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_peanutSeo">
          
          <?php echo $form['peanutSeo']->renderLabel() ?>
          
          <div class="content">
            <div class="embedForm">
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['title']->renderLabel() ?>
                <?php echo $form['peanutSeo']['title']->render() ?>
                <div class="form-help"><?php echo $form['peanutSeo']['title']->renderHelp() ?></div>
              </div>
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['description']->renderLabel() ?>
                <?php echo $form['peanutSeo']['description']->render() ?>
                <div class="form-help"><?php echo $form['peanutSeo']['description']->renderHelp() ?></div>
              </div>
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['is_indexable']->renderLabel() ?>
                <?php echo $form['peanutSeo']['is_indexable']->render() ?>
                <div class="form-help"><?php echo $form['peanutSeo']['is_indexable']->renderHelp() ?></div>
              </div>
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['is_followable']->renderLabel() ?>
                <?php echo $form['peanutSeo']['is_followable']->render() ?>
                <div class="form-help"><?php echo $form['peanutSeo']['is_followable']->renderHelp() ?></div>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
    </fieldset>
  
    <fieldset id="sf_fieldset_informations">
      <div class="content_box_header">
        <h2><?php echo __('Informations') ?></h2>
      </div>
      
      <div class="content_box_content">
        <div class="sf_admin_form_row sf_admin_enum sf_admin_form_field_status">
          <?php echo $form['status']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['status']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['status']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_author">
          <?php echo $form['author']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['author']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['author']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_menu">
          <?php echo $form['menu']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['menu']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['menu']->renderHelp() ?>
          </div>
        </div>
        
        <?php if(!$form->isNew()): ?>
        <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_menu">
          <?php echo $form['created_at']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['created_at']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['created_at']->renderHelp() ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </fieldset>
  
    

    <?php include_partial('adminPage/form_actions', array('peanut_page' => $peanut_page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
