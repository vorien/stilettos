<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Maneuver'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="maneuvers index large-9 medium-8 columns content">
    <h3><?= __('Maneuvers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('locklevel') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($maneuvers as $maneuver): ?>
            <tr>
                <td><?= $this->Number->format($maneuver->id) ?></td>
                <td><?= h($maneuver->name) ?></td>
                <td><?= $this->Number->format($maneuver->locklevel) ?></td>
                <td><?= h($maneuver->created) ?></td>
                <td><?= h($maneuver->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $maneuver->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $maneuver->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $maneuver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maneuver->id)]) ?>
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
