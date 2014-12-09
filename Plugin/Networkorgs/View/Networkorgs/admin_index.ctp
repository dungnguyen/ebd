<div class="networkorgs index">
    <h2>Network Orgs</h2>
    <div class="clearfix filter">
     <?php 
     echo $this->Form->create('Networkorg', array(
        'class' => 'form-inline', 
        'inputDefaults' => array(
            'label' => false,
            ),
        ));
     echo $this->Form->input('search', array(
        'label' => false, 
        'tooltip' => false, 
        'placeholder' => __d('croogo', 'Search...'
            )));
     echo $this->Form->submit(__d('croogo', 'Filter'), array(
        'button' => 'default',
        'div' => false,
        ));
     echo $this->Form->end();        
     ?>
 </div>
 <table cellpadding="0" cellspacing="0" class="table table-stripped">
    <tr>
        <th><?php echo $this->Paginator->sort('ID'); ?></th>
        <th><?php echo $this->Paginator->sort('NetworkOrganisation', __d('croogo', 'Organisation')); ?></th>
        <th><?php echo $this->Paginator->sort('Networkcontactname', __d('croogo', 'Contact Name')); ?></th>
        <th><?php echo $this->Paginator->sort('Networkcontacttel', __d('croogo', 'Contact Tel')); ?></th>
        <th><?php echo $this->Paginator->sort('Networkcontactemail', __d('croogo', 'Contact Email')); ?></th>
        <th><?php echo $this->Paginator->sort('Networkcontacturl', __d('croogo', 'Contact Url')); ?></th>
        <th><?php echo $this->Paginator->sort('Networkstatus', __d('croogo', 'Status')); ?></th>
        <th><?php echo __d('cake', 'Actions'); ?></th>
    </tr>
    <?php foreach ($networkorgs as $value): ?>
        <tr>
            <td><?php echo $value['Networkorg']['ID']; ?></td>
            <td><?php echo $value['Networkorg']['NetworkOrganisation']; ?></td>
            <td><?php echo $value['Networkorg']['Networkcontactname']; ?></td>
            <td><?php echo $value['Networkorg']['Networkcontacttel']; ?></td>
            <td><?php echo $value['Networkorg']['Networkcontactemail']; ?></td>
            <td><?php echo $value['Networkorg']['Networkcontacturl']; ?></td>
            <td>
                <?php if ($value['Networkorg']['Networkstatus'] == 1): ?>
                    <span class="label label-warning"><?php echo __d('croogo', 'Unpublished'); ?></span>
                <?php endif ?>

                <?php if ($value['Networkorg']['Networkstatus'] == 2): ?>
                    <span class="label label-info"><?php echo __d('croogo', 'Published'); ?></span>
                <?php endif ?>  

                <?php if ($value['Networkorg']['Networkstatus'] == 3): ?>
                    <span class="label label-success"><?php echo __d('croogo', 'Preview'); ?></span>
                <?php endif ?>
            </td>
            <td class="actions">
                <?php  echo $this->Html->link(
                    __d('cake', 'Edit'),
                    array('action' => 'edit', $value['Networkorg']['ID'])
                    ); ?>

                <?php echo $this->Form->postLink(
                    __d('cake', 'Delete'),
                    array('action' => 'delete', $value['Networkorg']['ID']),
                    array(),
                    __d(
                        'cake',
                        'Are you sure you want to delete # %s?', $value['Networkorg']['ID']
                        )
                        ); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <?php
            echo $this->Paginator->counter(
                array(
                    'format' => __(
                        'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                        )
                    )
                );
                ?>
            </p>
            <?php if ($this->Paginator->counter('{:count}') >= 10) { ?>
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev(
                        '<<',
                        array('tag' => 'li', 'escape' => false),
                        '<a ><<</a>',
                        array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false)
                        );
                    echo $this->Paginator->numbers(
                        array(
                            'separator'    => '',
                            'tag'          => 'li',
                            'currentLink'  => true,
                            'currentClass' => 'active',
                            'currentTag'   => 'a'
                            )
                        );
                    echo $this->Paginator->next(
                        '>>',
                        array('tag' => 'li', 'escape' => false),
                        '<a>>></a>',
                        array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false)
                        );
                        ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="actions">
                    <h3><?php echo __d('cake', 'Actions'); ?></h3>
                    <ul>
                        <li><?php echo $this->Html->link(__d('cake', 'New Network Org'), array('action' => 'add')); ?></li
                        </ul>
                    </div>
