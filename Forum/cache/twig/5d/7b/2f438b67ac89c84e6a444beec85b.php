<?php

/* forumlist_body.html */
class __TwigTemplate_5d7b2f438b67ac89c84e6a444beec85b extends Twig_Template
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
        echo "
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "forumrow"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["forumrow"]) {
            // line 3
            echo "\t";
            if ((($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_CAT") && (!$this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_FIRST_ROW"))) || $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_NO_CAT"))) {
                // line 4
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
            }
            // line 9
            echo "
\t";
            // line 10
            // line 11
            echo "\t";
            if ((($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_CAT") || $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_FIRST_ROW")) || $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_NO_CAT"))) {
                // line 12
                echo "\t\t<div class=\"forabg\">
\t\t\t<div class=\"inner\">
\t\t\t<ul class=\"topiclist\">
\t\t\t\t<li class=\"header\">
\t\t\t\t\t";
                // line 16
                // line 17
                echo "\t\t\t\t\t<dl class=\"icon\">
\t\t\t\t\t\t<dt><div class=\"list-inner\">";
                // line 18
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_CAT")) {
                    echo "<a href=\"";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_VIEWFORUM");
                    echo "\">";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_NAME");
                    echo "</a>";
                } else {
                    echo $this->env->getExtension('phpbb')->lang("FORUM");
                }
                echo "</div></dt>
\t\t\t\t\t\t<dd class=\"topics\">";
                // line 19
                echo $this->env->getExtension('phpbb')->lang("TOPICS");
                echo "</dd>
\t\t\t\t\t\t<dd class=\"posts\">";
                // line 20
                echo $this->env->getExtension('phpbb')->lang("POSTS");
                echo "</dd>
\t\t\t\t\t\t<dd class=\"lastpost\"><span>";
                // line 21
                echo $this->env->getExtension('phpbb')->lang("LAST_POST");
                echo "</span></dd>
\t\t\t\t\t</dl>
\t\t\t\t\t";
                // line 23
                // line 24
                echo "\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<ul class=\"topiclist forums\">
\t";
            }
            // line 28
            echo "\t";
            // line 29
            echo "
\t";
            // line 30
            if ((!$this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_CAT"))) {
                // line 31
                echo "\t\t";
                // line 32
                echo "\t\t<li class=\"row\">
\t\t\t";
                // line 33
                // line 34
                echo "\t\t\t<dl class=\"icon ";
                echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_IMG_STYLE");
                echo "\">
\t\t\t\t<dt title=\"";
                // line 35
                echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_FOLDER_IMG_ALT");
                echo "\">
\t\t\t\t\t";
                // line 36
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_UNREAD_FORUM")) {
                    echo "<a href=\"";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_VIEWFORUM");
                    echo "\" class=\"icon-link\"></a>";
                }
                // line 37
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t";
                // line 38
                if (((isset($context["S_ENABLE_FEEDS"]) ? $context["S_ENABLE_FEEDS"] : null) && $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_FEED_ENABLED"))) {
                    echo "<!-- <a class=\"feed-icon-forum\" title=\"";
                    echo $this->env->getExtension('phpbb')->lang("FEED");
                    echo " - ";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_NAME");
                    echo "\" href=\"";
                    echo (isset($context["U_FEED"]) ? $context["U_FEED"] : null);
                    echo "?f=";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_ID");
                    echo "\"><img src=\"";
                    echo (isset($context["T_THEME_PATH"]) ? $context["T_THEME_PATH"] : null);
                    echo "/images/feed.gif\" alt=\"";
                    echo $this->env->getExtension('phpbb')->lang("FEED");
                    echo " - ";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_NAME");
                    echo "\" /></a> -->";
                }
                // line 39
                echo "
\t\t\t\t\t\t";
                // line 40
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_IMAGE")) {
                    echo "<span class=\"forum-image\">";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_IMAGE");
                    echo "</span>";
                }
                // line 41
                echo "\t\t\t\t\t\t<a href=\"";
                echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_VIEWFORUM");
                echo "\" class=\"forumtitle\">";
                echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_NAME");
                echo "</a>
\t\t\t\t\t\t";
                // line 42
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_DESC")) {
                    echo "<br />";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "FORUM_DESC");
                }
                // line 43
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "MODERATORS")) {
                    // line 44
                    echo "\t\t\t\t\t\t\t<br /><strong>";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "L_MODERATOR_STR");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "MODERATORS");
                    echo "
\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "subforum")) && $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_LIST_SUBFORUMS"))) {
                    // line 47
                    echo "\t\t\t\t\t\t\t";
                    // line 48
                    echo "\t\t\t\t\t\t\t<br /><strong>";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "L_SUBFORUM_STR");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</strong>
\t\t\t\t\t\t\t";
                    // line 49
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "subforum"));
                    foreach ($context['_seq'] as $context["_key"] => $context["subforum"]) {
                        // line 50
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute((isset($context["subforum"]) ? $context["subforum"] : null), "U_SUBFORUM");
                        echo "\" class=\"subforum";
                        if ($this->getAttribute((isset($context["subforum"]) ? $context["subforum"] : null), "S_UNREAD")) {
                            echo " unread";
                        } else {
                            echo " read";
                        }
                        echo "\" title=\"";
                        if ($this->getAttribute((isset($context["subforum"]) ? $context["subforum"] : null), "S_UNREAD")) {
                            echo $this->env->getExtension('phpbb')->lang("UNREAD_POSTS");
                        } else {
                            echo $this->env->getExtension('phpbb')->lang("NO_UNREAD_POSTS");
                        }
                        echo "\">";
                        echo $this->getAttribute((isset($context["subforum"]) ? $context["subforum"] : null), "SUBFORUM_NAME");
                        echo "</a>";
                        if ((!$this->getAttribute((isset($context["subforum"]) ? $context["subforum"] : null), "S_LAST_ROW"))) {
                            echo $this->env->getExtension('phpbb')->lang("COMMA_SEPARATOR");
                        }
                        // line 51
                        echo "\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subforum'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 52
                    echo "\t\t\t\t\t\t\t";
                    // line 53
                    echo "\t\t\t\t\t\t";
                }
                // line 54
                echo "
\t\t\t\t\t\t";
                // line 55
                if ((!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
                    // line 56
                    echo "\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t";
                    // line 57
                    if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "CLICKS")) {
                        // line 58
                        echo "\t\t\t\t\t\t\t\t";
                        echo $this->env->getExtension('phpbb')->lang("REDIRECTS");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo " <strong>";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "CLICKS");
                        echo "</strong>
\t\t\t\t\t\t\t";
                    } elseif (((!$this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_LINK")) && $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "TOPICS"))) {
                        // line 60
                        echo "\t\t\t\t\t\t\t\t";
                        echo $this->env->getExtension('phpbb')->lang("TOPICS");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo " <strong>";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "TOPICS");
                        echo "</strong>
\t\t\t\t\t\t\t";
                    }
                    // line 62
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t";
                // line 66
                if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "CLICKS")) {
                    // line 67
                    echo "\t\t\t\t\t<dd class=\"redirect\"><span>";
                    echo $this->env->getExtension('phpbb')->lang("REDIRECTS");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "CLICKS");
                    echo "</span></dd>
\t\t\t\t";
                } elseif ((!$this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_IS_LINK"))) {
                    // line 69
                    echo "\t\t\t\t\t<dd class=\"topics\">";
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "TOPICS");
                    echo " <dfn>";
                    echo $this->env->getExtension('phpbb')->lang("TOPICS");
                    echo "</dfn></dd>
\t\t\t\t\t<dd class=\"posts\">";
                    // line 70
                    echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "POSTS");
                    echo " <dfn>";
                    echo $this->env->getExtension('phpbb')->lang("POSTS");
                    echo "</dfn></dd>
\t\t\t\t\t<dd class=\"lastpost\"><span>
\t\t\t\t\t\t";
                    // line 72
                    if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_UNAPPROVED_TOPICS")) {
                        // line 73
                        echo "\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_UNAPPROVED_TOPICS");
                        echo "\">";
                        echo (isset($context["UNAPPROVED_IMG"]) ? $context["UNAPPROVED_IMG"] : null);
                        echo "</a>
\t\t\t\t\t\t";
                    } elseif ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_UNAPPROVED_POSTS")) {
                        // line 75
                        echo "\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_UNAPPROVED_POSTS");
                        echo "\">";
                        echo (isset($context["UNAPPROVED_POST_IMG"]) ? $context["UNAPPROVED_POST_IMG"] : null);
                        echo "</a>
\t\t\t\t\t\t";
                    }
                    // line 77
                    echo "\t\t\t\t\t\t";
                    if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "LAST_POST_TIME")) {
                        echo "<dfn>";
                        echo $this->env->getExtension('phpbb')->lang("LAST_POST");
                        echo "</dfn>
\t\t\t\t\t\t";
                        // line 78
                        if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_DISPLAY_SUBJECT")) {
                            // line 79
                            echo "\t\t\t\t\t\t\t";
                            // line 80
                            echo "\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_LAST_POST");
                            echo "\" title=\"";
                            echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "LAST_POST_SUBJECT");
                            echo "\" class=\"lastsubject\">";
                            echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "LAST_POST_SUBJECT_TRUNCATED");
                            echo "</a> <br />
\t\t\t\t\t\t";
                        }
                        // line 81
                        echo " 
\t\t\t\t\t\t";
                        // line 82
                        echo $this->env->getExtension('phpbb')->lang("POST_BY_AUTHOR");
                        echo " ";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "LAST_POSTER_FULL");
                        echo "
\t\t\t\t\t\t";
                        // line 83
                        if ((!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
                            echo "<a href=\"";
                            echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "U_LAST_POST");
                            echo "\">";
                            echo (isset($context["LAST_POST_IMG"]) ? $context["LAST_POST_IMG"] : null);
                            echo "</a> ";
                        }
                        echo "<br />";
                        echo $this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "LAST_POST_TIME");
                    } else {
                        echo $this->env->getExtension('phpbb')->lang("NO_POSTS");
                        echo "<br />&nbsp;";
                    }
                    echo "</span>
\t\t\t\t\t</dd>
\t\t\t\t";
                } else {
                    // line 86
                    echo "\t\t\t\t\t<dd>&nbsp;</dd>
\t\t\t\t";
                }
                // line 88
                echo "\t\t\t</dl>
\t\t\t";
                // line 89
                // line 90
                echo "\t\t</li>
\t\t";
                // line 91
                // line 92
                echo "\t";
            }
            // line 93
            echo "
\t";
            // line 94
            if ($this->getAttribute((isset($context["forumrow"]) ? $context["forumrow"] : null), "S_LAST_ROW")) {
                // line 95
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
                // line 99
                // line 100
                echo "\t";
            }
            // line 101
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 103
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
            // line 105
            echo $this->env->getExtension('phpbb')->lang("NO_FORUMS");
            echo "</strong>
\t\t</div>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forumrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forumlist_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  372 => 101,  368 => 99,  362 => 95,  357 => 93,  354 => 92,  350 => 90,  349 => 89,  346 => 88,  342 => 86,  324 => 83,  318 => 82,  315 => 81,  303 => 79,  286 => 75,  278 => 73,  269 => 70,  262 => 69,  253 => 67,  247 => 64,  243 => 62,  234 => 60,  225 => 58,  223 => 57,  218 => 55,  215 => 54,  212 => 53,  210 => 52,  204 => 51,  179 => 49,  159 => 44,  156 => 43,  151 => 42,  144 => 41,  114 => 37,  104 => 35,  99 => 34,  98 => 33,  93 => 31,  86 => 28,  80 => 24,  79 => 23,  70 => 20,  66 => 19,  51 => 17,  44 => 12,  41 => 11,  37 => 9,  27 => 3,  160 => 39,  145 => 35,  138 => 40,  125 => 30,  112 => 28,  108 => 36,  82 => 22,  68 => 21,  52 => 15,  46 => 11,  38 => 9,  36 => 8,  30 => 4,  25 => 5,  416 => 111,  406 => 109,  404 => 108,  401 => 107,  400 => 106,  397 => 105,  389 => 103,  388 => 102,  375 => 101,  373 => 100,  369 => 100,  360 => 94,  358 => 97,  348 => 96,  345 => 95,  343 => 94,  340 => 93,  335 => 90,  332 => 89,  330 => 88,  322 => 86,  320 => 85,  311 => 84,  308 => 83,  304 => 81,  292 => 80,  284 => 79,  279 => 78,  261 => 72,  257 => 70,  246 => 66,  232 => 61,  220 => 56,  217 => 57,  196 => 52,  193 => 51,  192 => 50,  183 => 50,  180 => 47,  169 => 46,  158 => 45,  157 => 44,  142 => 34,  141 => 42,  135 => 39,  134 => 37,  127 => 34,  118 => 29,  110 => 32,  107 => 31,  105 => 26,  102 => 29,  88 => 29,  81 => 24,  74 => 21,  69 => 21,  61 => 19,  50 => 16,  45 => 14,  43 => 13,  40 => 10,  39 => 11,  32 => 7,  26 => 6,  395 => 104,  392 => 117,  382 => 105,  378 => 103,  376 => 110,  371 => 107,  370 => 106,  366 => 104,  353 => 91,  352 => 102,  347 => 99,  339 => 94,  331 => 93,  325 => 92,  317 => 91,  312 => 89,  309 => 88,  306 => 87,  305 => 80,  299 => 83,  295 => 82,  291 => 81,  275 => 80,  265 => 72,  264 => 71,  255 => 69,  251 => 66,  250 => 66,  245 => 64,  242 => 64,  241 => 63,  233 => 59,  208 => 51,  206 => 50,  199 => 48,  195 => 47,  190 => 46,  171 => 47,  155 => 20,  153 => 37,  150 => 18,  117 => 38,  106 => 14,  95 => 32,  84 => 23,  73 => 11,  62 => 10,  35 => 7,  22 => 2,  301 => 78,  298 => 73,  297 => 72,  294 => 77,  289 => 68,  288 => 67,  277 => 66,  276 => 72,  271 => 63,  268 => 62,  266 => 74,  263 => 73,  258 => 71,  256 => 56,  230 => 55,  229 => 57,  224 => 60,  221 => 59,  219 => 54,  216 => 53,  211 => 46,  209 => 56,  200 => 44,  189 => 43,  188 => 42,  185 => 49,  173 => 48,  170 => 39,  168 => 46,  165 => 42,  164 => 36,  161 => 22,  154 => 31,  149 => 30,  143 => 28,  140 => 27,  132 => 31,  130 => 35,  123 => 23,  116 => 22,  101 => 20,  96 => 25,  94 => 18,  91 => 30,  90 => 16,  87 => 15,  75 => 14,  72 => 13,  71 => 12,  63 => 20,  60 => 9,  58 => 18,  57 => 17,  54 => 18,  48 => 15,  34 => 3,  31 => 6,  19 => 1,);
    }
}
