<form action="<?php echo base_url(); ?>reset-password" method="post">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group mb-3">
        <input type="password" name="password" placeholder="New Password" class="form-control">
    </div>
    <div class="form-group mb-3">
        <input type="password" name="password_confirm" placeholder="Confirm New Password" class="form-control">
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
</form>
