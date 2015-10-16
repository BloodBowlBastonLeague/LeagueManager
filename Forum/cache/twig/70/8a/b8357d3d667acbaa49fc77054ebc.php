<?php

/* navbar_footer.html */
class __TwigTemplate_708ab8357d3d667acbaa49fc77054ebc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"navbar\" role=\"navigation\">
\t<div class=\"inner\">

\t<ul id=\"nav-footer\" class=\"linklist bulletin\" role=\"menubar\">
\t\t<li class=\"small-icon icon-home breadcrumbs\">
\t\t\t";
        // line 6
        if ((isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null)) {
            echo "<span class=\"crumb\"><a href=\"";
            echo (isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null);
            echo "\" data-navbar-reference=\"home\">";
            echo $this->env->getExtension('phpbb')->lang("SITE_HOME");
            echo "</a></span>";
        }
        // line 7
        echo "\t\t\t";
        // line 8
        echo "\t\t\t<span class=\"crumb\"><a href=\"";
        echo (isset($context["U_INDEX"]) ? $context["U_INDEX"] : null);
        echo "\" data-navbar-reference=\"index\">";
        echo $this->env->getExtension('phpbb')->lang("INDEX");
        echo "</a></span>
\t\t\t";
        // line 9
        // line 10
        echo "\t\t</li>
\t\t";
        // line 11
        if (((isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null) && (!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)))) {
            echo "<li class=\"small-icon icon-";
            if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                echo "unsubscribe";
            } else {
                echo "subscribe";
            }
            echo "\" data-last-responsive=\"true\"><a href=\"";
            echo (isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null);
            echo "\" title=\"";
            echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
            echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"small-icon icon-";
            if ((!(isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null))) {
                echo "unsubscribe";
            } else {
                echo "subscribe";
            }
            echo "\" data-toggle-text=\"";
            echo (isset($context["S_WATCH_FORUM_TOGGLE"]) ? $context["S_WATCH_FORUM_TOGGLE"] : null);
            echo "\" data-toggle-url=\"";
            echo (isset($context["U_WATCH_FORUM_TOGGLE"]) ? $context["U_WATCH_FORUM_TOGGLE"] : null);
            echo "\">";
            echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
            echo "</a></li>";
        }
        // line 12
        echo "
\t\t";
        // line 13
        // line 14
        echo "\t\t<li class=\"rightside\">";
        echo (isset($context["S_TIMEZONE"]) ? $context["S_TIMEZONE"] : null);
        echo "</li>
\t\t";
        // line 15
        // line 16
        echo "\t\t";
        if ((!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
            // line 17
            echo "\t\t\t<li class=\"small-icon icon-delete-cookies rightside\"><a href=\"";
            echo (isset($context["U_DELETE_COOKIES"]) ? $context["U_DELETE_COOKIES"] : null);
            echo "\" data-ajax=\"true\" data-refresh=\"true\" role=\"menuitem\">";
            echo $this->env->getExtension('phpbb')->lang("DELETE_COOKIES");
            echo "</a></li>
\t\t\t";
            // line 18
            if ((isset($context["S_DISPLAY_MEMBERLIST"]) ? $context["S_DISPLAY_MEMBERLIST"] : null)) {
                echo "<li class=\"small-icon icon-members rightside\" data-last-responsive=\"true\"><a href=\"";
                echo (isset($context["U_MEMBERLIST"]) ? $context["U_MEMBERLIST"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("MEMBERLIST_EXPLAIN");
                echo "\" role=\"menuitem\">";
                echo $this->env->getExtension('phpbb')->lang("MEMBERLIST");
                echo "</a></li>";
            }
            // line 19
            echo "\t\t";
        }
        // line 20
        echo "\t\t";
        // line 21
        echo "\t\t";
        if ((isset($context["U_TEAM"]) ? $context["U_TEAM"] : null)) {
            echo "<li class=\"small-icon icon-team rightside\" data-last-responsive=\"true\"><a href=\"";
            echo (isset($context["U_TEAM"]) ? $context["U_TEAM"] : null);
            echo "\" role=\"menuitem\">";
            echo $this->env->getExtension('phpbb')->lang("THE_TEAM");
            echo "</a></li>";
        }
        // line 22
        echo "\t\t";
        // line 23
        echo "\t\t";
        if ((isset($context["U_CONTACT_US"]) ? $context["U_CONTACT_US"] : null)) {
            echo "<li class=\"small-icon icon-contact rightside\" data-last-responsive=\"true\"><a href=\"";
            echo (isset($context["U_CONTACT_US"]) ? $context["U_CONTACT_US"] : null);
            echo "\" role=\"menuitem\">";
            echo $this->env->getExtension('phpbb')->lang("CONTACT_US");
            echo "</a></li>";
        }
        // line 24
        echo "\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navbar_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 24,  119 => 23,  108 => 21,  103 => 19,  86 => 17,  83 => 16,  82 => 15,  76 => 13,  44 => 10,  36 => 8,  34 => 7,  176 => 47,  172 => 45,  154 => 43,  139 => 42,  124 => 40,  120 => 39,  116 => 37,  112 => 36,  78 => 18,  65 => 15,  59 => 14,  57 => 13,  52 => 12,  47 => 11,  46 => 10,  42 => 8,  30 => 7,  25 => 4,  416 => 111,  406 => 109,  404 => 108,  401 => 107,  400 => 106,  397 => 105,  389 => 103,  388 => 102,  375 => 101,  373 => 100,  369 => 99,  360 => 98,  358 => 97,  348 => 96,  345 => 95,  343 => 94,  340 => 93,  335 => 90,  332 => 89,  330 => 88,  322 => 86,  320 => 85,  311 => 84,  308 => 83,  304 => 81,  292 => 80,  284 => 79,  279 => 78,  276 => 77,  266 => 74,  263 => 73,  261 => 72,  258 => 71,  257 => 70,  246 => 66,  232 => 61,  224 => 60,  220 => 58,  217 => 57,  209 => 56,  196 => 51,  193 => 51,  192 => 50,  185 => 49,  183 => 48,  180 => 47,  169 => 44,  158 => 45,  157 => 44,  142 => 43,  141 => 42,  135 => 38,  134 => 37,  130 => 35,  127 => 34,  118 => 33,  110 => 32,  107 => 31,  105 => 30,  102 => 29,  88 => 25,  81 => 24,  74 => 16,  69 => 21,  61 => 19,  50 => 16,  48 => 15,  45 => 14,  43 => 9,  40 => 12,  39 => 11,  32 => 7,  26 => 6,  395 => 104,  392 => 117,  382 => 113,  378 => 111,  376 => 110,  371 => 107,  370 => 106,  366 => 104,  353 => 103,  352 => 102,  347 => 99,  339 => 94,  331 => 93,  325 => 92,  317 => 91,  312 => 89,  309 => 88,  306 => 87,  305 => 86,  299 => 83,  295 => 82,  291 => 81,  275 => 80,  265 => 72,  264 => 71,  255 => 69,  251 => 67,  250 => 66,  245 => 64,  242 => 64,  241 => 63,  233 => 59,  229 => 57,  221 => 59,  219 => 54,  216 => 53,  208 => 51,  206 => 50,  199 => 48,  195 => 50,  190 => 48,  173 => 46,  171 => 30,  161 => 22,  155 => 20,  153 => 19,  150 => 18,  132 => 41,  117 => 22,  106 => 20,  95 => 27,  84 => 12,  73 => 12,  60 => 9,  31 => 6,  22 => 2,  93 => 18,  79 => 16,  77 => 14,  72 => 12,  62 => 10,  58 => 18,  54 => 9,  49 => 6,  35 => 7,  21 => 2,  19 => 1,);
    }
}
