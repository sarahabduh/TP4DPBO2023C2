<?php
  class HobbyView{
    public function render($data){
      $no = 1;
      $dataHobby = null;
      $addButton = null;
      
      $addButton = '<button class="btn btn-primary" type="submit" name="add">Add New</button>';

      foreach($data as $val){
        list($id, $name) = $val;
        $dataHobby .= "<tr>
            <td>" . $no++ . "</td>
            <td>" . $name . "</td>
            <td>
            <a href='hobby.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
            <a href='hobby.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
            </td>
            </tr>";
      }

      $tpl = new Template("templates/hobby.html");
      $tpl->replace("DATA_TABEL", $dataHobby);
      $tpl->replace("ADD_BUTTON", $addButton);
      $tpl->write();
    }
  }