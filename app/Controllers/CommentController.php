<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comments;

class CommentController extends BaseController
{
    public function index()
    {
        //
    }

    public function store($param)
    {
        $commentsModel = new Comments();

        if (!$this->validate([
            'comment'   => 'required'
        ])) {
            // session()->setFlashdata('err-add-forums', $this->validator->listErrors());
            return redirect()->to('/detail-forum/' . $param)->withInput();
        }

        $data = [
            'forum_id'      => $param,
            'user_id'       => session()->get('user_id'),
            'comment'       => $this->request->getVar('comment')
        ];

        $commentsModel->save($data);

        return redirect()->to('/detail-forum/' . $param);
    }

    public function delete($comment_id, $forum_id)
    {
        $commentsModel = new Comments();
        $commentsModel->delete($comment_id);
        return redirect()->to('/detail-forum/'.$forum_id);
    }
}
