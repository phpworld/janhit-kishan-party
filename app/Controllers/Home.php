<?php

namespace App\Controllers;

use App\Models\CmsPageModel;
use App\Models\FootprintSettingModel;
use App\Models\HomeSliderModel;
use App\Models\InspirationSlideModel;
use App\Models\NavigationItemModel;
use App\Models\PartyPresidentModel;
use App\Models\PressGalleryItemModel;

class Home extends BaseController
{
    public function index(): string
    {
        $navigation = (new NavigationItemModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $sliders = (new HomeSliderModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $presidents = (new PartyPresidentModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $inspirations = (new InspirationSlideModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $pressGallery = (new PressGalleryItemModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $footprint = (new FootprintSettingModel())->first();

        return view('frontend/home', [
            'navigation' => $navigation,
            'sliders' => $sliders,
            'presidents' => $presidents,
            'inspirations' => $inspirations,
            'pressGallery' => $pressGallery,
            'footprint' => $footprint,
        ]);
    }

    public function page(string $slug): string
    {
        $page = (new CmsPageModel())
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (! $page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $navigation = (new NavigationItemModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('frontend/page', [
            'page'       => $page,
            'navigation' => $navigation,
        ]);
    }
}
