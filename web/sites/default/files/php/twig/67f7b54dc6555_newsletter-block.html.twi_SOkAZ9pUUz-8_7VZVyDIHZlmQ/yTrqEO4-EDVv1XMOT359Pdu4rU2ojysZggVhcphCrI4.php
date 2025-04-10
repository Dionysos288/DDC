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

/* modules/custom/dropsolid_blocks/templates/general/newsletter-block.html.twig */
class __TwigTemplate_6fe9b634f2acc6e7aaca8ef08335845b extends Template
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
        // line 11
        yield "<section class=\"newsletter full-width\">
   <div class=\"newsletter__pattern\">
        <img src=\"";
        // line 13
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/general/pattern.svg\" alt=\"Arrow bottom\" />
      </div>
         <div class=\"newsletter__arrow\">
        <img src=\"";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/general/arrow.svg\" alt=\"Arrow bottom\" />
      </div>
         <div class=\"newsletter__underline\">
        <img src=\"";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/general/underline.svg\" alt=\"Arrow bottom\" />
      </div>
  <div class=\"newsletter__content\">
   <div class=\"newsletter__highlight\">
        <img src=\"";
        // line 23
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/general/highlight.svg\" alt=\"Arrow bottom\" />
      </div>
    <div class=\"newsletter__title-wrapper\">
        <h2 class=\"newsletter__title\">
        Want to
        </h2>
        <h2 class=\"newsletter__title-highlight\">
        Be up to date?
        </h2>
    </div>
    <p class=\"newsletter__description body-xl\">
      Get the latest insights, trends, and updates delivered straight to your inbox.
    </p>
    <form class=\"newsletter__form\">
      <div class=\"newsletter__form-group\">
        <input type=\"email\" class=\"newsletter__input\" placeholder=\"Enter Your Email\" required>
        <button type=\"submit\" class=\"newsletter__submit\">Get Started</button>
      </div>
    </form>
  </div>
</section> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["base_path", "directory"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dropsolid_blocks/templates/general/newsletter-block.html.twig";
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
        return array (  67 => 23,  60 => 19,  54 => 16,  48 => 13,  44 => 11,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dropsolid_blocks/templates/general/newsletter-block.html.twig", "/var/www/html/web/modules/custom/dropsolid_blocks/templates/general/newsletter-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 13];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
