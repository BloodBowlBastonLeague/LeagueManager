<?php

/* navbar_footer.html */
class __TwigTemplate_47e66e004f6629f98a2489346b0149fb extends Twig_Template
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
        return array (  128 => 24,  119 => 23,  103 => 19,  83 => 16,  77 => 14,  76 => 13,  176 => 47,  172 => 45,  139 => 42,  124 => 40,  120 => 39,  78 => 18,  65 => 15,  59 => 14,  47 => 11,  42 => 8,  21 => 2,  382 => 105,  378 => 103,  368 => 99,  362 => 95,  357 => 93,  354 => 92,  353 => 91,  350 => 90,  349 => 89,  346 => 88,  342 => 86,  324 => 83,  318 => 82,  305 => 80,  303 => 79,  286 => 75,  278 => 73,  269 => 70,  262 => 69,  253 => 67,  247 => 64,  243 => 62,  234 => 60,  225 => 58,  223 => 57,  218 => 55,  215 => 54,  212 => 53,  210 => 52,  204 => 51,  179 => 49,  159 => 44,  156 => 43,  151 => 42,  144 => 41,  114 => 37,  104 => 35,  99 => 34,  98 => 33,  93 => 18,  86 => 17,  80 => 24,  79 => 23,  70 => 20,  66 => 19,  51 => 17,  44 => 10,  41 => 11,  37 => 9,  27 => 3,  160 => 39,  145 => 35,  138 => 40,  125 => 30,  112 => 36,  108 => 21,  82 => 15,  68 => 21,  52 => 12,  46 => 10,  38 => 9,  36 => 8,  30 => 7,  25 => 4,  416 => 111,  406 => 109,  404 => 108,  401 => 107,  400 => 106,  397 => 105,  395 => 104,  389 => 103,  388 => 102,  375 => 101,  369 => 100,  360 => 94,  358 => 97,  348 => 96,  343 => 94,  340 => 93,  335 => 90,  330 => 88,  322 => 86,  320 => 85,  308 => 83,  304 => 81,  292 => 80,  279 => 78,  261 => 72,  257 => 70,  246 => 66,  232 => 61,  220 => 56,  217 => 57,  196 => 51,  193 => 51,  192 => 50,  183 => 50,  180 => 47,  169 => 44,  158 => 45,  157 => 44,  142 => 34,  141 => 42,  135 => 39,  134 => 37,  127 => 34,  118 => 29,  110 => 32,  107 => 31,  105 => 26,  102 => 29,  88 => 29,  81 => 24,  74 => 16,  69 => 21,  61 => 19,  50 => 16,  45 => 14,  43 => 9,  40 => 10,  39 => 11,  32 => 7,  26 => 6,  415 => 138,  412 => 137,  402 => 133,  398 => 131,  396 => 130,  391 => 127,  390 => 126,  386 => 124,  373 => 100,  372 => 101,  367 => 119,  359 => 114,  351 => 113,  345 => 95,  337 => 111,  332 => 89,  329 => 108,  326 => 107,  325 => 106,  319 => 103,  315 => 81,  311 => 84,  295 => 100,  285 => 92,  284 => 79,  251 => 66,  250 => 66,  245 => 64,  242 => 64,  241 => 63,  233 => 59,  208 => 51,  206 => 50,  199 => 48,  195 => 50,  190 => 48,  171 => 47,  155 => 20,  153 => 37,  150 => 18,  117 => 22,  106 => 20,  95 => 32,  84 => 23,  73 => 12,  62 => 10,  35 => 7,  22 => 2,  301 => 78,  298 => 73,  297 => 72,  294 => 77,  289 => 68,  288 => 67,  277 => 66,  276 => 72,  271 => 63,  268 => 62,  266 => 74,  263 => 73,  258 => 71,  256 => 56,  230 => 55,  229 => 57,  224 => 60,  221 => 59,  219 => 54,  216 => 53,  211 => 46,  209 => 56,  200 => 44,  189 => 43,  188 => 42,  185 => 49,  173 => 46,  170 => 39,  168 => 46,  165 => 42,  164 => 36,  161 => 22,  154 => 43,  149 => 30,  143 => 28,  140 => 27,  132 => 41,  130 => 35,  123 => 23,  116 => 37,  101 => 20,  96 => 25,  94 => 18,  91 => 30,  90 => 16,  87 => 15,  75 => 14,  72 => 13,  71 => 12,  63 => 20,  60 => 9,  58 => 18,  57 => 13,  54 => 18,  48 => 15,  34 => 7,  31 => 6,  19 => 1,);
    }
}
