<?php

namespace Axeldotdev\ContentBlocks;

use Illuminate\Contracts\View\View;
use Laravel\Nova\Resource;
use Illuminate\Support\Str;

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
