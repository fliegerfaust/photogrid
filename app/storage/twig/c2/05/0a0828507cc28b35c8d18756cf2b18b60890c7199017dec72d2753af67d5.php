<?php

/* /home/edelweiss/workspace/php/photogrid/plugins/mohsin/carousel/components/carousel/default.htm */
class __TwigTemplate_c2050a0828507cc28b35c8d18756cf2b18b60890c7199017dec72d2753af67d5 extends Twig_Template
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
        echo "<div id=\"carousel-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "id", array()), "html", null, true);
        echo "\" class=\"carousel slide\" data-ride=\"carousel\">
  ";
        // line 2
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "images", array())) > 1)) {
            // line 3
            echo "  <ol class=\"carousel-indicators\">
  ";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "images", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["i"] => $context["image"]) {
                // line 5
                echo "    <li data-target=\"#carousel-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "id", array()), "html", null, true);
                echo "\" data-slide-to=\"";
                echo twig_escape_filter($this->env, ($this->getAttribute($context["loop"], "index", array()) - 1), "html", null, true);
                echo "\"";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo " class=\"active\"";
                }
                echo "></li>
  ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "  </ol>
  ";
        }
        // line 9
        echo "
  ";
        // line 10
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "images", array())) > 0)) {
            // line 11
            echo "  <div class=\"carousel-inner\" role=\"listbox\">
    ";
            // line 12
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "images", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["i"] => $context["image"]) {
                // line 13
                echo "    <div class=\"item";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo " active";
                }
                echo "\">
      <img src=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "title", array()), "html", null, true);
                echo "\">
      <div class=\"carousel-caption\">

        ";
                // line 17
                if ($this->getAttribute($context["image"], "title", array())) {
                    echo "<h3>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "title", array()), "html", null, true);
                    echo "</h3>";
                }
                // line 18
                echo "
        ";
                // line 19
                if ($this->getAttribute($context["image"], "description", array())) {
                    echo "<p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "description", array()), "html", null, true);
                    echo "</p>";
                }
                // line 20
                echo "
      </div>
    </div>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "  </div>
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "images", array())) > 1)) {
            // line 28
            echo "    <a class=\"left carousel-control\" href=\"#carousel-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "id", array()), "html", null, true);
            echo "\" role=\"button\" data-slide=\"prev\">
      <span class=\"icon icon-prev\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Previous</span>
    </a>
    <a class=\"right carousel-control\" href=\"#carousel-";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carousel"]) ? $context["carousel"] : null), "id", array()), "html", null, true);
            echo "\" role=\"button\" data-slide=\"next\">
      <span class=\"icon icon-next\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Next</span>
    </a>
  ";
        }
        // line 37
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/home/edelweiss/workspace/php/photogrid/plugins/mohsin/carousel/components/carousel/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 37,  162 => 32,  154 => 28,  152 => 27,  149 => 26,  145 => 24,  128 => 20,  122 => 19,  119 => 18,  113 => 17,  105 => 14,  98 => 13,  81 => 12,  78 => 11,  76 => 10,  73 => 9,  69 => 7,  46 => 5,  29 => 4,  26 => 3,  24 => 2,  19 => 1,);
    }
}
