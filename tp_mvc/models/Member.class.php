<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }

    function getMemberById($id){
        $query = "SELECT * FROM member WHERE id_member='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $date = $data['date'];

        $query = "insert into member values ('', '$name', '$email', '$phone', '$date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM member WHERE id_member = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $date = $data['date'];
        $query = "update member set name = '$name', email = '$email', phone = '$phone', join_date = '$date' where id_member = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
