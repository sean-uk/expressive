<?php
/**
 * Created by PhpStorm.
 * User: sean.james
 * Date: 30/03/2017
 * Time: 11:18
 */

namespace App;

use App\Action\SomeShitInATemplateAction;
use App\Action\SomeShitInATemplateFactory;
use Jralph\Twig\Markdown\Extension;

/**
 * Returns the templates configuration
 *
 * @return array
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'twig' => $this->getTwig()
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'factories' => [
                SomeShitInATemplateAction::class => SomeShitInATemplateFactory::class
            ]
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => ['templates/app'],
            ]
        ];
    }

    /**
     * @see https://zendframework.github.io/zend-expressive/features/template/twig/#configuration
     * @return array
     */
    public function getTwig()
    {
        return [
            'extensions' => [new \Jralph\Twig\Markdown\Extension(
                new \Jralph\Twig\Markdown\Parsedown\ParsedownExtraMarkdown()
            )]
        ];
    }
}