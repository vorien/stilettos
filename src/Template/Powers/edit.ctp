<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $power->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $power->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Powers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="powers form large-9 medium-8 columns content">
    <?= $this->Form->create($power) ?>
    <fieldset>
        <legend><?= __('Edit Power') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('locklevel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
