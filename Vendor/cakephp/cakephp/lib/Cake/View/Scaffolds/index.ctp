<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="<?php echo $pluralVar; ?> index">
<h2><?php echo $pluralHumanName; ?></h2>
<table cellpadding="0" cellspacing="0" class="table table-stripped">
<tr>
<?php foreach ($scaffoldFields as $_field): ?>
	<th><?php echo $this->Paginator->sort($_field); ?></th>
<?php endforeach; ?>
	<th><?php echo __d('cake', 'Actions'); ?></th>
</tr>
<?php
foreach (${$pluralVar} as ${$singularVar}):
	echo '<tr>';
		foreach ($scaffoldFields as $_field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $_alias => $_details) {
					if ($_field === $_details['foreignKey']) {
						$isKey = true;
						echo '<td>' . $this->Html->link(${$singularVar}[$_alias][$_details['displayField']], array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . '</td>';
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo '<td>' . h(${$singularVar}[$modelClass][$_field]) . '</td>';
			}
		}

		echo '<td class="actions">';
		echo $this->Html->link(__d('cake', 'View'), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Html->link(__d('cake', 'Edit'), array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Form->postLink(
			__d('cake', 'Delete'),
			array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]),
			array(),
			__d('cake', 'Are you sure you want to delete # %s?', ${$singularVar}[$modelClass][$primaryKey])
		);
		echo '</td>';
	echo '</tr>';

endforeach;

?>
</table>
<p>
    <?php
    echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
    ?>
</p>
<?php if ($this->Paginator->counter('{:count}') >= 10) { ?>
    <ul class="pagination">
        <?php
        echo $this->Paginator->prev('<<', array('tag' => 'li', 'escape' => false), '<a ><<</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
        echo $this->Paginator->next('>>', array('tag' => 'li', 'escape' => false), '<a>>></a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
        ?>
    </ul>
<?php } ?>

</div>
<div class="actions">
	<h3><?php echo __d('cake', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('cake', 'New %s', $singularHumanName), array('action' => 'add')); ?></li>
<?php
		$done = array();
		foreach ($associations as $_type => $_data) {
			foreach ($_data as $_alias => $_details) {
				if ($_details['controller'] != $this->name && !in_array($_details['controller'], $done)) {
					echo '<li>';
					echo $this->Html->link(
						__d('cake', 'List %s', Inflector::humanize($_details['controller'])),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'index')
					);
					echo '</li>';

					echo '<li>';
					echo $this->Html->link(
						__d('cake', 'New %s', Inflector::humanize(Inflector::underscore($_alias))),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'add')
					);
					echo '</li>';
					$done[] = $_details['controller'];
				}
			}
		}
?>
	</ul>
</div>
