<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modifier Value'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modifierValues index large-9 medium-8 columns content">
    <h3><?= __('Modifier Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('lock_level') ?></th>
                <th><?= $this->Paginator->sort('value') ?></th>
                <th><?= $this->Paginator->sort('modifier_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modifierValues as $modifierValue): ?>
            <tr>
                <td><?= $this->Number->format($modifierValue->id) ?></td>
                <td><?= h($modifierValue->name) ?></td>
                <td><?= $this->Number->format($modifierValue->lock_level) ?></td>
                <td><?= h($modifierValue->value) ?></td>
                <td><?= $modifierValue->has('modifier') ? $this->Html->link($modifierValue->modifier->name, ['controller' => 'Modifiers', 'action' => 'view', $modifierValue->modifier->id]) : '' ?></td>
                <td><?= h($modifierValue->created) ?></td>
                <td><?= h($modifierValue->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modifierValue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modifierValue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modifierValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifierValue->id)]) ?>
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
