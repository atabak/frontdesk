<h2 class="page-header">Editing <span class='text-muted'>Employee</span>&nbsp;
<span><?= Html::anchor('hr/employee', '<i class="fa fa-level-down fa-fw fa-rotate-180"></i> Back to List', array('class' => 'btn btn-default btn-xs')); ?></span>
</h2>
<br>

<?= render(basename(__DIR__) . '/_form'); ?>
