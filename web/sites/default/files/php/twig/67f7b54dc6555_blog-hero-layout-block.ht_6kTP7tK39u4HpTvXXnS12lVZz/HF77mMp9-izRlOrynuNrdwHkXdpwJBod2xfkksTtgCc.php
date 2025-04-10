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

/* modules/custom/dropsolid_blocks/templates/blog/blog-hero-layout-block.html.twig */
class __TwigTemplate_308e9d08102e1b5861e562090bc1db8c extends Template
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
        // line 19
        yield "<div class=\"blog-hero\">
  <div class=\"blog-hero__inner\">
      ";
        // line 21
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "image", [], "any", false, false, true, 21)) {
            // line 22
            yield "        <div class=\"blog-hero__featured-image\">
          <img src=\"";
            // line 23
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "image", [], "any", false, false, true, 23), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "image_alt", [], "any", false, false, true, 23), "html", null, true);
            yield "\" />
        </div>
      ";
        }
        // line 26
        yield "      <div class=\"blog-hero__content\">
      <div class=\"blog-hero__featured-meta\">
        <div class=\"blog-hero__author body-l\">
          ";
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("By"));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "author", [], "any", false, false, true, 29), "html", null, true);
        yield "
        </div>
        <div class=\"blog-hero__date body-l\">
          ";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "date", [], "any", false, false, true, 32), "html", null, true);
        yield "
        </div>
      </div>
       <a class= \"blog-hero__title h2\" href=\"";
        // line 35
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "id", [], "any", false, false, true, 35)]), "html", null, true);
        yield "\">
        <span class=\"blog-hero__title-highlight\">
          <span class=\"blog-hero__title h2\">";
        // line 37
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "title", [], "any", false, false, true, 37), "html", null, true);
        yield "</span>
          <span class=\"blog-hero__title-bg\"></span>
        </span>
     
    </a>
    
      
      ";
        // line 44
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "description", [], "any", false, false, true, 44)) {
            // line 45
            yield "        <div class=\"blog-hero__description body-xxl\">
          ";
            // line 46
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "description", [], "any", false, false, true, 46));
            yield "
        </div>
      ";
        }
        // line 49
        yield "      
      <div class=\"blog-hero__social-share\">
        <span class=\"blog-hero__share-text body-l\">";
        // line 51
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Share on"));
        yield "</span>
        <div class=\"blog-hero__share-buttons\">
          <a href=\"https://www.facebook.com/sharer/sharer.php?u=https://drupal-cms-3.ddev.site";
        // line 53
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "url", [], "any", false, false, true, 53), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"blog-hero__share-btn facebook-share\">
            <img src=\"/";
        // line 54
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true);
        yield "/images/blog/facebookV2.svg\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Share on Facebook"));
        yield "\" />
          </a>
          <a href=\"https://twitter.com/intent/tweet?url=https://drupal-cms-3.ddev.site";
        // line 56
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "url", [], "any", false, false, true, 56), "html", null, true);
        yield "&text=";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "title", [], "any", false, false, true, 56), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"blog-hero__share-btn twitter-share\">
            <img src=\"/";
        // line 57
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true);
        yield "/images/blog/twitterV2.svg\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Share on Twitter"));
        yield "\" />
          </a>
          <a href=\"https://www.linkedin.com/sharing/share-offsite/?url=https://drupal-cms-3.ddev.site";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured_blog"] ?? null), "url", [], "any", false, false, true, 59), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"blog-hero__share-btn linkedin-share\">
            <img src=\"/";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true);
        yield "/images/blog/linkedinV2.svg\" alt=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Share on LinkedIn"));
        yield "\" />
          </a>
         
        </div>
      </div>
      </div>
  </div>
</div> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["featured_blog", "directory"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dropsolid_blocks/templates/blog/blog-hero-layout-block.html.twig";
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
        return array (  143 => 60,  139 => 59,  132 => 57,  126 => 56,  119 => 54,  115 => 53,  110 => 51,  106 => 49,  100 => 46,  97 => 45,  95 => 44,  85 => 37,  80 => 35,  74 => 32,  66 => 29,  61 => 26,  53 => 23,  50 => 22,  48 => 21,  44 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dropsolid_blocks/templates/blog/blog-hero-layout-block.html.twig", "/var/www/html/web/modules/custom/dropsolid_blocks/templates/blog/blog-hero-layout-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 21];
        static $filters = ["escape" => 23, "t" => 29, "raw" => 46];
        static $functions = ["path" => 35];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't', 'raw'],
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
