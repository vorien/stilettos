<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Abilities Display'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abilitiesDisplays index large-9 medium-8 columns content">
    <h3><?= __('Abilities Displays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ability_id') ?></th>
                <th><?= $this->Paginator->sort('display_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abilitiesDisplays as $abilitiesDisplay): ?>
            <tr>
                <td><?= $this->Number->format($abilitiesDisplay->id) ?></td>
                <td><?= $abilitiesDisplay->has('ability') ? $this->Html->link($abilitiesDisplay->ability->name, ['controller' => 'Abilities', 'action' => 'view', $abilitiesDisplay->ability->id]) : '' ?></td>
                <td><?= $abilitiesDisplay->has('display') ? $this->Html->link($abilitiesDisplay->display->name, ['controller' => 'Displays', 'action' => 'view', $abilitiesDisplay->display->id]) : '' ?></td>
                <td><?= h($abilitiesDisplay->created) ?></td>
                <td><?= h($abilitiesDisplay->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $abilitiesDisplay->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $abilitiesDisplay->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $abilitiesDisplay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abilitiesDisplay->id)]) ?>
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
