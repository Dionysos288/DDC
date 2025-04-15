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

/* modules/custom/dropsolid_blocks/templates/general/split-content-block.html.twig */
class __TwigTemplate_b2a50811a3b54aa5eb7c4be30da7a4eb extends Template
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
        // line 24
        yield "<section class=\"split-content full-width ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_position", [], "any", false, false, true, 24) == "right")) {
            yield "split-content--reverse";
        }
        yield " ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "gradient", [], "any", false, false, true, 24)) {
            yield "split-content--gradient";
        }
        yield " ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "background", [], "any", false, false, true, 24)) {
            yield "split-content--background";
        }
        yield "\">
  <div class=\"split-content__image\">
    <div class=\"split-content__image-wrapper\">
      <img src=\"";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 27), "html", null, true);
        yield "\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_alt", [], "any", false, false, true, 27), "html", null, true);
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_position_inner", [], "any", false, false, true, 27) == "left")) {
            yield "class=\"image_pos_left\"";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_position_inner", [], "any", false, false, true, 27) == "right")) {
            yield "class=\"image_pos_right\"";
        }
        yield " />
    </div>
    ";
        // line 29
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "link_url", [], "any", false, false, true, 29) && CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "link_text", [], "any", false, false, true, 29))) {
            // line 30
            yield "      <div class=\"split-content__cta\">
        <a href=\"";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "link_url", [], "any", false, false, true, 31), "html", null, true);
            yield "\" class=\"split-content__link\">
          ";
            // line 32
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "link_text", [], "any", false, false, true, 32), "html", null, true);
            yield "
          <img src=\"";
            // line 33
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
            yield "/images/icons/arrow.svg\" alt=\"Arrow Right\" />
        </a>
      </div>
    ";
        }
        // line 37
        yield "  </div>
  <div class=\"split-content__content\">
    ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "subtitle", [], "any", false, false, true, 39)) {
            // line 40
            yield "      <div class=\"split-content__subtitle-wrapper\">
        <div class=\"split-content__subtitle-line\"></div>
        <span class=\"split-content__subtitle body-l\">";
            // line 42
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "subtitle", [], "any", false, false, true, 42), "html", null, true);
            yield "</span>
      </div>
    ";
        }
        // line 45
        yield "    
    <h2 class=\"split-content__title\">
      ";
        // line 47
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "title_highlight", [], "any", false, false, true, 47)) {
            // line 48
            yield "        <span class=\"split-content__title-highlight\">
          <span class=\"split-content__title-text h2\">";
            // line 49
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 49), "html", null, true);
            yield "</span>
          <span class=\"split-content__title-bg\"></span>
        </span>
      ";
        } else {
            // line 53
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 53), "html", null, true);
            yield "
      ";
        }
        // line 55
        yield "    </h2>

    <div class=\"split-content__text body-xl\">
      ";
        // line 58
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "description", [], "any", false, false, true, 58));
        yield "
    </div>
  </div>
</section> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "base_path", "directory"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dropsolid_blocks/templates/general/split-content-block.html.twig";
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
        return array (  139 => 58,  134 => 55,  128 => 53,  121 => 49,  118 => 48,  116 => 47,  112 => 45,  106 => 42,  102 => 40,  100 => 39,  96 => 37,  89 => 33,  85 => 32,  81 => 31,  78 => 30,  76 => 29,  61 => 27,  44 => 24,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dropsolid_blocks/templates/general/split-content-block.html.twig", "/var/www/html/web/modules/custom/dropsolid_blocks/templates/general/split-content-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 24];
        static $filters = ["escape" => 27, "raw" => 58];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw'],
                [],
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
