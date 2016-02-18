<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modifier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Classes'), ['controller' => 'ModifierClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Class'), ['controller' => 'ModifierClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Types'), ['controller' => 'ModifierTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Type'), ['controller' => 'ModifierTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modifier Values'), ['controller' => 'ModifierValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modifier Value'), ['controller' => 'ModifierValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modifiers index large-9 medium-8 columns content">
    <h3><?= __('Modifiers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('locklevel') ?></th>
                <th><?= $this->Paginator->sort('required') ?></th>
                <th><?= $this->Paginator->sort('display_id') ?></th>
                <th><?= $this->Paginator->sort('modifier_class_id') ?></th>
                <th><?= $this->Paginator->sort('modifier_type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modifiers as $modifier): ?>
            <tr>
                <td><?= $this->Number->format($modifier->id) ?></td>
                <td><?= h($modifier->name) ?></td>
                <td><?= $this->Number->format($modifier->locklevel) ?></td>
                <td><?= h($modifier->required) ?></td>
                <td><?= $modifier->has('display') ? $this->Html->link($modifier->display->name, ['controller' => 'Displays', 'action' => 'view', $modifier->display->id]) : '' ?></td>
                <td><?= $modifier->has('modifier_class') ? $this->Html->link($modifier->modifier_class->name, ['controller' => 'ModifierClasses', 'action' => 'view', $modifier->modifier_class->id]) : '' ?></td>
                <td><?= $modifier->has('modifier_type') ? $this->Html->link($modifier->modifier_type->name, ['controller' => 'ModifierTypes', 'action' => 'view', $modifier->modifier_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modifier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modifier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modifier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifier->id)]) ?>
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
