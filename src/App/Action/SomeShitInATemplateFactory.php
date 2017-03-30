<?php
/**
 * Created by PhpStorm.
 * User: sean.james
 * Date: 30/03/2017
 * Time: 10:03
 */

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SomeShitInATemplateFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $templating = $container->get(TemplateRendererInterface::class);
        return new SomeShitInATemplateAction($templating);
    }
}