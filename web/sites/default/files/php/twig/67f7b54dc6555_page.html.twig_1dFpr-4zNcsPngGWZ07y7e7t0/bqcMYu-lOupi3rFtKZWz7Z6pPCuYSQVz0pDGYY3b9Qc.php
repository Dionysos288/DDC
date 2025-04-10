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

/* themes/custom/olivero_sub/templates/layout/page.html.twig */
class __TwigTemplate_a68c1ae67e90b74db600ef5e1f3b4bb9 extends Template
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
            'featured' => [$this, 'block_featured'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "

<div class=\"layout-container\">
  ";
        // line 4
        yield from $this->loadTemplate("@olivero_sub/components/general/header.html.twig", "themes/custom/olivero_sub/templates/layout/page.html.twig", 4)->unwrap()->yield($context);
        // line 5
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "tabs", [], "any", false, false, true, 5), "html", null, true);
        yield "

  ";
        // line 7
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 7)) {
            // line 8
            yield "    <div class=\"highlighted\">
      <aside class=\"layout-container section clearfix\" role=\"complementary\">
        ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 10), "html", null, true);
            yield "
      </aside>
    </div>
  ";
        }
        // line 14
        yield "
  ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 15)) {
            // line 16
            yield "    ";
            yield from $this->unwrap()->yieldBlock('featured', $context, $blocks);
            // line 23
            yield "  ";
        }
        // line 24
        yield "
  <main role=\"main\">
    <a id=\"main-content\" tabindex=\"-1\"></a>
    <div class=\"layout-content\">
      ";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 28), "html", null, true);
        yield "
    </div>
  </main>

  ";
        // line 32
        yield from $this->loadTemplate("@olivero_sub/components/general/footer.html.twig", "themes/custom/olivero_sub/templates/layout/page.html.twig", 32)->unwrap()->yield($context);
        // line 33
        yield "</div>

";
        // line 35
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "page_top", [], "any", false, false, true, 35), "html", null, true);
        yield "
";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "page_bottom", [], "any", false, false, true, 36), "html", null, true);
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_featured(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 17
        yield "      <div class=\"featured-top\">
        <aside class=\"featured-top__inner section layout-container clearfix\" role=\"complementary\">
          ";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 19), "html", null, true);
        yield "
        </aside>
      </div>
    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/layout/page.html.twig";
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
        return array (  123 => 19,  119 => 17,  112 => 16,  105 => 36,  101 => 35,  97 => 33,  95 => 32,  88 => 28,  82 => 24,  79 => 23,  76 => 16,  74 => 15,  71 => 14,  64 => 10,  60 => 8,  58 => 7,  52 => 5,  50 => 4,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/layout/page.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 4, "if" => 7, "block" => 16];
        static $filters = ["escape" => 5];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if', 'block'],
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
