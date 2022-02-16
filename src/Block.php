<?php

namespace Axeldotdev\ContentBlocks;

use Illuminate\Contracts\View\View;
use Laravel\Nova\Resource;
use Illuminate\Support\Str;

abstract class Block
{
    public string $label;
    public string $slug;
    public Resource $resource;
    public string $template;
    public View $view;
    public array $viewData;

    public function __construct(Resource $resource)
    {
        $this->label = $this->label();
        $this->slug = $this->slug();
        $this->resource = $resource;
        $this->template = $this->template();
        $this->view = $this->view();
        $this->viewData = $this->viewData();
    }

    abstract public function label(): string;

    public function slug(): string
    {
        return Str::slug($this->label());
    }

    abstract public function template(): string;

    public function view(): View
    {
        return view($this->template(), $this->viewData());
    }

    public function viewData(): array
    {
        return [];
    }
}
