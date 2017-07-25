<?php if ($errors): ?>
	<div class="alert alert-danger">
		Identifiants incorrects
	</div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Connectez-vous</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <?= $form->input('username', 'Pseudo'); ?><br>
                            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
                            <br><button class="btn btn-lg btn-primary btn-block">Envoyer</button></br>
                            <a href="<?= $config->get('home'); ?>">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> Retour au site
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
