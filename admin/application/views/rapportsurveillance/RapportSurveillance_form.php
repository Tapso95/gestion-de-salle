<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">RapportSurveillance <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdSurveillant <?php echo form_error('idSurveillant') ?></label>
            <input type="text" class="form-control" name="idSurveillant" id="idSurveillant" placeholder="IdSurveillant" value="<?php echo $idSurveillant; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdCours <?php echo form_error('idCours') ?></label>
            <input type="text" class="form-control" name="idCours" id="idCours" placeholder="IdCours" value="<?php echo $idCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateRapportSurveillance <?php echo form_error('dateRapportSurveillance') ?></label>
            <input type="text" class="form-control" name="dateRapportSurveillance" id="dateRapportSurveillance" placeholder="DateRapportSurveillance" value="<?php echo $dateRapportSurveillance; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CommentaireRapportSurveillance <?php echo form_error('commentaireRapportSurveillance') ?></label>
            <input type="text" class="form-control" name="commentaireRapportSurveillance" id="commentaireRapportSurveillance" placeholder="CommentaireRapportSurveillance" value="<?php echo $commentaireRapportSurveillance; ?>" />
        </div>
	    <input type="hidden" name="idRapportSurveillance" value="<?php echo $idRapportSurveillance; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rapportsurveillance') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>