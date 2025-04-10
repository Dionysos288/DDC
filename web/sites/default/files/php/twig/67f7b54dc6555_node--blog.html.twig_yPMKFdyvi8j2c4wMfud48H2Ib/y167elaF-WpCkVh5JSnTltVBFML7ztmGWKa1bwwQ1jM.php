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

/* themes/custom/olivero_sub/templates/content/node--blog.html.twig */
class __TwigTemplate_01d7db0c563479b07e39cb0b508543a0 extends Template
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
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 10
($context["node"] ?? null), "bundle", [], "any", false, false, true, 10))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 11
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 11)) ? ("node--promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 12
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 12)) ? ("node--sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 13)) ? ("node--unpublished") : ("")), ((        // line 14
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 17
        if ((($context["view_mode"] ?? null) == "full")) {
            // line 18
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("olivero_sub/blog-article"), "html", null, true);
            yield "
  <article";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["blog-article"], "method", false, false, true, 19), "html", null, true);
            yield ">
    <div class=\"blog-article__header\">
      <div class=\"blog-article__content__waves\">
        <img src=\"";
            // line 22
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/waves.svg")), "html", null, true);
            yield "\" alt=\"Decorative lines V2\" />
      </div>
      <div class=\"blog-article__content__star\">
        <img src=\"";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/star.svg")), "html", null, true);
            yield "\" alt=\"Decorative star\" />
      </div>
      <div class=\"blog-article__meta\">
        <div class=\"blog-article__date body-xl\">";
            // line 28
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "created", [], "any", false, false, true, 28), "value", [], "any", false, false, true, 28), "M d, Y"), "html", null, true);
            yield "</div>
        ";
            // line 29
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_tags", [], "any", false, false, true, 29), "entity", [], "any", false, false, true, 29)) {
                // line 30
                yield "          <div class=\"blog-article__tags\">
            ";
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_tags", [], "any", false, false, true, 31));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 32
                    yield "              <div class=\"field__item body-xl\">
                &nbsp;-&nbsp;";
                    // line 33
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 33), "label", [], "any", false, false, true, 33), "html", null, true);
                    yield "
              </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                yield "          </div>
        ";
            }
            // line 38
            yield "      </div>
      <h1";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["blog-article__title"], "method", false, false, true, 39), "addClass", ["h2"], "method", false, false, true, 39), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "</h1>
      ";
            // line 40
            if (($context["display_submitted"] ?? null)) {
                // line 41
                yield "        <div class=\"blog-article__author body-xl\">
          ";
                // line 42
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_name"] ?? null), "html", null, true);
                yield "
        </div>
      ";
            }
            // line 45
            yield "    </div>
    
    ";
            // line 47
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 47), "entity", [], "any", false, false, true, 47), "field_media_image", [], "any", false, false, true, 47)) {
                // line 48
                yield "      <div class=\"blog-article__featured-image\">
        <img src=\"";
                // line 49
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 49), "entity", [], "any", false, false, true, 49), "field_media_image", [], "any", false, false, true, 49), "entity", [], "any", false, false, true, 49), "uri", [], "any", false, false, true, 49), "value", [], "any", false, false, true, 49)), "html", null, true);
                yield "\" 
             alt=\"";
                // line 50
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 50), "entity", [], "any", false, false, true, 50), "field_media_image", [], "any", false, false, true, 50), "alt", [], "any", false, false, true, 50), "html", null, true);
                yield "\" />
      </div>
    ";
            }
            // line 53
            yield "    
    <div class=\"blog-article__content full-width\">
      <div class=\"blog-article__content__squigly\">
        <img src=\"";
            // line 56
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/squigly.svg")), "html", null, true);
            yield "\" alt=\"Decorative star\" />
      </div>
       <div class=\"blog-article__content__squiglyV2\">
        <img src=\"";
            // line 59
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/squiglyV2.svg")), "html", null, true);
            yield "\" alt=\"Decorative star\" />
      </div>
       <div class=\"blog-article__content__starsV2\">
        <img src=\"";
            // line 62
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/stars.png")), "html", null, true);
            yield "\" alt=\"Decorative star\" />
      </div>
      <div";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["blog-article__body"], "method", false, false, true, 64), "html", null, true);
            yield ">
     
        ";
            // line 66
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "_layout_builder", [], "any", false, false, true, 66)) {
                // line 67
                yield "          ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "_layout_builder", [], "any", false, false, true, 67), 0, [], "any", false, false, true, 67), "content", [], "any", false, false, true, 67)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["0e9be297-1812-4215-b940-a61b7e808025"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "_layout_builder", [], "any", false, false, true, 67), 0, [], "any", false, false, true, 67), "content", [], "any", false, false, true, 67), "0e9be297-1812-4215-b940-a61b7e808025", [], "array", false, false, true, 67)), "content", [], "any", false, false, true, 67), 0, [], "any", false, false, true, 67), "html", null, true);
                yield "
        ";
            }
            // line 69
            yield "
        <div class=\"blog-social-share\">
          <a href=\"https://www.facebook.com/sharer/sharer.php?u=";
            // line 71
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<current>", ["absolute" => true]));
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-share-btn facebook-share\">
            <img src=\"";
            // line 72
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/facebook.svg")), "html", null, true);
            yield "\" alt=\"Share on Facebook\" />
          </a>
          <a href=\"https://x.com/intent/tweet?url=";
            // line 74
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<current>", ["absolute" => true]));
            yield "&text=";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "label", [], "any", false, false, true, 74), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-share-btn twitter-share\">
            <img src=\"";
            // line 75
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/twitter.svg")), "html", null, true);
            yield "\" alt=\"Share on Twitter\" />
          </a>
          <a href=\"https://www.linkedin.com/sharing/share-offsite/?url=";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<current>", ["absolute" => true]));
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"social-share-btn linkedin-share\">
            <img src=\"";
            // line 78
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/linkedin.svg")), "html", null, true);
            yield "\" alt=\"Share on LinkedIn\" />
          </a>
          <button onclick=\"navigator.share({title: '";
            // line 80
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "label", [], "any", false, false, true, 80), "html", null, true);
            yield "', url: '";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<current>", ["absolute" => true]));
            yield "'})\" class=\"social-share-btn system-share\">
            <img src=\"";
            // line 81
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/blog/share.svg")), "html", null, true);
            yield "\" alt=\"Share\" />
          </button>
        </div>

      
      </div>
    </div>
    
    ";
            // line 89
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["related_posts"] ?? null))) {
                // line 90
                yield "      <div class=\"blog-article__related\">
        <div class=\"blog-article__related-top\">
        <h2>
      <span class=\"blog-article__title-highlight\">
        <span class=\"blog-article__related-title h2\">";
                // line 94
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Related Blogs"));
                yield "</span>
        <span class=\"blog-article__title-bg\"></span>
      </span>
    </h2>
          <a href=\"/blog\" class=\"blog-article__view-button\">
            <span class=\"body-l\">";
                // line 99
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All Blogs"));
                yield "</span>
            <img src=\"";
                // line 100
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/icons/arrow.svg")), "html", null, true);
                yield "\" alt=\"Arrow Right\" />
          </a>
        </div>
        <div class=\"blog-article__related-posts\">
          ";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["related_posts"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["related_post"]) {
                    // line 105
                    yield "            <a href=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "url", [], "any", false, false, true, 105), "html", null, true);
                    yield "\" class=\"blog-article__related-post\">
              ";
                    // line 106
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "image", [], "any", false, false, true, 106)) {
                        // line 107
                        yield "                <div class=\"blog-article__related-image\">
                  ";
                        // line 108
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "image", [], "any", false, false, true, 108), "html", null, true);
                        yield "
                </div>
              ";
                    }
                    // line 111
                    yield "              <div class=\"blog-article__related-meta\">
                <div class=\"blog-article__related-date\">";
                    // line 112
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "date", [], "any", false, false, true, 112), "html", null, true);
                    yield "</div>
                ";
                    // line 113
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "tags", [], "any", false, false, true, 113)) {
                        // line 114
                        yield "                  <span>&nbsp;-&nbsp;</span>
                  <div class=\"blog-article__related-category\">";
                        // line 115
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "tags", [], "any", false, false, true, 115), "html", null, true);
                        yield "</div>
                ";
                    }
                    // line 117
                    yield "              </div>
              <h3 class=\"blog-article__related-post-title\">
                ";
                    // line 119
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "title", [], "any", false, false, true, 119), "html", null, true);
                    yield "
              </h3>
              <div class=\"blog-article__related-author\">
                ";
                    // line 122
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t(" @author", ["@author" => CoreExtension::getAttribute($this->env, $this->source, $context["related_post"], "author", [], "any", false, false, true, 122)]));
                    yield "
              </div>
            </a>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['related_post'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 126
                yield "          <a href=\"/blog\" class=\"blog-article__view-button-mobile\">
            <span class=\"body-l\">";
                // line 127
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All Blogs"));
                yield "</span>
            <img src=\"";
                // line 128
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl((($context["directory"] ?? null) . "/images/icons/arrow.svg")), "html", null, true);
                yield "\" alt=\"Arrow Right\" />
          </a>
        </div>
      </div>
    ";
            }
            // line 133
            yield "  </article>
";
        } else {
            // line 135
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
            yield "
";
        }
        // line 136
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "directory", "title_attributes", "label", "display_submitted", "author_name", "content_attributes", "content", "related_posts"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/content/node--blog.html.twig";
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
        return array (  338 => 136,  332 => 135,  328 => 133,  320 => 128,  316 => 127,  313 => 126,  303 => 122,  297 => 119,  293 => 117,  288 => 115,  285 => 114,  283 => 113,  279 => 112,  276 => 111,  270 => 108,  267 => 107,  265 => 106,  260 => 105,  256 => 104,  249 => 100,  245 => 99,  237 => 94,  231 => 90,  229 => 89,  218 => 81,  212 => 80,  207 => 78,  203 => 77,  198 => 75,  192 => 74,  187 => 72,  183 => 71,  179 => 69,  173 => 67,  171 => 66,  166 => 64,  161 => 62,  155 => 59,  149 => 56,  144 => 53,  138 => 50,  134 => 49,  131 => 48,  129 => 47,  125 => 45,  119 => 42,  116 => 41,  114 => 40,  108 => 39,  105 => 38,  101 => 36,  92 => 33,  89 => 32,  85 => 31,  82 => 30,  80 => 29,  76 => 28,  70 => 25,  64 => 22,  58 => 19,  53 => 18,  51 => 17,  49 => 14,  48 => 13,  47 => 12,  46 => 11,  45 => 10,  44 => 8,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/content/node--blog.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/content/node--blog.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 8, "if" => 17, "for" => 31];
        static $filters = ["clean_class" => 10, "escape" => 18, "date" => 28, "t" => 94];
        static $functions = ["attach_library" => 18, "file_url" => 22, "url" => 71];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['clean_class', 'escape', 'date', 't'],
                ['attach_library', 'file_url', 'url'],
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
