<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    public function mark_read($id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $notifikasiModel = new NotifikasiModel();
        
        $notif = $notifikasiModel->find($id);
        if ($notif && $notif['id_user'] == session()->get('user_id')) {
            $notifikasiModel->update($id, ['is_read' => 1]);
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setJSON(['success' => false, 'message' => 'Not found or not your notification']);
    }

    public function mark_all_read()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $notifikasiModel = new NotifikasiModel();
        $notifikasiModel->where('id_user', session()->get('user_id'))
                        ->where('is_read', 0)
                        ->set(['is_read' => 1])
                        ->update();

        return $this->response->setJSON(['success' => true]);
    }

    public function check_new()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false]);
        }

        $notifikasiModel = new NotifikasiModel();
        $unread_count = $notifikasiModel->where('id_user', session()->get('user_id'))
                                        ->where('is_read', 0)
                                        ->countAllResults();

        return $this->response->setJSON([
            'success' => true,
            'unread_count' => $unread_count
        ]);
    }
}
