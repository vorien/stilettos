<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modifier Value'), ['action' => 'edit', $modifierValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modifier Value'), ['action' => 'delete', $modifierValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modifierValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modifier Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modifierValues view large-9 medium-8 columns content">
    <h3><?= h($modifierValue->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($modifierValue->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Modifier') ?></th>
            <td><?= $modifierValue->has('modifier') ? $this->Html->link($modifierValue->modifier->name, ['controller' => 'Modifiers', 'action' => 'view', $modifierValue->modifier->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($modifierValue->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Locklevel') ?></th>
            <td><?= $this->Number->format($modifierValue->locklevel) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($modifierValue->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($modifierValue->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($modifierValue->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Required') ?></th>
            <td><?= $modifierValue->required ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
