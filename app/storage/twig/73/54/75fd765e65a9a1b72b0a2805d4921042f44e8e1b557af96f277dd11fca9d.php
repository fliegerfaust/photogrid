<?php

/* /home/edelweiss/workspace/php/photogrid/plugins/hariadi/share/components/share/default.htm */
class __TwigTemplate_735475fd765e65a9a1b72b0a2805d4921042f44e8e1b557af96f277dd11fca9d extends Twig_Template
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
        echo "<div class=\"oc-share\">
    <div class=\"btn-group\">
      <button class=\"btn btn-default btn-xs disabled\">Поделиться:</button> 

      \t";
        // line 5
        if ((isset($context["facebook"]) ? $context["facebook"] : null)) {
            // line 6
            echo "        <a class=\"btn btn-default btn-xs\" target=\"_blank\" title=\"On Facebook\" href=\"http://www.facebook.com/sharer.php?u=";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\">
            <i class=\"fa fa-facebook\"></i>
        </a>
        ";
        }
        // line 10
        echo "
        ";
        // line 11
        if ((isset($context["twitter"]) ? $context["twitter"] : null)) {
            // line 12
            echo "        <a class=\"btn btn-default btn-xs\" target=\"_blank\" title=\"On Twitter\" href=\"http://twitter.com/share?url=";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\">
            <i class=\"fa fa-twitter\"></i>
        </a>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        if ((isset($context["googleplus"]) ? $context["googleplus"] : null)) {
            // line 18
            echo "        <a class=\"btn btn-default btn-xs\" target=\"_blank\" title=\"On Google Plus\" href=\"https://plus.google.com/share?url=";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\">
            <i class=\"fa fa-google-plus-square\"></i>
        </a>
        ";
        }
        // line 22
        echo "        
    </div>
</div>
 ";
    }

    public function getTemplateName()
    {
        return "/home/edelweiss/workspace/php/photogrid/plugins/hariadi/share/components/share/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 22,  53 => 18,  51 => 17,  48 => 16,  40 => 12,  38 => 11,  35 => 10,  27 => 6,  25 => 5,  19 => 1,);
    }
}
