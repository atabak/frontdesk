<h2 class="page-header">New <span class='text-muted'>Bank Account</span>&nbsp;
<span><?= Html::anchor('banking/bank-accounts', '<i class="fa fa-level-down fa-fw fa-rotate-180"></i> Back to List', array('class' => 'btn btn-xs btn-info')); ?></span>
</h2>
<br>

<?= render('bank/account/_form'); ?>
