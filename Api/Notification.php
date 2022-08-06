<?php


class Notification {
    
    public function __construct()
    {
        include('function.php');
        $this->koneksi = $koneksi;
    }
    
    public function getNotification($username = null, $role) {
        $datas = [];
        $notifiedRole = $this->getNotifiedRole($role, 1);
        if ($username != null) {
            $query = "SELECT * FROM transaksi_sewa INNER JOIN sewa on transaksi_sewa.id_sewa = sewa.id_sewa WHERE $notifiedRole AND transaksi_sewa.username = '$username' ORDER BY transaksi_sewa.updatedAt DESC LIMIT 5";
        }else{
            $query = "SELECT * FROM transaksi_sewa INNER JOIN sewa on transaksi_sewa.id_sewa = sewa.id_sewa WHERE $notifiedRole ORDER BY transaksi_sewa.updatedAt DESC LIMIT 5";
        }

        $result = mysqli_query($this->koneksi, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }

    public function readNotification($notifications, $role)
    {
        foreach ($notifications as $key => $notification) {
            $notifiedRole = $this->getNotifiedRole($role, 0);
            $id_bayar = $notification['id_bayar'];

            $query = "UPDATE transaksi_sewa SET $notifiedRole, updatedAt = CURRENT_TIMESTAMP WHERE id_bayar = '$id_bayar'";
            mysqli_query($this->koneksi, $query);
        }
    }

    private function getNotifiedRole($role, $value) {
        if ($role == 'admin') {
            return 'transaksi_sewa.notifedAdmin = '.$value;
        }else if($role == 'review') {
            return 'transaksi_sewa.notifedReview = '.$value;
        }else if($role == 'user'){
            return 'transaksi_sewa.notifedUser = '.$value;
        }
        return;
    }

}