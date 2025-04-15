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

/* modules/custom/dropsolid_blocks/templates/general/hero-block.html.twig */
class __TwigTemplate_d321a6a5ae04a12d0150206f5de4ac76 extends Template
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
        // line 22
        yield "<section class=\"hero\">
  <div class=\"hero__image-wrapper\">
      <img src=\"";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 24), "html", null, true);
        yield "\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 24), "html", null, true);
        yield "\" ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_position", [], "any", false, false, true, 24) == "left")) {
            yield "class=\"image_pos_left\"";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "image_position", [], "any", false, false, true, 24) == "right")) {
            yield "class=\"image_pos_right\"";
        }
        yield " />
  </div>
  <div class=\"hero__content\">
    <div class=\"hero__star\">
        <img src=\"";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/contact/stars.svg\" alt=\"Arrow bottom\" />
      </div>
      <h1>
      <span class=\"hero__title-highlight\">
        <span class=\"hero__title-text h1\">";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 32), "html", null, true);
        yield "</span>
        <span class=\"hero__title-bg\"></span>
      </span>
    </h1>
      ";
        // line 36
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "subtitle", [], "any", false, false, true, 36)) {
            // line 37
            yield "        <span class=\"hero__subtitle body-xxl\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "subtitle", [], "any", false, false, true, 37), "html", null, true);
            yield "</span>
      ";
        }
        // line 39
        yield "      <div class=\"hero__text\">
        <div class=\"body-xl\">";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "description", [], "any", false, false, true, 40));
        yield "</div>
      </div>
      ";
        // line 42
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "socials", [], "any", false, false, true, 42)) {
            // line 43
            yield "        <div class=\"hero__social\">
          ";
            // line 44
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 44), "twitter", [], "any", false, false, true, 44)) {
                // line 45
                yield "            <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 45), "twitter", [], "any", false, false, true, 45), "html", null, true);
                yield "\" target=\"_blank\" rel=\"noopener noreferrer\">
              <img src=\"";
                // line 46
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
                yield "/images/icons/twitter.svg\" alt=\"Twitter\" />
            </a>
          ";
            }
            // line 49
            yield "          
          ";
            // line 50
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 50), "linkedin", [], "any", false, false, true, 50)) {
                // line 51
                yield "            <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 51), "linkedin", [], "any", false, false, true, 51), "html", null, true);
                yield "\" target=\"_blank\" rel=\"noopener noreferrer\">
              <img src=\"";
                // line 52
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
                yield "/images/icons/linkedin.svg\" alt=\"LinkedIn\" />
            </a>
          ";
            }
            // line 55
            yield "          
          ";
            // line 56
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 56), "drupal", [], "any", false, false, true, 56)) {
                // line 57
                yield "            <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "social_links", [], "any", false, false, true, 57), "drupal", [], "any", false, false, true, 57), "html", null, true);
                yield "\" target=\"_blank\" rel=\"noopener noreferrer\">
              <img src=\"";
                // line 58
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
                yield "/images/icons/drupal.svg\" alt=\"Drupal\" class= \"hero__social-icon\"/>
            </a>
          ";
            }
            // line 61
            yield "        </div>
      ";
        }
        // line 63
        yield "  </div>
</section> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["base_path", "directory", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dropsolid_blocks/templates/general/hero-block.html.twig";
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
        return array (  149 => 63,  145 => 61,  139 => 58,  134 => 57,  132 => 56,  129 => 55,  123 => 52,  118 => 51,  116 => 50,  113 => 49,  107 => 46,  102 => 45,  100 => 44,  97 => 43,  95 => 42,  90 => 40,  87 => 39,  81 => 37,  79 => 36,  72 => 32,  65 => 28,  48 => 24,  44 => 22,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dropsolid_blocks/templates/general/hero-block.html.twig", "/var/www/html/web/modules/custom/dropsolid_blocks/templates/general/hero-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 24];
        static $filters = ["escape" => 24, "raw" => 40];
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
