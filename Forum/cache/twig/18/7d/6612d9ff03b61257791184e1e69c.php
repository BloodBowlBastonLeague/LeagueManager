<?php

/* overall_footer.html */
class __TwigTemplate_187d6612d9ff03b61257791184e1e69c extends Twig_Template
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
        echo "\t\t";
        // line 2
        echo "\t</div>

";
        // line 4
        // line 5
        echo "
<div id=\"page-footer\" role=\"contentinfo\">
\t";
        // line 7
        $location = "navbar_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->env->loadTemplate("navbar_footer.html")->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 8
        echo "
\t<div class=\"copyright\">
\t\t";
        // line 10
        // line 11
        echo "\t\t";
        echo (isset($context["CREDIT_LINE"]) ? $context["CREDIT_LINE"] : null);
        echo "
\t\t";
        // line 12
        if ((isset($context["TRANSLATION_INFO"]) ? $context["TRANSLATION_INFO"] : null)) {
            echo "<br />";
            echo (isset($context["TRANSLATION_INFO"]) ? $context["TRANSLATION_INFO"] : null);
        }
        // line 13
        echo "\t\t";
        // line 14
        echo "\t\t";
        if ((isset($context["DEBUG_OUTPUT"]) ? $context["DEBUG_OUTPUT"] : null)) {
            echo "<br />";
            echo (isset($context["DEBUG_OUTPUT"]) ? $context["DEBUG_OUTPUT"] : null);
        }
        // line 15
        echo "\t\t";
        if ((isset($context["U_ACP"]) ? $context["U_ACP"] : null)) {
            echo "<br /><strong><a href=\"";
            echo (isset($context["U_ACP"]) ? $context["U_ACP"] : null);
            echo "\">";
            echo $this->env->getExtension('phpbb')->lang("ACP");
            echo "</a></strong>";
        }
        // line 16
        echo "\t</div>

\t<div id=\"darkenwrapper\" data-ajax-error-title=\"";
        // line 18
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TITLE");
        echo "\" data-ajax-error-text=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT");
        echo "\" data-ajax-error-text-abort=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_ABORT");
        echo "\" data-ajax-error-text-timeout=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_TIMEOUT");
        echo "\" data-ajax-error-text-parsererror=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_PARSERERROR");
        echo "\">
\t\t<div id=\"darken\">&nbsp;</div>
\t</div>

\t<div id=\"phpbb_alert\" class=\"phpbb_alert\" data-l-err=\"";
        // line 22
        echo $this->env->getExtension('phpbb')->lang("ERROR");
        echo "\" data-l-timeout-processing-req=\"";
        echo $this->env->getExtension('phpbb')->lang("TIMEOUT_PROCESSING_REQ");
        echo "\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<h3 class=\"alert_title\">&nbsp;</h3><p class=\"alert_text\"></p>
\t</div>
\t<div id=\"phpbb_confirm\" class=\"phpbb_alert\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<div class=\"alert_text\"></div>
\t</div>
</div>

</div>

<div>
\t<a id=\"bottom\" class=\"anchor\" accesskey=\"z\"></a>
\t";
        // line 36
        if ((!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
            echo (isset($context["RUN_CRON_TASK"]) ? $context["RUN_CRON_TASK"] : null);
        }
        // line 37
        echo "</div>

<script type=\"text/javascript\" src=\"";
        // line 39
        echo (isset($context["T_JQUERY_LINK"]) ? $context["T_JQUERY_LINK"] : null);
        echo "\"></script>
";
        // line 40
        if ((isset($context["S_ALLOW_CDN"]) ? $context["S_ALLOW_CDN"] : null)) {
            echo "<script type=\"text/javascript\">window.jQuery || document.write(unescape('%3Cscript src=\"";
            echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
            echo "/javascript/jquery.min.js?assets_version=";
            echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
            echo "\" type=\"text/javascript\"%3E%3C/script%3E'));</script>";
        }
        // line 41
        echo "<script type=\"text/javascript\" src=\"";
        echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
        echo "/javascript/core.js?assets_version=";
        echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
        echo "\"></script>
";
        // line 42
        $asset_file = "forum_fn.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('12');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 43
        $asset_file = "ajax.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('12');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 44
        echo "
";
        // line 45
        // line 46
        echo "
";
        // line 47
        if ((isset($context["S_PLUPLOAD"]) ? $context["S_PLUPLOAD"] : null)) {
            $location = "plupload.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("plupload.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 48
        echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SCRIPTS");
        echo "

";
        // line 50
        // line 51
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "overall_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 47,  172 => 45,  139 => 42,  124 => 40,  120 => 39,  78 => 18,  65 => 15,  59 => 14,  47 => 11,  42 => 8,  21 => 2,  382 => 105,  378 => 103,  368 => 99,  362 => 95,  357 => 93,  354 => 92,  353 => 91,  350 => 90,  349 => 89,  346 => 88,  342 => 86,  324 => 83,  318 => 82,  305 => 80,  303 => 79,  286 => 75,  278 => 73,  269 => 70,  262 => 69,  253 => 67,  247 => 64,  243 => 62,  234 => 60,  225 => 58,  223 => 57,  218 => 55,  215 => 54,  212 => 53,  210 => 52,  204 => 51,  179 => 49,  159 => 44,  156 => 43,  151 => 42,  144 => 41,  114 => 37,  104 => 35,  99 => 34,  98 => 33,  93 => 22,  86 => 28,  80 => 24,  79 => 23,  70 => 20,  66 => 19,  51 => 17,  44 => 12,  41 => 11,  37 => 9,  27 => 3,  160 => 39,  145 => 35,  138 => 40,  125 => 30,  112 => 36,  108 => 36,  82 => 22,  68 => 21,  52 => 12,  46 => 10,  38 => 9,  36 => 8,  30 => 7,  25 => 4,  416 => 111,  406 => 109,  404 => 108,  401 => 107,  400 => 106,  397 => 105,  395 => 104,  389 => 103,  388 => 102,  375 => 101,  369 => 100,  360 => 94,  358 => 97,  348 => 96,  343 => 94,  340 => 93,  335 => 90,  330 => 88,  322 => 86,  320 => 85,  308 => 83,  304 => 81,  292 => 80,  279 => 78,  261 => 72,  257 => 70,  246 => 66,  232 => 61,  220 => 56,  217 => 57,  196 => 51,  193 => 51,  192 => 50,  183 => 50,  180 => 47,  169 => 44,  158 => 45,  157 => 44,  142 => 34,  141 => 42,  135 => 39,  134 => 37,  127 => 34,  118 => 29,  110 => 32,  107 => 31,  105 => 26,  102 => 29,  88 => 29,  81 => 24,  74 => 16,  69 => 21,  61 => 19,  50 => 16,  45 => 14,  43 => 13,  40 => 10,  39 => 11,  32 => 7,  26 => 5,  415 => 138,  412 => 137,  402 => 133,  398 => 131,  396 => 130,  391 => 127,  390 => 126,  386 => 124,  373 => 100,  372 => 101,  367 => 119,  359 => 114,  351 => 113,  345 => 95,  337 => 111,  332 => 89,  329 => 108,  326 => 107,  325 => 106,  319 => 103,  315 => 81,  311 => 84,  295 => 100,  285 => 92,  284 => 79,  251 => 66,  250 => 66,  245 => 64,  242 => 64,  241 => 63,  233 => 59,  208 => 51,  206 => 50,  199 => 48,  195 => 50,  190 => 48,  171 => 47,  155 => 20,  153 => 37,  150 => 18,  117 => 38,  106 => 14,  95 => 32,  84 => 23,  73 => 11,  62 => 10,  35 => 7,  22 => 2,  301 => 78,  298 => 73,  297 => 72,  294 => 77,  289 => 68,  288 => 67,  277 => 66,  276 => 72,  271 => 63,  268 => 62,  266 => 74,  263 => 73,  258 => 71,  256 => 56,  230 => 55,  229 => 57,  224 => 60,  221 => 59,  219 => 54,  216 => 53,  211 => 46,  209 => 56,  200 => 44,  189 => 43,  188 => 42,  185 => 49,  173 => 46,  170 => 39,  168 => 46,  165 => 42,  164 => 36,  161 => 22,  154 => 43,  149 => 30,  143 => 28,  140 => 27,  132 => 41,  130 => 35,  123 => 23,  116 => 37,  101 => 20,  96 => 25,  94 => 18,  91 => 30,  90 => 16,  87 => 15,  75 => 14,  72 => 13,  71 => 12,  63 => 20,  60 => 9,  58 => 18,  57 => 13,  54 => 18,  48 => 15,  34 => 3,  31 => 6,  19 => 1,);
    }
}
