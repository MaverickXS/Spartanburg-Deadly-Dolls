<form method="post" action="/login/" class="form-horizontal">
    <fieldset>
        <legend>Login</legend>
        
        <?php if (isset($login_error)){
            if (trim($login_error)!=''){ ?>
                <div class="alert alert-block alert-error">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Login Failed!</h4>
                    <?=$login_error;?>
                </div>
            <? }
        } ?>

        <div class="control-group<? if (form_error('email') != ''){ ?> error<? } ?>">
            <label class="control-label" for="username">Username: </label>
            <div class="controls"><?=draw_prepend_icon('user', '<input type="text" name="username" id="username" maxlength="100" placeholder="Skater" value="' . set_value('username') . '" class="input" autofocus required />') . form_error('username');?></div>
        </div>
        <div class="control-group<? if (form_error('password') != ''){ ?> error<? } ?>">
            <label class="control-label" for="password">Password: </label>
            <div class="controls"><?=draw_prepend_icon('lock', '<input type="password" name="password" id="password" maxlength="50" class="input" required />') . form_error('password');?></div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn"><i class="icon-off"></i> Login</button>
        </div>
    </fieldset>
</form>