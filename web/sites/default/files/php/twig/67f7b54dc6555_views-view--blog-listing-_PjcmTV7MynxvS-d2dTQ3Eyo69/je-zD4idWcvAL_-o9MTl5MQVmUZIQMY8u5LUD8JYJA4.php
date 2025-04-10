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

/* themes/custom/olivero_sub/templates/views/views-view--blog-listing--latest.html.twig */
class __TwigTemplate_d66a715a8e44d8dbbe774d836ab88d2f extends Template
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
        // line 12
        yield "
<div class=\"latest-blogs full-width\">
  <div class=\"latest-blogs__header\">
    <div class=\"latest-blogs__header-left\">
      <div class=\"latest-blogs__line__label\">
        <div class=\"latest-blogs__line\"></div>
        <span class=\"latest-blogs__label body-l\">Blogs</span>
      </div>
      <span class=\"latest-blogs__title-highlight\">
        <span class=\"latest-blogs__title-text h2\">Browse my personal blog articles</span>
        <span class=\"latest-blogs__title-bg\"></span>
      </span>
    </div>
    <p class=\"latest-blogs__description body-xl\">Explore my thoughts, insights, and experiences on tech, business, and open-source.</p>
  </div>

  ";
        // line 28
        if (($context["rows"] ?? null)) {
            // line 29
            yield "    <div class=\"latest-blogs__content\">
      ";
            // line 30
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 33
        yield "</div> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/views/views-view--blog-listing--latest.html.twig";
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
        return array (  73 => 33,  67 => 30,  64 => 29,  62 => 28,  44 => 12,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/views/views-view--blog-listing--latest.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/views/views-view--blog-listing--latest.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 28];
        static $filters = ["escape" => 30];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
