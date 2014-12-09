<div class="categories form">
    <h3><?php echo __d('cake', 'Edit Category'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('parent');
    echo $this->Form->input('title');
    echo $this->Form->input('groupid');
    echo $this->Form->input('title1');
    echo $this->Form->input('inListing');
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Categories', array('action' => 'index')); ?></li>
    </ul>
</div>
