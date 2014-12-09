<div class="events index">
    <h2>Events</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Event', array(
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
            <th><?php echo $this->Paginator->sort('EventName', __d('croogo', 'Name')); ?></th>
            <th><?php echo $this->Paginator->sort('EventDate', __d('croogo', 'Date')); ?></th>
            <th><?php echo $this->Paginator->sort('EventLocation', __d('croogo', 'Location')); ?></th>
            <th><?php echo $this->Paginator->sort('EventPostCode', __d('croogo', 'Post Code')); ?></th>
            <th><?php echo $this->Paginator->sort('EventCost', __d('croogo', 'Cost')); ?></th>
            <th><?php echo $this->Paginator->sort('EventStatus', __d('croogo', 'Status')); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($events as $value): ?>
            <tr>
                <td><?php echo $value['Event']['ID']; ?></td>
                <td><?php echo $value['Event']['EventName']; ?></td>
                <td><?php echo $value['Event']['EventDate']; ?></td>
                <td><?php echo $value['Event']['EventLocation']; ?></td>
                <td><?php echo $value['Event']['EventPostCode']; ?></td>
                <td><?php echo $value['Event']['EventCost']; ?></td>
                <td>
                    <?php if ($value['Event']['EventStatus'] == 1): ?>
                        <span class="label label-warning"><?php echo __d('croogo', 'Unpublished'); ?></span>
                    <?php endif ?>

                    <?php if ($value['Event']['EventStatus'] == 2): ?>
                        <span class="label label-info"><?php echo __d('croogo', 'Published'); ?></span>
                    <?php endif ?>  

                    <?php if ($value['Event']['EventStatus'] == 3): ?>
                        <span class="label label-success"><?php echo __d('croogo', 'Preview'); ?></span>
                    <?php endif ?>
                </td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Event']['ID'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Event']['ID']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Event']['ID']
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
                            <li><?php echo $this->Html->link(__d('cake', 'New Event'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
