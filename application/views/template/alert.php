
<div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
    <?= $messege ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<script>
    setTimeout(function () {
        go('<?= $url ?>');
    }, 2000);
    $('.alert').alert();
</script>
