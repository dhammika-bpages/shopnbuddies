<?php

/* core/themes/classy/templates/dataset/item-list--search-results.html.twig */
class __TwigTemplate_10a8919e3abf08b3cf9c590df56042cf8a5cea20282805c481d90ea4bf9a21e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("item-list.html.twig", "core/themes/classy/templates/dataset/item-list--search-results.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "item-list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 24);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set'),
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

        // line 24
        $context["classes"] = array(0 => "search-results", 1 => ($this->getAttribute(        // line 26
(isset($context["context"]) ? $context["context"] : null), "plugin", array()) . "-results"));
        // line 29
        $context["attributes"] = $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/dataset/item-list--search-results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 1,  51 => 29,  49 => 26,  48 => 24,  11 => 1,);
    }
}
/* {% extends "item-list.html.twig" %}*/
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for an item list of search results.*/
/*  **/
/*  * Available variables:*/
/*  * - items: A list of items. Each item contains:*/
/*  *   - attributes: HTML attributes to be applied to each list item.*/
/*  *   - value: The content of the list element.*/
/*  * - title: The title of the list.*/
/*  * - list_type: The tag for list element ("ul" or "ol").*/
/*  * - attributes: HTML attributes to be applied to the list.*/
/*  * - empty: A message to display when there are no items. Allowed value is a*/
/*  *   string or render array.*/
/*  * - context: An list of contextual data associated with the list. For search*/
/*  *   results, the following data is set:*/
/*  *   - plugin: The search plugin ID, for example "node_search".*/
/*  **/
/*  * @see template_preprocess_item_list()*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'search-results',*/
/*     context.plugin ~ '-results',*/
/*   ]*/
/* %}*/
/* {% set attributes = attributes.addClass(classes) %}*/
/* */
