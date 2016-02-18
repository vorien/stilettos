<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $abilitiesDisplay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $abilitiesDisplay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Abilities Displays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Abilities'), ['controller' => 'Abilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ability'), ['controller' => 'Abilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abilitiesDisplays form large-9 medium-8 columns content">
    <?= $this->Form->create($abilitiesDisplay) ?>
    <fieldset>
        <legend><?= __('Edit Abilities Display') ?></legend>
        <?php
            echo $this->Form->input('ability_id', ['options' => $abilities, 'empty' => true]);
            echo $this->Form->input('display_id', ['options' => $displays, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
