<?php
  class MemberView{
    public function render($data){
      $no = 1;
      $dataMember = null;
      $addButton = null;
      
      $addButton = '<button class="btn btn-primary" type="submit" name="add">Add New</button>';

      foreach($data as $val){
        list($id, $name, $email, $phone, $date) = $val;
        $dataMember .= "<tr>
            <td>" . $no++ . "</td>
            <td>" . $name . "</td>
            <td>" . $email . "</td>
            <td>" . $phone . "</td>
            <td>" . $date . "</td>
            <td>
            <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
            <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
            </td>
            </tr>";
      }

      $tpl = new Template("templates/member.html");
      $tpl->replace("DATA_TABEL", $dataMember);
      $tpl->replace("ADD_BUTTON", $addButton);
      $tpl->write();
    }
  }