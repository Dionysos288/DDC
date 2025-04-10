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

/* themes/custom/olivero_sub/templates/views/views-view--blog-listing.html.twig */
class __TwigTemplate_8e6ede5e28ace1f02054fb653ee51760 extends Template
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
        // line 25
        yield "
<div";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["blog-card-view"], "method", false, false, true, 26), "addClass", ["full-width"], "method", false, false, true, 26), "html", null, true);
        yield ">
 
<div class=\"blog-inner\">
  <h2 class=\"blog-inner-title\"> All <span>Blogs</span> </h2>
 

 
  <div class='blog-card-line'/>
  ";
        // line 34
        if (($context["rows"] ?? null)) {
            // line 35
            yield "<div class=\"blog-card-view__content\">
      <div class=\"blog-card-grid\">
        ";
            // line 37
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            yield "
      </div>
    </div> 
  ";
        }
        // line 41
        yield "
 
  ";
        // line 43
        if (($context["pager"] ?? null)) {
            // line 44
            yield "    <div class=\"blog-card-view__pager\">
      ";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 48
        yield "
 
  
  </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "rows", "pager"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/views/views-view--blog-listing.html.twig";
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
        return array (  86 => 48,  80 => 45,  77 => 44,  75 => 43,  71 => 41,  64 => 37,  60 => 35,  58 => 34,  47 => 26,  44 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/views/views-view--blog-listing.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/views/views-view--blog-listing.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 34];
        static $filters = ["escape" => 26];
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
