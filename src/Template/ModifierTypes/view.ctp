<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modifier Type'), ['action' => 'edit', $modifierType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modifier Type'), ['action' => 'delete', $modifierType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifierType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modifier Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modifierTypes view large-9 medium-8 columns content">
    <h3><?= h($modifierType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($modifierType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($modifierType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($modifierType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($modifierType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Modifiers') ?></h4>
        <?php if (!empty($modifierType->modifiers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Locklevel') ?></th>
                <th><?= __('Required') ?></th>
                <th><?= __('Display Id') ?></th>
                <th><?= __('Modifier Class Id') ?></th>
                <th><?= __('Modifier Type Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modifierType->modifiers as $modifiers): ?>
            <tr>
                <td><?= h($modifiers->id) ?></td>
                <td><?= h($modifiers->name) ?></td>
                <td><?= h($modifiers->locklevel) ?></td>
                <td><?= h($modifiers->required) ?></td>
                <td><?= h($modifiers->display_id) ?></td>
                <td><?= h($modifiers->modifier_class_id) ?></td>
                <td><?= h($modifiers->modifier_type_id) ?></td>
                <td><?= h($modifiers->created) ?></td>
                <td><?= h($modifiers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Modifiers', 'action' => 'view', $modifiers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Modifiers', 'action' => 'edit', $modifiers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modifiers', 'action' => 'delete', $modifiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifiers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
