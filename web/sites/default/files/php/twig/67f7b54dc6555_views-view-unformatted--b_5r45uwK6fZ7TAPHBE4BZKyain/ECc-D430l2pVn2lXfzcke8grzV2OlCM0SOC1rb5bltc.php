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

/* themes/custom/olivero_sub/templates/views/views-view-unformatted--blog-listing--latest.html.twig */
class __TwigTemplate_2820d4b155c90972771f2a2df98e23f6 extends Template
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
        yield "
<div class=\"latest-blogs__grid\">
  ";
        // line 13
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["rows"] ?? null)) > 0)) {
            // line 14
            yield "    <div class=\"latest-blogs__featured\">
      ";
            // line 15
            $context["featured"] = (($_v0 = CoreExtension::getAttribute($this->env, $this->source, (($_v1 = ($context["rows"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["rows"] ?? null), 0, [], "array", false, false, true, 15)), "content", [], "any", false, false, true, 15)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#node"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v2 = ($context["rows"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["rows"] ?? null), 0, [], "array", false, false, true, 15)), "content", [], "any", false, false, true, 15), "#node", [], "array", false, false, true, 15));
            // line 16
            yield "      <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "id", [], "any", false, false, true, 16)]), "html", null, true);
            yield "\" class=\"featured-post\">
        ";
            // line 17
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_featured_image", [], "any", false, false, true, 17), "entity", [], "any", false, false, true, 17), "field_media_image", [], "any", false, false, true, 17)) {
                // line 18
                yield "          <div class=\"featured-post__image\">
            <img src=\"";
                // line 19
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_featured_image", [], "any", false, false, true, 19), "entity", [], "any", false, false, true, 19), "field_media_image", [], "any", false, false, true, 19), "entity", [], "any", false, false, true, 19), "uri", [], "any", false, false, true, 19), "value", [], "any", false, false, true, 19)), "html", null, true);
                yield "\" 
                 alt=\"";
                // line 20
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_featured_image", [], "any", false, false, true, 20), "entity", [], "any", false, false, true, 20), "field_media_image", [], "any", false, false, true, 20), "alt", [], "any", false, false, true, 20), "html", null, true);
                yield "\" />
          </div>
        ";
            }
            // line 23
            yield "        
        <div class=\"featured-post__meta\">
          <div class=\"featured-post__date body-m\">
            ";
            // line 26
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "created", [], "any", false, false, true, 26), "value", [], "any", false, false, true, 26), "M d, Y"), "html", null, true);
            yield "
          </div>
          ";
            // line 28
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_tags", [], "any", false, false, true, 28)) {
                // line 29
                yield "            <div class=\"featured-post__tags\">
              ";
                // line 30
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_tags", [], "any", false, false, true, 30));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 31
                    yield "                <span class=\"featured-post__tag body-m\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 31), "label", [], "any", false, false, true, 31), "html", null, true);
                    yield "</span>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 33
                yield "            </div>
          ";
            }
            // line 35
            yield "        </div>
        
        <h3 class=\"featured-post__title\">
          ";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "label", [], "any", false, false, true, 38), "html", null, true);
            yield "
        </h3>
        
        ";
            // line 41
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_description", [], "any", false, false, true, 41), "value", [], "any", false, false, true, 41)) {
                // line 42
                yield "          <div class=\"featured-post__description body-l\">
            ";
                // line 43
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "field_description", [], "any", false, false, true, 43), "value", [], "any", false, false, true, 43), "html", null, true);
                yield "
          </div>
        ";
            }
            // line 46
            yield "          <div class=\"featured-post__date-mobile body-m\">
            ";
            // line 47
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["featured"] ?? null), "created", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47), "M d, Y"), "html", null, true);
            yield "
          </div>
      </a>
    </div>

    ";
            // line 52
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["rows"] ?? null)) > 1)) {
                // line 53
                yield "      <div class=\"latest-blogs__recent\">
        ";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["rows"] ?? null), 1, 4));
                foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                    // line 55
                    yield "          ";
                    $context["post"] = (($_v3 = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 55)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3["#node"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 55), "#node", [], "array", false, false, true, 55));
                    // line 56
                    yield "          <a href=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, true, 56)]), "html", null, true);
                    yield "\" class=\"recent-post\">
            ";
                    // line 57
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "field_featured_image", [], "any", false, false, true, 57), "entity", [], "any", false, false, true, 57), "field_media_image", [], "any", false, false, true, 57)) {
                        // line 58
                        yield "              <div class=\"recent-post__image\">
                <img src=\"";
                        // line 59
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "field_featured_image", [], "any", false, false, true, 59), "entity", [], "any", false, false, true, 59), "field_media_image", [], "any", false, false, true, 59), "entity", [], "any", false, false, true, 59), "uri", [], "any", false, false, true, 59), "value", [], "any", false, false, true, 59)), "html", null, true);
                        yield "\" 
                     alt=\"";
                        // line 60
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "field_featured_image", [], "any", false, false, true, 60), "entity", [], "any", false, false, true, 60), "field_media_image", [], "any", false, false, true, 60), "alt", [], "any", false, false, true, 60), "html", null, true);
                        yield "\" />
              </div>
            ";
                    }
                    // line 63
                    yield "            
            <div class=\"recent-post__content\">
              <h4 class=\"recent-post__title\">
                ";
                    // line 66
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "label", [], "any", false, false, true, 66), "html", null, true);
                    yield "
              </h4>
              
              ";
                    // line 69
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "field_description", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69)) {
                        // line 70
                        yield "                <div class=\"recent-post__description body-l\">
                  ";
                        // line 71
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "field_description", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71), "html", null, true);
                        yield "
                </div>
              ";
                    }
                    // line 74
                    yield "              
              <div class=\"recent-post__date body-m\">
                ";
                    // line 76
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "created", [], "any", false, false, true, 76), "value", [], "any", false, false, true, 76), "M d, Y"), "html", null, true);
                    yield "
              </div>
            </div>
          </a>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                yield "      </div>
    ";
            }
            // line 83
            yield "  ";
        }
        // line 84
        yield "</div> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/olivero_sub/templates/views/views-view-unformatted--blog-listing--latest.html.twig";
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
        return array (  216 => 84,  213 => 83,  209 => 81,  198 => 76,  194 => 74,  188 => 71,  185 => 70,  183 => 69,  177 => 66,  172 => 63,  166 => 60,  162 => 59,  159 => 58,  157 => 57,  152 => 56,  149 => 55,  145 => 54,  142 => 53,  140 => 52,  132 => 47,  129 => 46,  123 => 43,  120 => 42,  118 => 41,  112 => 38,  107 => 35,  103 => 33,  94 => 31,  90 => 30,  87 => 29,  85 => 28,  80 => 26,  75 => 23,  69 => 20,  65 => 19,  62 => 18,  60 => 17,  55 => 16,  53 => 15,  50 => 14,  48 => 13,  44 => 11,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/olivero_sub/templates/views/views-view-unformatted--blog-listing--latest.html.twig", "/var/www/html/web/themes/custom/olivero_sub/templates/views/views-view-unformatted--blog-listing--latest.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 13, "set" => 15, "for" => 30];
        static $filters = ["length" => 13, "escape" => 16, "date" => 26, "slice" => 54];
        static $functions = ["path" => 16, "file_url" => 19];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['length', 'escape', 'date', 'slice'],
                ['path', 'file_url'],
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
