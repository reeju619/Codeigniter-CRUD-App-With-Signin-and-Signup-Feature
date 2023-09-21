<form action="<?php echo base_url(); ?>/ResetPasswordController/resetPassword" method="post">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group mb-3">
        <input type="password" name="password" placeholder="New Password" class="form-control">
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-success">Reset Password</button>
    </div>
</form>