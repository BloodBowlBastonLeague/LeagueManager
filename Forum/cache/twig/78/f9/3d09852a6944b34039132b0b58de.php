<?php

/* notification_dropdown.html */
class __TwigTemplate_78f93d09852a6944b34039132b0b58de extends Twig_Template
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
        echo "<div id=\"notification_list\" class=\"dropdown dropdown-extended notification_list\">
\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t<div class=\"dropdown-contents\">
\t\t<div class=\"header\">
\t\t\t";
        // line 5
        echo $this->env->getExtension('phpbb')->lang("NOTIFICATIONS");
        echo "
\t\t\t<span class=\"header_settings\">
\t\t\t\t<a href=\"";
        // line 7
        echo (isset($context["U_NOTIFICATION_SETTINGS"]) ? $context["U_NOTIFICATION_SETTINGS"] : null);
        echo "\">";
        echo $this->env->getExtension('phpbb')->lang("SETTINGS");
        echo "</a>
\t\t\t\t";
        // line 8
        if ((isset($context["NOTIFICATIONS_COUNT"]) ? $context["NOTIFICATIONS_COUNT"] : null)) {
            // line 9
            echo "\t\t\t\t\t<span id=\"mark_all_notifications\"> &bull; <a href=\"";
            echo (isset($context["U_MARK_ALL_NOTIFICATIONS"]) ? $context["U_MARK_ALL_NOTIFICATIONS"] : null);
            echo "\" data-ajax=\"notification.mark_all_read\">";
            echo $this->env->getExtension('phpbb')->lang("MARK_ALL_READ");
            echo "</a></span>
\t\t\t\t";
        }
        // line 11
        echo "\t\t\t</span>
\t\t</div>

\t\t<ul>
\t\t\t";
        // line 15
        if ((!twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "notifications")))) {
            // line 16
            echo "\t\t\t\t<li class=\"no_notifications\">
\t\t\t\t\t";
            // line 17
            echo $this->env->getExtension('phpbb')->lang("NO_NOTIFICATIONS");
            echo "
\t\t\t\t</li>
\t\t\t";
        }
        // line 20
        echo "\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "notifications"));
        foreach ($context['_seq'] as $context["_key"] => $context["notifications"]) {
            // line 21
            echo "\t\t\t\t<li class=\"";
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "UNREAD")) {
                echo " bg2";
            }
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "STYLING")) {
                echo " ";
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "STYLING");
            }
            if ((!$this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "URL"))) {
                echo " no-url";
            }
            echo "\">
\t\t\t\t\t";
            // line 22
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "URL")) {
                // line 23
                echo "\t\t\t\t\t\t<a class=\"notification-block\" href=\"";
                if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "UNREAD")) {
                    echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "U_MARK_READ");
                    echo "\" data-real-url=\"";
                    echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "URL");
                } else {
                    echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "URL");
                }
                echo "\">
\t\t\t\t\t";
            }
            // line 25
            echo "\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "AVATAR")) {
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "AVATAR");
            } else {
                echo "<img src=\"";
                echo (isset($context["T_THEME_PATH"]) ? $context["T_THEME_PATH"] : null);
                echo "/images/no_avatar.gif\" alt=\"\" />";
            }
            // line 26
            echo "\t\t\t\t\t\t<div class=\"notification_text\">
\t\t\t\t\t\t\t<p class=\"notification-title\">";
            // line 27
            echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "FORMATTED_TITLE");
            echo "</p>
\t\t\t\t\t\t\t";
            // line 28
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "REFERENCE")) {
                echo "<p class=\"notification-reference\">";
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "REFERENCE");
                echo "</p>";
            }
            // line 29
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "FORUM")) {
                echo "<p class=\"notification-forum\">";
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "FORUM");
                echo "</p>";
            }
            // line 30
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "REASON")) {
                echo "<p class=\"notification-reason\">";
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "REASON");
                echo "</p>";
            }
            // line 31
            echo "\t\t\t\t\t\t\t<p class=\"notification-time\">";
            echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "TIME");
            echo "</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 33
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "URL")) {
                echo "</a>";
            }
            // line 34
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "UNREAD")) {
                // line 35
                echo "\t\t\t\t\t\t<a href=\"";
                echo $this->getAttribute((isset($context["notifications"]) ? $context["notifications"] : null), "U_MARK_READ");
                echo "\" class=\"mark_read icon-mark\" data-ajax=\"notification.mark_read\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("MARK_READ");
                echo "\"></a>
\t\t\t\t\t";
            }
            // line 37
            echo "\t\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notifications'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "\t\t</ul>

\t\t<div class=\"footer\">
\t\t\t<a href=\"";
        // line 42
        echo (isset($context["U_VIEW_ALL_NOTIFICATIONS"]) ? $context["U_VIEW_ALL_NOTIFICATIONS"] : null);
        echo "\"><span>";
        echo $this->env->getExtension('phpbb')->lang("SEE_ALL");
        echo "</span></a>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "notification_dropdown.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 39,  145 => 35,  138 => 33,  125 => 30,  112 => 28,  108 => 27,  82 => 22,  68 => 21,  52 => 15,  46 => 11,  38 => 9,  36 => 8,  30 => 7,  25 => 5,  416 => 111,  406 => 109,  404 => 108,  401 => 107,  400 => 106,  397 => 105,  395 => 104,  389 => 103,  388 => 102,  375 => 101,  369 => 99,  360 => 98,  358 => 97,  348 => 96,  343 => 94,  340 => 93,  335 => 90,  330 => 88,  322 => 86,  320 => 85,  308 => 83,  304 => 81,  292 => 80,  279 => 78,  261 => 72,  257 => 70,  246 => 66,  232 => 61,  220 => 58,  217 => 57,  196 => 52,  193 => 51,  192 => 50,  183 => 48,  180 => 47,  169 => 46,  158 => 45,  157 => 44,  142 => 34,  141 => 42,  135 => 38,  134 => 37,  127 => 34,  118 => 29,  110 => 32,  107 => 31,  105 => 26,  102 => 29,  88 => 25,  81 => 24,  74 => 22,  69 => 21,  61 => 19,  50 => 16,  45 => 14,  43 => 13,  40 => 12,  39 => 11,  32 => 7,  26 => 6,  415 => 138,  412 => 137,  402 => 133,  398 => 131,  396 => 130,  391 => 127,  390 => 126,  386 => 124,  373 => 100,  372 => 122,  367 => 119,  359 => 114,  351 => 113,  345 => 95,  337 => 111,  332 => 89,  329 => 108,  326 => 107,  325 => 106,  319 => 103,  315 => 102,  311 => 84,  295 => 100,  285 => 92,  284 => 79,  251 => 67,  250 => 66,  245 => 64,  242 => 64,  241 => 63,  233 => 59,  208 => 51,  206 => 50,  199 => 48,  195 => 47,  190 => 46,  171 => 30,  155 => 20,  153 => 37,  150 => 18,  117 => 15,  106 => 14,  95 => 27,  84 => 23,  73 => 11,  62 => 10,  35 => 7,  22 => 2,  301 => 74,  298 => 73,  297 => 72,  294 => 71,  289 => 68,  288 => 67,  277 => 66,  276 => 77,  271 => 63,  268 => 62,  266 => 74,  263 => 73,  258 => 71,  256 => 56,  230 => 55,  229 => 57,  224 => 60,  221 => 59,  219 => 54,  216 => 53,  211 => 46,  209 => 56,  200 => 44,  189 => 43,  188 => 42,  185 => 49,  173 => 31,  170 => 39,  168 => 38,  165 => 42,  164 => 36,  161 => 22,  154 => 31,  149 => 30,  143 => 28,  140 => 27,  132 => 31,  130 => 35,  123 => 23,  116 => 22,  101 => 20,  96 => 25,  94 => 18,  91 => 17,  90 => 16,  87 => 15,  75 => 14,  72 => 13,  71 => 12,  63 => 20,  60 => 9,  58 => 18,  57 => 17,  54 => 16,  48 => 15,  34 => 3,  31 => 6,  19 => 1,);
    }
}
