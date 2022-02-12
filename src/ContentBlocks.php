<?php

namespace Axeldotdev\ContentBlocks;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentBlocks extends Field
{
    /** @var string */
    public $component = 'content-blocks';

    public function addButtonLabel(string $addButtonLabel): self
    {
        return $this->withMeta(compact('addButtonLabel'));
    }

    public function blocks(array $blocks): self
    {
        return $this->withMeta(compact('blocks'));
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

        $blocks->each(function (Block $block) {
            //adoiuhbfc
        });

        $content .= 'yolo'; // TODO: format blocks

        return $content;
    }
}
