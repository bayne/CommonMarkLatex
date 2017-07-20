<?php

namespace Bayne\CommonMarkLatex;

use League\CommonMark\DocParser;
use League\CommonMark\ElementRendererInterface;

class Converter
{
    /**
     * The document parser instance.
     *
     * @var \League\CommonMark\DocParser
     */
    protected $docParser;

    /**
     * The renderer instance.
     *
     * @var \League\CommonMark\ElementRendererInterface
     */
    protected $renderer;

    /**
     * Create a new commonmark converter instance.
     *
     * @param DocParser                $docParser
     * @param ElementRendererInterface $renderer
     */
    public function __construct(DocParser $docParser, ElementRendererInterface $renderer)
    {
        $this->docParser = $docParser;
        $this->renderer = $renderer;
    }

    /**
     * @param string $commonMark
     *
     * @return string
     *
     * @api
     */
    public function convert($commonMark)
    {
        $documentAST = $this->docParser->parse($commonMark);

        return $this->renderer->renderBlock($documentAST);
    }

    /**
     * @param $commonMark
     *
     * @return string
     */
    public function __invoke($commonMark)
    {
        return $this->convert($commonMark);
    }
}