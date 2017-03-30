<?php
/**
 * Created by PhpStorm.
 * User: sean.james
 * Date: 30/03/2017
 * Time: 11:12
 */

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SomeShitInATemplateAction implements MiddlewareInterface
{
    /** @var TemplateRendererInterface */
    private $templating;

    public function __construct(TemplateRendererInterface $templating)
    {
        $this->templating = $templating;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $params = $request->getQueryParams();
        $message = isset($params['message'])? $params['message'] : 'HELLO WORLD!!!!!';
        $content = $this->templating->render('app::a-template', ['message'=>$message]);
        return new HtmlResponse($content);
    }
}