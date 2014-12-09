<div class="companyentries index">
    <h2>Company Entries</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Companyentry', array(
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
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('companyname', __d('croogo', 'Name')); ?></th>
            <th><?php echo $this->Paginator->sort('street'); ?></th>
            <th><?php echo $this->Paginator->sort('phone'); ?></th>
            <th><?php echo $this->Paginator->sort('fax'); ?></th>
            <th><?php echo $this->Paginator->sort('zip'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($companyentries as $value): ?>
            <tr>
                <td><?php echo $value['Companyentry']['id']; ?></td>
                <td><?php echo $value['Companyentry']['companyname']; ?></td>
                <td><?php echo $value['Companyentry']['street']; ?></td>
                <td><?php echo $value['Companyentry']['phone']; ?></td>
                <td><?php echo $value['Companyentry']['fax']; ?></td>
                <td><?php echo $value['Companyentry']['zip']; ?></td>
                <td><?php echo $value['Companyentry']['status']; ?></td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Companyentry']['id'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Companyentry']['id']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Companyentry']['id']
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
                            <li><?php echo $this->Html->link(__d('cake', 'New Company Entries'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
