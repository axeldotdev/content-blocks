<?php

namespace Axeldotdev\ContentBlocks;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Laravel\Nova\Resource;

abstract class Block
{
    public function __construct(
        public Resource $resource,
    ) {
    }

    abstract public function label(): string;

    public function view(): View
    {
        return view($this->template(), $this->viewData());
    }

    public function slug(): string
    {
        return Str::slug($this->label());
    }

    abstract public function template(): string;

    public function viewData(): array
    {
        return [];
    }
}
