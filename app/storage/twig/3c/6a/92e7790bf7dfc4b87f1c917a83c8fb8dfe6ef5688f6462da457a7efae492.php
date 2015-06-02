<?php

/* /home/edelweiss/workspace/php/kangaparty-octobercms/themes/jacoweb-minify/layouts/default.htm */
class __TwigTemplate_3c6a92e7790bf7dfc4b87f1c917a83c8fb8dfe6ef5688f6462da457a7efae492 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>minifyTheme - ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "page", array()), "title", array()), "html", null, true);
        echo "</title>
        <meta name=\"author\" content=\"jacoweb\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 7
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/minify.png");
        echo "\" />
        
        ";
        // line 9
        echo $this->env->getExtension('CMS')->assetsFunction('css');
        echo $this->env->getExtension('CMS')->displayBlock('styles');
        // line 10
        echo "        
        <link href=\"";
        // line 11
        echo $this->env->getExtension('CMS')->themeFilter(array(0 => "assets/css/bootstrap.min.css", 1 => "assets/css/theme.min.css", 2 => "assets/css/normalize.css"));
        // line 15
        echo "\" rel=\"stylesheet\">
        
        <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\">
    </head>
    <body>
\t\t
\t\t<div id=\"wrapper\" class=\"container\">
\t\t
\t        <!-- Header -->
\t        <header id=\"layout-header\">
\t
\t            <!-- Nav -->
\t            <nav id=\"nav\" class=\"navbar\" role=\"navigation\">
\t                <div class=\"container\">
\t                    <div class=\"navbar-main\">
\t                        <ul class=\"nav navbar-nav\">
\t                            <li class=\"";
        // line 31
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "page", array()), "url", array()) == "/")) {
            echo "active";
        }
        echo "\">
\t                            \t<a href=\"";
        // line 32
        echo twig_escape_filter($this->env, _twig_default_filter("/"), "html", null, true);
        echo "\"><i class=\"fa fa-cloud\"></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t<li class=\"";
        // line 35
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "page", array()), "url", array()) == "/portfolio")) {
            echo "active";
        }
        echo "\">
\t                            \t<a href=\"";
        // line 36
        echo twig_escape_filter($this->env, _twig_default_filter("portfolio"), "html", null, true);
        echo "\"><i class=\"fa fa-camera-retro\"></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t<li class=\"";
        // line 39
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "page", array()), "url", array()) == "/about")) {
            echo "active";
        }
        echo "\">
\t                            \t<a href=\"";
        // line 40
        echo twig_escape_filter($this->env, _twig_default_filter("about"), "html", null, true);
        echo "\"><i class=\"fa fa-users\"></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t<li class=\"social\">
\t                            \t<a href=\"#\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t<li class=\"social\">
\t                            \t<a href=\"#\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t\t<li class=\"social\">
\t                            \t<a href=\"#\" target=\"_blank\"><i class=\"fa fa-google-plus-square\"></i></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"social\">
\t                            \t<a href=\"#\" target=\"_blank\"><i class=\"fa fa-vk\"></i></i></a>
\t\t\t\t\t\t\t\t\t<span></span>
\t                            </li>
\t                        </ul>
\t                    </div>
\t                </div>
\t            </nav>
\t
\t        </header>
\t
\t        <!-- Content -->
\t        <section id=\"layout-content\">
\t        
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-12 col-md-12 col-lg-12 bgwhite pd20 borderBottom\">
\t\t\t\t\t\t\t";
        // line 73
        echo $this->env->getExtension('CMS')->pageFunction();
        // line 74
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t        
\t            
\t        </section>
\t
\t        <!-- Footer -->
\t        <footer id=\"layout-footer\">
\t            ";
        // line 83
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("footer"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        // line 84
        echo "\t        </footer>
        
        </div>

        <!-- Scripts -->
        <script src=\"";
        // line 89
        echo $this->env->getExtension('CMS')->themeFilter(array(0 => "assets/javascript/jquery.js", 1 => "assets/javascript/app.js"));
        // line 92
        echo "\"></script>

        ";
        // line 94
        echo $this->env->getExtension('CMS')->assetsFunction('js');
        echo $this->env->getExtension('CMS')->displayBlock('scripts');
        // line 95
        echo "        
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/home/edelweiss/workspace/php/kangaparty-octobercms/themes/jacoweb-minify/layouts/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 95,  157 => 94,  153 => 92,  151 => 89,  144 => 84,  140 => 83,  129 => 74,  127 => 73,  91 => 40,  85 => 39,  79 => 36,  73 => 35,  67 => 32,  61 => 31,  43 => 15,  41 => 11,  38 => 10,  35 => 9,  30 => 7,  24 => 4,  19 => 1,);
    }
}
