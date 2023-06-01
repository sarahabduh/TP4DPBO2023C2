<?php
class FormView{
    public function renderAdd(){
        $form = null;
        $action = 'Add';
        $title = 'Hobby';

        $form .= '
        <div class="mb-3 mx-3">
            <label for="name" class="form-label"> NAME: </label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="row my-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-success" type="submit" name="add-submit">Submit</button>
                <a class="btn btn-info" type="submit" name="cancel" href="hobby.php">Cancel</a>
            </div>
        </div>';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_ACTION", $action);
        $tpl->replace("TABLE_TITLE", $title);
        $tpl->write();
    }

    public function renderEdit($data){
        $form = null;
        $action = 'Edit';
        $title = 'Hobby';

        $form .= '
        <div class="mb-3 mx-3">
            <label for="name" class="form-label"> NAME: </label>
            <input type="text" name="name" class="form-control" value="' . $data['name'] . '">
        </div>

        <div class="row my-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                <a class="btn btn-info" type="submit" name="cancel" href="hobby.php">Cancel</a>
            </div>
        </div>';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_ACTION", $action);
        $tpl->replace("TABLE_TITLE", $title);
        $tpl->write();
    }
}