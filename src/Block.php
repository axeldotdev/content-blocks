<?php

namespace Axeldotdev\ContentBlocks;

use Illuminate\Support\Str;

class Block
{
    public string $id;
    public string $label;
    public string $template;
    public mixed $value;

    public function __construct(string $label, ?string $id = null)
    {
        $this->label = $label;
        $this->id = $id ?? Str::of($label)->slug();
    }

    public static function make(string $label, ?string $id = null): self
    {
        return new static($label, $id);
    }

    public function fields(array $fields): self
    {
        // TODO: format fields

        return $this;
    }

    public function template(string $template): self
    {
        $this->template = $template;

        return $this;
    }
}
