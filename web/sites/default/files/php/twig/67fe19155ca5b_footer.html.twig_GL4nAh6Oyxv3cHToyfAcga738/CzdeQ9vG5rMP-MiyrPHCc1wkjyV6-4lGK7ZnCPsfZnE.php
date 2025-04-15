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

/* @olivero_sub/components/general/footer.html.twig */
class __TwigTemplate_0ce328bb8b9861d1ee67c99c2d4d8ff0 extends Template
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
        // line 1
        yield "<footer class=\"site-footer full-width\">
  <div class=\"site-footer__inner\">
    <div class=\"site-footer__brand\">
      <div class=\"site-footer__logo\">
        <img src=\"";
        // line 5
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/general/logoFooter.svg\" alt=\"DDC Logo\" />
        <span class=\"body-l\">DDC</span>
      </div>
      <div class=\"site-footer__info\">
        <p class=\"body-xl\">Dominique De Cooman</p>
        <p class=\"body-xl\"><b>BTW:</b> BE0830227453</p>
        <p class=\"body-xl\"><b>Telephone:</b> +32 485 61 47 43</p>
      </div>
      <div class=\"site-footer__social\">
        <a href=\"https://x.com/dominiquedc\" aria-label=\"Twitter\" class=\"social-icon\" target=\"_blank\" rel=\"noopener noreferrer\">
          <img src=\"";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/twitter.svg\" alt=\"Twitter\" />
        </a>
        <a href=\"https://www.linkedin.com/in/dominiquedecooman/\" aria-label=\"LinkedIn\" class=\"social-icon\" target=\"_blank\" rel=\"noopener noreferrer\">
          <img src=\"";
        // line 18
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/linkedin.svg\" alt=\"LinkedIn\" />
        </a>
        <a href=\"https://www.drupal.org/user/199987\" aria-label=\"Drupal\" class=\"social-icon\" target=\"_blank\" rel=\"noopener noreferrer\">
          <img src=\"";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/drupal.svg\" alt=\"Drupal\" />
        </a>
        <a href=\"https://www.youtube.com/@dominiquedecooman2262\" aria-label=\"YouTube\" class=\"social-icon\" target=\"_blank\" rel=\"noopener noreferrer\">
          <img src=\"";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
        yield "/images/icons/Youtube.png\" alt=\"YouTube\" />
        </a>
      </div>
    </div>

    <div class=\"site-footer__nav\">
      <div class=\"site-footer__nav-column\">
        <h3 class=\"body-xxl\">Pages</h3>
        <ul>
          <li><a href=\"";
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        yield "\" class=\"body-xl\">Home</a></li>
          <li><a href=\"/my-story\" class=\"body-xl\">My Story</a></li>
          <li><a href=\"/public-speaking\" class=\"body-xl\">Public Speaking</a></li>
          <li><a href=\"/blogs\" class=\"body-xl\">Blogs</a></li>
          <li><a href=\"/contact\" class=\"body-xl\">Contact</a></li>
        </ul>
      </div>
      <div class=\"site-footer__nav-column\">
        <h3 class=\"body-xxl\">Security</h3>
        <ul>
          <li><a href=\"/terms-conditions\" class=\"body-xl\">Terms Conditions</a></li>
          <li><a href=\"/privacy-policy\" class=\"body-xl\">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class=\"site-footer__bottom\">
    <p class=\"body-xl\">© DDC. 2025</p>
  </div>
</footer> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["base_path", "directory"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@olivero_sub/components/general/footer.html.twig";
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
        return array (  93 => 33,  81 => 24,  75 => 21,  69 => 18,  63 => 15,  50 => 5,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@olivero_sub/components/general/footer.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/components/general/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 5];
        static $functions = ["path" => 33];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
