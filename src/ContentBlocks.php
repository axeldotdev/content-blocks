<?php

namespace Axeldotdev\ContentBlocks;

use Illuminate\Support\Collection;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentBlocks extends Field
{
    /** @var string */
    public $component = 'content-blocks';

    public Collection $blocks;

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|callable|null $attribute
     * @param callable|null $resolveCallback
     *
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->blocks = new Collection();
    }

    public function addButtonLabel(string $addButtonLabel): self
    {
        return $this->withMeta(compact('addButtonLabel'));
    }

    public function addBlock(string $block_class): self
    {
        $this->blocks->push(new $block_class($this->resource));

        return $this->withMeta([
            'blocks' => $this->blocks->toArray(),
        ]);
    }

    /**
     * @param NovaRequest $request
     * @param string $requestAttribute
     * @param object $model
     * @param string $attribute
     *
     * @return void
     */
    protected function fillAttributeFromRequest(
        NovaRequest $request,
        $requestAttribute,
        $model,
        $attribute,
    ) {
        if ($request->exists($requestAttribute)) {
            $model->{$attribute} = $this->formatBlocks($request[$requestAttribute]);
        }
    }

    protected function formatBlocks(string $json): string
    {
        $blocks = json_decode($json);
        $content = '';

        $blocks->each(function (Block $block) use ($content) {
            $content .= $block->view;
        });

        return $content;
    }
}
