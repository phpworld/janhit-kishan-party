<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteSettingModel;
use App\Models\ContactSubmissionModel;
use App\Models\AdminUserModel;

class SettingsController extends BaseController
{
    private function ensureAuth()
    {
        if (! session('isAdmin')) {
            return redirect()->to('/admin/login');
        }
        return null;
    }

    // ── GET settings helper ──────────────────────────────────────
    private function settings(): array
    {
        return (new SiteSettingModel())->getAll();
    }

    // ── Global Settings ─────────────────────────────────────────
    public function global()
    {
        if ($r = $this->ensureAuth()) return $r;
        return view('admin/settings/global', ['s' => $this->settings()]);
    }

    public function saveGlobal()
    {
        if ($r = $this->ensureAuth()) return $r;
        $m = new SiteSettingModel();
        $m->saveGroup('general', [
            'site_name'         => (string) $this->request->getPost('site_name'),
            'site_tagline'      => (string) $this->request->getPost('site_tagline'),
            'site_meta_desc'    => (string) $this->request->getPost('site_meta_desc'),
            'ticker_text'       => (string) $this->request->getPost('ticker_text'),
            'left_sidebar_html' => (string) $this->request->getPost('left_sidebar_html'),
            'right_sidebar_html'=> (string) $this->request->getPost('right_sidebar_html'),
        ]);
        return redirect()->to('/admin/settings/global')->with('success', 'Global settings saved.');
    }

    // ── Contact Information ──────────────────────────────────────
    public function contact()
    {
        if ($r = $this->ensureAuth()) return $r;
        return view('admin/settings/contact', ['s' => $this->settings()]);
    }

    public function saveContact()
    {
        if ($r = $this->ensureAuth()) return $r;
        $m = new SiteSettingModel();
        $m->saveGroup('contact', [
            'address_line1'   => (string) $this->request->getPost('address_line1'),
            'address_line2'   => (string) $this->request->getPost('address_line2'),
            'phone1'          => (string) $this->request->getPost('phone1'),
            'phone2'          => (string) $this->request->getPost('phone2'),
            'email1'          => (string) $this->request->getPost('email1'),
            'email2'          => (string) $this->request->getPost('email2'),
            'whatsapp_number' => (string) $this->request->getPost('whatsapp_number'),
            'whatsapp_label'  => (string) $this->request->getPost('whatsapp_label'),
            'working_hours'   => (string) $this->request->getPost('working_hours'),
            'map_embed_url'   => (string) $this->request->getPost('map_embed_url'),
        ]);
        return redirect()->to('/admin/settings/contact')->with('success', 'Contact information saved.');
    }

    // ── Social Media ─────────────────────────────────────────────
    public function social()
    {
        if ($r = $this->ensureAuth()) return $r;
        return view('admin/settings/social', ['s' => $this->settings()]);
    }

    public function saveSocial()
    {
        if ($r = $this->ensureAuth()) return $r;
        $m = new SiteSettingModel();
        $m->saveGroup('social', [
            'facebook_url'      => (string) $this->request->getPost('facebook_url'),
            'facebook_handle'   => (string) $this->request->getPost('facebook_handle'),
            'twitter_url'       => (string) $this->request->getPost('twitter_url'),
            'twitter_handle'    => (string) $this->request->getPost('twitter_handle'),
            'instagram_url'     => (string) $this->request->getPost('instagram_url'),
            'instagram_handle'  => (string) $this->request->getPost('instagram_handle'),
            'youtube_url'       => (string) $this->request->getPost('youtube_url'),
            'youtube_handle'    => (string) $this->request->getPost('youtube_handle'),
            'whatsapp_group_url'=> (string) $this->request->getPost('whatsapp_group_url'),
            'share_facebook'    => $this->request->getPost('share_facebook') ? '1' : '0',
            'share_twitter'     => $this->request->getPost('share_twitter')  ? '1' : '0',
            'share_whatsapp'    => $this->request->getPost('share_whatsapp') ? '1' : '0',
        ]);
        return redirect()->to('/admin/settings/social')->with('success', 'Social media settings saved.');
    }

    // ── Password Change ──────────────────────────────────────────
    public function password()
    {
        if ($r = $this->ensureAuth()) return $r;
        return view('admin/settings/password');
    }

    public function savePassword()
    {
        if ($r = $this->ensureAuth()) return $r;

        $current  = (string) $this->request->getPost('current_password');
        $new      = (string) $this->request->getPost('new_password');
        $confirm  = (string) $this->request->getPost('confirm_password');

        $adminModel = new AdminUserModel();
        $admin      = $adminModel->where('email', session('adminEmail'))->first();

        if (! $admin || ! password_verify($current, $admin['password'])) {
            return redirect()->to('/admin/settings/password')->with('error', 'Current password is incorrect.');
        }
        if (strlen($new) < 6) {
            return redirect()->to('/admin/settings/password')->with('error', 'New password must be at least 6 characters.');
        }
        if ($new !== $confirm) {
            return redirect()->to('/admin/settings/password')->with('error', 'Passwords do not match.');
        }

        $adminModel->update($admin['id'], ['password_hash' => password_hash($new, PASSWORD_DEFAULT)]);
        return redirect()->to('/admin/settings/password')->with('success', 'Password changed successfully.');
    }

    // ── Contact Form Submissions ─────────────────────────────────
    public function submissions()
    {
        if ($r = $this->ensureAuth()) return $r;
        $model = new ContactSubmissionModel();
        $items = $model->orderBy('id', 'DESC')->findAll();
        // mark all as read
        $model->where('is_read', 0)->set(['is_read' => 1])->update();
        return view('admin/settings/submissions', ['items' => $items]);
    }

    public function deleteSubmission(int $id)
    {
        if ($r = $this->ensureAuth()) return $r;
        (new ContactSubmissionModel())->delete($id);
        return redirect()->to('/admin/settings/submissions')->with('success', 'Message deleted.');
    }
}
