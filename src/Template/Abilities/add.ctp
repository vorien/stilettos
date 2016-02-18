<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Abilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['controller' => 'Maneuvers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Maneuver'), ['controller' => 'Maneuvers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abilities form large-9 medium-8 columns content">
    <?= $this->Form->create($ability) ?>
    <fieldset>
        <legend><?= __('Add Ability') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('duration');
            echo $this->Form->input('target');
            echo $this->Form->input('has_range');
            echo $this->Form->input('use_end');
            echo $this->Form->input('maneuver_id', ['options' => $maneuvers, 'empty' => true]);
            echo $this->Form->input('power_id', ['options' => $powers, 'empty' => true]);
            echo $this->Form->input('displays._ids', ['options' => $displays]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
