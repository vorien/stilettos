<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ability'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['controller' => 'Maneuvers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Maneuver'), ['controller' => 'Maneuvers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abilities index large-9 medium-8 columns content">
    <h3><?= __('Abilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('duration') ?></th>
                <th><?= $this->Paginator->sort('target') ?></th>
                <th><?= $this->Paginator->sort('has_range') ?></th>
                <th><?= $this->Paginator->sort('use_end') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abilities as $ability): ?>
            <tr>
                <td><?= $this->Number->format($ability->id) ?></td>
                <td><?= h($ability->name) ?></td>
                <td><?= h($ability->type) ?></td>
                <td><?= h($ability->duration) ?></td>
                <td><?= h($ability->target) ?></td>
                <td><?= h($ability->has_range) ?></td>
                <td><?= h($ability->use_end) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ability->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ability->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ability->id)]) ?>
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
