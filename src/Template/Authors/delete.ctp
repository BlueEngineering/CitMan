<!-- header -->
<div class="row">
    <div class="page-header">
        <h1>Sicherheitsabfrage</h1>
    </div>
</div>
<!-- /header -->

<!-- body -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p>
            Sind Sie sicher, dass der Datensatz des Autors/der Autorin <strong><?= $author->name ?></strong> gelöscht werden soll?
        </p>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
        <form method="post">
            <input type="hidden" name="authorid" value="<?= $author->id ?>" />
            <button type="submit" name="btnAck" value="ack" class="btn btn-danger">Bestätigen</button>
            <button type="submit" name="btnCancel" value="cancel" class="btn btn-primary">Abbrechen</button>
        </form>
    </div>
</div>
<!-- /body -->