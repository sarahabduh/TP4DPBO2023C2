<?php
class FormView{
    public function renderAdd(){
        $form = null;
        $action = 'Add';
        $title = 'Member';

        $form .= '
        <div class="mb-3 mx-3">
            <label for="name" class="form-label"> NAME: </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3 mx-3">
            <label for="email" class="form-label"> EMAIL: </label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3 mx-3">
            <label for="phone" class="form-label"> PHONE: </label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3 mx-3">
            <label for="date" class="form-label"> JOIN DATE: </label>
            <input type="date" name="date" class="form-control">
        </div>

        <div class="row my-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-success" type="submit" name="add-submit">Submit</button>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a>
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
        $title = 'Member';

        $form .= '
        <div class="mb-3 mx-3">
            <label for="name" class="form-label"> NAME: </label>
            <input type="text" name="name" class="form-control" value="' . $data['name'] . '">
        </div>
        <div class="mb-3 mx-3">
            <label for="email" class="form-label"> EMAIL: </label>
            <input type="text" name="email" class="form-control" value=' . $data['email'] . '>
        </div>
        <div class="mb-3 mx-3">
            <label for="phone" class="form-label"> PHONE: </label>
            <input type="text" name="phone" class="form-control" value=' . $data['phone'] . '>
        </div>
        <div class="mb-3 mx-3">
            <label for="date" class="form-label"> JOIN DATE: </label>
            <input type="date" name="date" class="form-control" value=' . $data['date'] . '>
        </div>

        <div class="row my-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a>
            </div>
        </div>';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_ACTION", $action);
        $tpl->replace("TABLE_TITLE", $title);
        $tpl->write();
    }
}