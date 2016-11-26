<?php

/* themes/custom/snb_alpha/templates/page.html.twig */
class __TwigTemplate_07023301b5651edb6aa74e46a555d31434c240e307ff5adee7cbdb793c619f6d extends Twig_Template
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
        $tags = array("if" => 2);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div id=\"page\">
  ";
        // line 2
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "headline", array())) {
            // line 3
            echo "\t<section id=\"headline\">
\t<div class= \"container\">
\t  ";
            // line 5
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "headline", array()), "html", null, true));
            echo "
\t</div>
\t</section>\t
\t";
        }
        // line 9
        echo "

  <header id=\"header\" class=\"header\">
    <div class=\"container\">
        ";
        // line 13
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
    </div>
  </header>

  <section id=\"main\">
    <div class=\"container\">
\t    <div class=\"row\">
\t        <div id=\"content\" class=\"col-md-9 col-sm-9 col-xs-12\">
\t            ";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
\t        </div>
\t            ";
        // line 23
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array())) {
            // line 24
            echo "\t        <aside id=\"sidebar\" class=\"sidebar col-md-3 col-sm-3 col-xs-12\">
\t             ";
            // line 25
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar", array()), "html", null, true));
            echo "
\t        </aside>
\t             ";
        }
        // line 28
        echo "\t    </div>
    </div>
\t</section>

  ";
        // line 32
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 33
            echo "    <footer id=\"footer\" class>
      <div class=\"container\">
        ";
            // line 35
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "
      </div>
    </footer>
  ";
        }
        // line 39
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/snb_alpha/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 39,  104 => 35,  100 => 33,  98 => 32,  92 => 28,  86 => 25,  83 => 24,  81 => 23,  76 => 21,  65 => 13,  59 => 9,  52 => 5,  48 => 3,  46 => 2,  43 => 1,);
    }
}
/* <div id="page">*/
/*   {% if page.headline %}*/
/* 	<section id="headline">*/
/* 	<div class= "container">*/
/* 	  {{ page.headline }}*/
/* 	</div>*/
/* 	</section>	*/
/* 	{% endif %}*/
/* */
/* */
/*   <header id="header" class="header">*/
/*     <div class="container">*/
/*         {{ page.header }}*/
/*     </div>*/
/*   </header>*/
/* */
/*   <section id="main">*/
/*     <div class="container">*/
/* 	    <div class="row">*/
/* 	        <div id="content" class="col-md-9 col-sm-9 col-xs-12">*/
/* 	            {{ page.content }}*/
/* 	        </div>*/
/* 	            {% if page.sidebar %}*/
/* 	        <aside id="sidebar" class="sidebar col-md-3 col-sm-3 col-xs-12">*/
/* 	             {{ page.sidebar}}*/
/* 	        </aside>*/
/* 	             {% endif %}*/
/* 	    </div>*/
/*     </div>*/
/* 	</section>*/
/* */
/*   {% if page.footer %}*/
/*     <footer id="footer" class>*/
/*       <div class="container">*/
/*         {{ page.footer }}*/
/*       </div>*/
/*     </footer>*/
/*   {% endif %}*/
/* */
/* </div>*/
