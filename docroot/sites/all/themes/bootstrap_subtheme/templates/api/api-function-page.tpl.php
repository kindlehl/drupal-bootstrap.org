<?php

/**
 * @file
 * Displays an API page for a function.
 *
 * Available variables:
 * - $signatures: Function signatures for this and other branches.
 * - $documentation: Documentation from the comment header of the function.
 * - $parameters: Function parameter documentation.
 * - $return: Function return value documentation.
 * - $override: If this is an override, the text to show for that.
 * - $throws: Documentation of thown exceptions.
 * - $class: If this is a method, the text for the class section.
 * - $see: See also documentation.
 * - $deprecated: Deprecated documentation.
 * - $related_topics: Related topics documentation.
 * - $call_links: Links to calling functions, hook implementations, etc.
 * - $defined: HTML reference to file that defines this function.
 * - $namespace: Name of the namespace for this function, if any.
 * - $code: HTML-formatted declaration and code of this function.
 * - $branch: Object with information about the branch.
 * - $object: Object with information about the function.
 * - $defined: HTML reference to file that defines this function.
 *
 * Available variables in the $branch object:
 * - $branch->project: The machine name of the branch.
 * - $branch->title: A proper title for the branch.
 * - $branch->directories: The local included directories.
 * - $branch->excluded_directories: The local excluded directories.
 *
 * Available variables in the $object object:
 * - $object->title: Display name.
 * - $object->return: What the function returns.
 * - $object->parameters: The function parameters.
 * - $object->related_topics: Related information about the function.
 * - $object->object_type: For this template it will be 'function'.
 * - $object->branch_id: An identifier for the branch.
 * - $object->file_name: The path to the file in the source.
 * - $object->summary: A one-line summary of the object.
 * - $object->code: Escaped source code.
 * - $object->see: HTML index of additional references.
 * - $object->throws: Paragraph describing possible exceptions.
 *
 * @see api_preprocess_api_object_page()
 *
 * @ingroup themeable
 */
?>
<table id="api-function-signature">
  <tbody>
    <?php foreach ($signatures as $signature) { ?>
      <?php if ($signature['active']) { ?>
        <tr class="active">
          <td class="branch"><?php print $signature['label']; ?></td>
          <td class="signature"><code><?php print $signature['signature']; ?></code></td>
        </tr>
      <?php }
            else { ?>
        <tr>
          <td class="branch"><?php print l($signature['label'], $signature['url'], array('html' => TRUE)); ?></td>
          <td class="signature"><code><?php print $signature['signature']; ?></code></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>

<?php print _db_api_display_documentation($object, $documentation); ?>

<?php if (!empty($parameters)) { ?>
<h3><?php print t('Parameters') ?></h3>
<?php print _db_api_display_documentation($object, $parameters); ?>
<?php } ?>

<?php if (!empty($return)) { ?>
<h3><?php print t('Return value') ?></h3>
<?php print $return ?>
<?php } ?>

<?php if (!empty($throws)) { ?>
  <h3><?php print t('Throws') ?></h3>
  <?php print $throws ?>
<?php } ?>

<?php print $override; ?>

<?php if (!empty($deprecated)) { ?>
  <div class="alert alert-warning">
    <h4><?php print t('Deprecated') ?></h4>
    <?php print $deprecated ?>
  </div>
<?php } ?>

<?php print _db_api_display_see_also($see); ?>

<?php if (!empty($related_topics)) { ?>
<h3><?php print t('Related topics') ?></h3>
<?php print $related_topics ?>
<?php } ?>

<?php
foreach ($call_links as $link) {
  print $link;
} ?>

<?php if ($class) : ?>
  <h3><?php print t('Class'); ?></h3>
  <?php print $class; ?>
<?php endif; ?>

<?php if ($namespace) : ?>
  <h3><?php print t('Namespace'); ?></h3>
  <?php print $namespace; ?>
<?php endif; ?>

<h3 id="source"><?php print t('Source'); ?> <?php print $defined; ?></h3>
<?php print _db_api_display_code($object, $code, FALSE); ?>
