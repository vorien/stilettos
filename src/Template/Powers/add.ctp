<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['controller' => 'Maneuvers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Maneuver'), ['controller' => 'Maneuvers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targets'), ['controller' => 'Targets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Target'), ['controller' => 'Targets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="powers form large-9 medium-8 columns content">
    <?= $this->Form->create($power) ?>
    <fieldset>
        <legend><?= __('Add Power') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('sort_order');
            echo $this->Form->input('lock_level');
            echo $this->Form->input('type');
            echo $this->Form->input('duration');
            echo $this->Form->input('target');
            echo $this->Form->input('has_range');
            echo $this->Form->input('use_end');
            echo $this->Form->input('maneuver_id', ['options' => $maneuvers, 'empty' => true]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
