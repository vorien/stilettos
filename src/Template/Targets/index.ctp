<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Target'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="targets index large-9 medium-8 columns content">
    <h3><?= __('Targets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('sort_order') ?></th>
                <th><?= $this->Paginator->sort('power_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($targets as $target): ?>
            <tr>
                <td><?= $this->Number->format($target->id) ?></td>
                <td><?= h($target->name) ?></td>
                <td><?= $this->Number->format($target->sort_order) ?></td>
                <td><?= $target->has('power') ? $this->Html->link($target->power->name, ['controller' => 'Powers', 'action' => 'view', $target->power->id]) : '' ?></td>
                <td><?= h($target->created) ?></td>
                <td><?= h($target->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $target->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $target->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $target->id], ['confirm' => __('Are you sure you want to delete # {0}?', $target->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
