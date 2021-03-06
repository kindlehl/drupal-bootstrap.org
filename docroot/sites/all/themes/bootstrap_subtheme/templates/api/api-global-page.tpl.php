<?php

/**
 * @file
 * Displays an API page for a global variable.
 *
 * Available variables:
 * - $alternatives: List of alternate versions (branches) of this global.
 * - $documentation: Documentation from the comment header of the global.
 * - $see: See also documentation.
 * - $deprecated: Deprecated documentation.
 * - $namespace: Name of the namespace for this function, if any.
 * - $defined: HTML reference to file that defines this global.
 * - $code: HTML-formatted declaration of this global.
 * - $related_topics: List of related groups/topics.
 * - $branch: Object with information about the branch.
 * - $object: Object with information about the global.
 *
 * Available variables in the $branch object:
 * - $branch->project: The machine name of the branch.
 * - $branch->title: A proper title for the branch.
 * - $branch->directories: The local included directories.
 * - $branch->excluded_directories: The local excluded directories.
 *
 * Available variables in the $object object:
 * - $object->title: Display name.
 * - $object->related_topics: Related information about the function.
 * - $object->object_type: For this template it will be 'global'.
 * - $object->branch_id: An identifier for the branch.
 * - $object->file_name: The path to the file in the source.
 * - $object->summary: A one-line summary of the object.
 * - $object->code: Escaped source code.
 * - $object->see: HTML index of additional references.
 *
 * @see api_preprocess_api_object_page()
 *
 * @ingroup themeable
 */
?>

<?php print $alternatives; ?>

<?php print _db_api_display_documentation($object, $documentation); ?>

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

<?php if ($namespace) : ?>
  <h3><?php print t('Namespace'); ?></h3>
  <?php print $namespace; ?>
<?php endif; ?>

<h3><?php print t('Source'); ?> <?php print $defined; ?></h3>
<?php print _db_api_display_code($object, $code, FALSE); ?>
