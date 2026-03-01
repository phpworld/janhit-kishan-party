<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CmsPageModel;
use App\Models\ContactSubmissionModel;
use App\Models\FootprintSettingModel;
use App\Models\MapLocationModel;
use App\Models\HomeSliderModel;
use App\Models\InspirationSlideModel;
use App\Models\NavigationItemModel;
use App\Models\PartyPresidentModel;
use App\Models\PressGalleryItemModel;

class CmsController extends BaseController
{
    private array $sectionMap = [
        'navigation' => [
            'title' => 'Main Menu Navigation',
            'model' => NavigationItemModel::class,
            'fields' => [
                ['name' => 'label', 'label' => 'Label', 'type' => 'text', 'required' => true],
                ['name' => 'url', 'label' => 'URL', 'type' => 'text', 'required' => true],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'required' => true],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ],
        'home-sliders' => [
            'title' => 'Home Page Slider',
            'model' => HomeSliderModel::class,
            'fields' => [
                ['name' => 'headline', 'label' => 'Headline', 'type' => 'text', 'required' => true],
                ['name' => 'subheadline', 'label' => 'Subheadline', 'type' => 'text'],
                ['name' => 'image', 'label' => 'Image Path', 'type' => 'text'],
                ['name' => 'layout', 'label' => 'Layout', 'type' => 'select', 'options' => ['left' => 'Image Left', 'right' => 'Image Right']],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'required' => true],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ],
        'presidents' => [
            'title' => 'Party Presidents Carousel',
            'model' => PartyPresidentModel::class,
            'fields' => [
                ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'required' => true],
                ['name' => 'tenure', 'label' => 'Tenure', 'type' => 'text', 'required' => true],
                ['name' => 'image', 'label' => 'Image Path', 'type' => 'text'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'required' => true],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ],
        'inspirations' => [
            'title' => 'Our Inspiration Slider',
            'model' => InspirationSlideModel::class,
            'fields' => [
                ['name' => 'title', 'label' => 'Section Title', 'type' => 'text', 'required' => true],
                ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Description', 'type' => 'text'],
                ['name' => 'image', 'label' => 'Image Path', 'type' => 'text'],
                ['name' => 'button_text', 'label' => 'Button Text', 'type' => 'text'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'required' => true],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ],
        'press-gallery' => [
            'title' => 'Premium Press Gallery',
            'model' => PressGalleryItemModel::class,
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text'],
                ['name' => 'image', 'label' => 'Image Path', 'type' => 'text'],
                ['name' => 'box_type', 'label' => 'Box Type', 'type' => 'select', 'options' => ['large' => 'Large', 'tall' => 'Tall', 'wide' => 'Wide', 'medium' => 'Medium']],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'required' => true],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ],
    ];

    public function index()
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        return view('admin/dashboard', [
            'stats' => [
                'sliders'     => (new HomeSliderModel())->countAll(),
                'presidents'  => (new PartyPresidentModel())->countAll(),
                'inspirations'=> (new InspirationSlideModel())->countAll(),
                'gallery'     => (new PressGalleryItemModel())->countAll(),
                'navigation'  => (new NavigationItemModel())->countAll(),
                'markers'     => (new MapLocationModel())->countAll(),
                'pages'       => (new CmsPageModel())->countAll(),
                'inbox'       => (new ContactSubmissionModel())->where('is_read', 0)->countAllResults(),
            ],
        ]);
    }

    public function section(string $key)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        if (! isset($this->sectionMap[$key])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $config = $this->sectionMap[$key];
        $model = new $config['model']();
        $items = $model->orderBy('sort_order', 'ASC')->findAll();

        $editId = (int) ($this->request->getGet('edit') ?? 0);
        $editItem = $editId > 0 ? $model->find($editId) : null;

        return view('admin/cms_section', [
            'sectionKey' => $key,
            'title' => $config['title'],
            'fields' => $config['fields'],
            'items' => $items,
            'editItem' => $editItem,
        ]);
    }

    public function saveSection(string $key, ?int $id = null)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        if (! isset($this->sectionMap[$key])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $config = $this->sectionMap[$key];
        $model = new $config['model']();

        $data = [];
        foreach ($config['fields'] as $field) {
            $name = $field['name'];
            if ($name === 'is_active') {
                $data[$name] = $this->request->getPost('is_active') ? 1 : 0;
                continue;
            }

            if ($name === 'image') {
                $data[$name] = (string) $this->request->getPost('image');
                continue;
            }

            $data[$name] = $this->request->getPost($name);
        }

        $uploadedPath = $this->handleImageUpload('image_file');
        if ($uploadedPath !== null) {
            $data['image'] = $uploadedPath;
        } elseif ($id && empty($data['image'])) {
            $existing = $model->find($id);
            $data['image'] = $existing['image'] ?? null;
        }

        if ($id) {
            $model->update($id, $data);
            return redirect()->to('/admin/cms/' . $key)->with('success', 'Record updated.');
        }

        $model->insert($data);
        return redirect()->to('/admin/cms/' . $key)->with('success', 'Record added.');
    }

    public function deleteSection(string $key, int $id)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        if (! isset($this->sectionMap[$key])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $config = $this->sectionMap[$key];
        $model = new $config['model']();
        $model->delete($id);

        return redirect()->to('/admin/cms/' . $key)->with('success', 'Record deleted.');
    }

    public function footprints()
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        $model = new FootprintSettingModel();
        $item = $model->first();

        return view('admin/footprints', ['item' => $item]);
    }

    public function saveFootprints()
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        $model = new FootprintSettingModel();
        $item = $model->first();

        $data = [
            'title' => (string) $this->request->getPost('title'),
            'subtitle' => (string) $this->request->getPost('subtitle'),
            'states_governed' => (int) $this->request->getPost('states_governed'),
            'lok_sabha' => (string) $this->request->getPost('lok_sabha'),
            'rajya_sabha' => (string) $this->request->getPost('rajya_sabha'),
        ];

        if ($item) {
            $model->update($item['id'], $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to('/admin/cms/footprints')->with('success', 'Footprints updated.');
    }

    public function mapLocations()
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        $model     = new MapLocationModel();
        $locations = $model->orderBy('id', 'ASC')->findAll();
        $editId    = (int) ($this->request->getGet('edit') ?? 0);
        $editItem  = $editId > 0 ? $model->find($editId) : null;

        return view('admin/map_markers', [
            'locations' => $locations,
            'editItem'  => $editItem,
        ]);
    }

    public function saveMapLocation(?int $id = null)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        $model = new MapLocationModel();
        $data  = [
            'name'      => (string) $this->request->getPost('name'),
            'state'     => (string) $this->request->getPost('state'),
            'lat'       => (float)  $this->request->getPost('lat'),
            'lng'       => (float)  $this->request->getPost('lng'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];

        if ($id) {
            $model->update($id, $data);
            return redirect()->to('/admin/map-markers')->with('success', 'Marker updated.');
        }

        $model->insert($data);
        return redirect()->to('/admin/map-markers')->with('success', 'Marker added.');
    }

    public function deleteMapLocation(int $id)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }

        (new MapLocationModel())->delete($id);
        return redirect()->to('/admin/map-markers')->with('success', 'Marker deleted.');
    }

    // ─── CMS PAGES ──────────────────────────────────────────────────────────────

    public function pages()
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }
        $pages = (new CmsPageModel())->orderBy('updated_at', 'DESC')->findAll();
        return view('admin/pages', ['pages' => $pages]);
    }

    public function pageEdit(?int $id = null)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }
        $model = new CmsPageModel();
        $page  = $id ? $model->find($id) : null;
        if ($id && !$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }
        return view('admin/pages_edit', ['page' => $page]);
    }

    public function pageSave(?int $id = null)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }
        $model = new CmsPageModel();
        $featuredImage = null;
        $uploadedPath  = $this->handleImageUpload('featured_image_file');
        if ($uploadedPath !== null) {
            $featuredImage = $uploadedPath;
        } elseif ($id) {
            $existing      = $model->find($id);
            $featuredImage = $this->request->getPost('featured_image') ?: ($existing['featured_image'] ?? null);
        } else {
            $featuredImage = $this->request->getPost('featured_image') ?: null;
        }
        $data = [
            'title'            => (string) $this->request->getPost('title'),
            'slug'             => (string) $this->request->getPost('slug'),
            'content'          => (string) $this->request->getPost('content'),
            'featured_image'   => $featuredImage,
            'meta_title'       => (string) $this->request->getPost('meta_title'),
            'meta_keywords'    => (string) $this->request->getPost('meta_keywords'),
            'meta_description' => (string) $this->request->getPost('meta_description'),
            'status'           => $this->request->getPost('status') === 'published' ? 'published' : 'draft',
        ];
        if ($id) {
            $model->update($id, $data);
            return redirect()->to('/admin/pages')->with('success', 'Page updated successfully.');
        }
        $model->insert($data);
        return redirect()->to('/admin/pages')->with('success', 'Page created successfully.');
    }

    public function pageDelete(int $id)
    {
        if ($redirect = $this->ensureAuth()) {
            return $redirect;
        }
        (new CmsPageModel())->delete($id);
        return redirect()->to('/admin/pages')->with('success', 'Page deleted.');
    }

    private function ensureAuth()
    {
        if (! session('isAdmin')) {
            return redirect()->to('/admin/login');
        }

        return null;
    }

    private function handleImageUpload(string $fieldName): ?string
    {
        $file = $this->request->getFile($fieldName);

        if (! $file || ! $file->isValid() || $file->hasMoved()) {
            return null;
        }

        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $newName);

        return 'uploads/' . $newName;
    }
}
