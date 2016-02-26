<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $maneuver->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $maneuver->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Maneuvers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['controller' => 'Powers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Power'), ['controller' => 'Powers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="maneuvers form large-9 medium-8 columns content">
    <?= $this->Form->create($maneuver) ?>
    <fieldset>
        <legend><?= __('Edit Maneuver') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('sort_order');
            echo $this->Form->input('lock_level');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
