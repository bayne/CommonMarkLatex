<?php

namespace Bayne\CommonMarkLatex;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\ListBlock;
use League\CommonMark\Block\Element\ListItem;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Element\Emphasis;
use League\CommonMark\Inline\Element\Image;
use League\CommonMark\Inline\Element\Link;
use League\CommonMark\Inline\Element\Newline;
use League\CommonMark\Inline\Element\Strong;
use League\CommonMark\Inline\Element\Text;

class Renderer implements ElementRendererInterface
{
    /**
     * @param string $option
     * @param mixed $default
     *
     * @return mixed
     */
    public function getOption($option, $default = null)
    {
        return null;
    }

    /**
     * @param string $string
     * @param bool $preserveEntities
     *
     * @return string
     */
    public function escape($string, $preserveEntities = false)
    {
        // @TODO escape invalid characters
        return $string;
    }

    /**
     * @param AbstractInline[] $inlines
     *
     * @return string
     */
    public function renderInlines($inlines)
    {
        foreach ($inlines as $inline) {
            switch (get_class($inline)) {
                case Newline::class:
                    break;
                case Emphasis::class:
                case Strong::class:
                case Image::class:
                case Link::class:
                case Text::class:
                    break;
                default:
                    throw new \UnexpectedValueException();
                    break;
            }
        }
    }

    /**
     * @param AbstractBlock $block
     * @param bool $inTightList
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function renderBlock(AbstractBlock $block, $inTightList = false)
    {
        switch (get_class($block)) {
            case ListBlock::class:
                break;
            case ListItem::class:
                break;
            case Paragraph::class:
                break;
        }
    }

    /**
     * @param AbstractBlock[] $blocks
     * @param bool $inTightList
     *
     * @return string
     */
    public function renderBlocks($blocks, $inTightList = false)
    {
        $output = '';
        foreach ($blocks as $block) {
            $output .= $this->renderBlock($block, $inTightList);
        }
        return $output;
    }
}