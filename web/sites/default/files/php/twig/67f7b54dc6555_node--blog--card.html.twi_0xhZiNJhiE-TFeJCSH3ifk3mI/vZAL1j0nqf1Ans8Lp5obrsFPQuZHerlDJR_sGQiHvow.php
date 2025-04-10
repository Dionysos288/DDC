<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/olivero_sub/templates/content/node--blog--card.html.twig */
class __TwigTemplate_fd4d3953d42a686987a19862c951259a extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        $context["classes"] = ["blog-card", "node", ("node--type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 11
($context["node"] ?? null), "bundle", [], "any", false, false, true, 11))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 12
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 12)) ? ("node--promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 13)) ? ("node--sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 14
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 14)) ? ("node--unpublished") : ("")), ((        // line 15
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 18
        yield "
<article";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 19), "html", null, true);
        yield ">

  <div class=\"blog-card__inner\">
    <div class=\"blog-card__inner-left\">
    ";
        // line 23
        if ($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 23))) {
            // line 24
            yield "      <div class=\"blog-card__image\">
        ";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 25), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 28
        yield "    
    <div class=\"blog-card__content\">
      <h4";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["blog-card__title"], "method", false, false, true, 30), "html", null, true);
        yield ">
       ";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        yield "
      </h4>
       ";
        // line 33
        if (($context["display_submitted"] ?? null)) {
            // line 34
            yield "        <div class=\"blog-card__meta\">
          <span class=\"blog-card__author body-l\"> ";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_name"] ?? null), "html", null, true);
            yield "</span>
        </div>
      ";
        }
        // line 38
        yield "      ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_tags"], "method", false, false, true, 38) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_tags"], "method", false, false, true, 38), "isEmpty", [], "method", false, false, true, 38))) {
            // line 39
            yield "        <div class=\"blog-card__tags\">
          ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_tags"], "method", false, false, true, 40));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 41
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 41)) {
                    // line 42
                    yield "              <span class=\"blog-card__tag body-l\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 42), "label", [], "method", false, false, true, 42), "html", null, true);
                    yield "</span>
            ";
                }
                // line 44
                yield "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "        </div>
      ";
        }
        // line 47
        yield "      
    
      </div>
      </div>
     
      
      <div class=\"blog-card__under\">
       ";
        // line 54
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_tags"], "method", false, false, true, 54) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_tags"], "method", false, false, true, 54), "isEmpty", [], "method", false, false, true, 54))) {
            // line 55
            yield "        <div class=\"blog-card__tags-mobile\">
          ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_tags"], "method", false, false, true, 56));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 57
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 57)) {
                    // line 58
                    yield "              <span class=\"blog-card__tag body-l\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 58), "label", [], "method", false, false, true, 58), "html", null, true);
                    yield "</span>
            ";
                }
                // line 60
                yield "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            yield "        </div>
      ";
        }
        // line 63
        yield "      <a href=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "id", [], "any", false, false, true, 63)]), "html", null, true);
        yield "\" class=\"blog-card__read-more\">
 <img src=\"";
        // line 64
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/blog/arrow-right.svg\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("arrow"));
        yield "\" />
       </a>
    
  </div>
</article> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "content", "title_attributes", "label", "display_submitted", "author_name", "base_path", "directory"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/content/node--blog--card.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  167 => 64,  162 => 63,  158 => 61,  152 => 60,  146 => 58,  143 => 57,  139 => 56,  136 => 55,  134 => 54,  125 => 47,  121 => 45,  115 => 44,  109 => 42,  106 => 41,  102 => 40,  99 => 39,  96 => 38,  90 => 35,  87 => 34,  85 => 33,  80 => 31,  76 => 30,  72 => 28,  66 => 25,  63 => 24,  61 => 23,  54 => 19,  51 => 18,  49 => 15,  48 => 14,  47 => 13,  46 => 12,  45 => 11,  44 => 8,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/content/node--blog--card.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/content/node--blog--card.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 8, "if" => 23, "for" => 40];
        static $filters = ["clean_class" => 11, "escape" => 19, "render" => 23, "t" => 64];
        static $functions = ["path" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['clean_class', 'escape', 'render', 't'],
                ['path'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
