<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Abilities Display'), ['action' => 'edit', $abilitiesDisplay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Abilities Display'), ['action' => 'delete', $abilitiesDisplay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abilitiesDisplay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Abilities Displays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abilities Display'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="abilitiesDisplays view large-9 medium-8 columns content">
    <h3><?= h($abilitiesDisplay->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ability') ?></th>
            <td><?= $abilitiesDisplay->has('ability') ? $this->Html->link($abilitiesDisplay->ability->name, ['controller' => 'Abilities', 'action' => 'view', $abilitiesDisplay->ability->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Display') ?></th>
            <td><?= $abilitiesDisplay->has('display') ? $this->Html->link($abilitiesDisplay->display->name, ['controller' => 'Displays', 'action' => 'view', $abilitiesDisplay->display->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($abilitiesDisplay->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($abilitiesDisplay->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($abilitiesDisplay->modified) ?></td>
        </tr>
    </table>
</div>
