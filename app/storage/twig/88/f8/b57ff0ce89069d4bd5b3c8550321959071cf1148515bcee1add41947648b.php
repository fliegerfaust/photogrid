<?php

/* /home/edelweiss/workspace/php/kangaparty-octobercms/themes/jacoweb-minify/pages/portfolio.htm */
class __TwigTemplate_88f8b57ff0ce89069d4bd5b3c8550321959071cf1148515bcee1add41947648b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"innerHtml\">
\t<div class=\"heading\">
\t\t<h1>Галерея</h1>
\t\t<span></span>
\t</div>
\t
\t<div class=\"content\">
\t";
        // line 8
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('CMS')->componentFunction("carousel"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 9
        echo "\t";
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('CMS')->componentFunction("shares"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 10
        echo "\t\t
<!-- \t\t<div id=\"portfolio\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-6 col-md-3 col-lg-3 cell\">
\t\t\t\t\t\t<div class=\"innerDiv\">
\t\t\t\t\t\t\t<div class=\"placeholder\">yeah

\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div> -->
\t</div>
\t
</div>";
    }

    public function getTemplateName()
    {
        return "/home/edelweiss/workspace/php/kangaparty-octobercms/themes/jacoweb-minify/pages/portfolio.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 10,  32 => 9,  28 => 8,  19 => 1,);
    }
}
