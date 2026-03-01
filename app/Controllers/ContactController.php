<?php

namespace App\Controllers;

use App\Models\ContactSubmissionModel;
use App\Models\NavigationItemModel;
use App\Models\SiteSettingModel;

class ContactController extends BaseController
{
    public function index()
    {
        $s    = (new SiteSettingModel())->getAll();
        $nav  = (new NavigationItemModel())->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll();

        return view('frontend/contact', [
            's'   => $s,
            'nav' => $nav,
        ]);
    }

    public function submit()
    {
        $rules = [
            'name'    => 'required|max_length[200]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/contact')->with('error', implode(' ', $this->validator->getErrors()))
                             ->withInput();
        }

        $model = new ContactSubmissionModel();
        $model->insert([
            'name'       => (string) $this->request->getPost('name'),
            'email'      => (string) $this->request->getPost('email'),
            'phone'      => (string) $this->request->getPost('phone'),
            'subject'    => (string) $this->request->getPost('subject'),
            'message'    => (string) $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/contact')->with('contact_success', '1');
    }
}
