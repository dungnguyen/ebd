<div class="adtrackers index">
    <h2>Adtrackers</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Adtracker', array(
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
            <th><?php echo $this->Paginator->sort('AdvertID', __d('croogo', 'Advert')); ?></th>
            <th><?php echo $this->Paginator->sort('DateTimeChecked', __d('croogo', 'DateTime Checked')); ?></th>
            <th><?php echo $this->Paginator->sort('IPaddresschecked', __d('croogo', 'IP Address Checked')); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($adtrackers as $value): ?>
            <tr>
                <td><?php echo $value['Adtracker']['ID']; ?></td>
                <td><?php echo $value['Advertisement']['AdvertismentText']; ?></td>
                <td><?php echo $value['Adtracker']['DateTimeChecked']; ?></td>
                <td><?php echo $value['Adtracker']['IPaddresschecked']; ?></td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Adtracker']['ID'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Adtracker']['ID']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Adtracker']['ID']
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
                            <li><?php echo $this->Html->link(__d('cake', 'New Adtrackers'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
