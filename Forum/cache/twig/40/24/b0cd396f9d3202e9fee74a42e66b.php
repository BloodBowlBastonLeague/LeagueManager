<?php

/* overall_footer.html */
class __TwigTemplate_4024b0cd396f9d3202e9fee74a42e66b extends Twig_Template
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
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- /#main -->
\t\t\t\t</div>
\t\t</div><!-- /#acp -->
\t</div>

\t<div id=\"page-footer\">
\t\t<div class=\"copyright\">
\t\t\t";
        // line 9
        if ((isset($context["S_COPYRIGHT_HTML"]) ? $context["S_COPYRIGHT_HTML"] : null)) {
            // line 10
            echo "\t\t\t\t";
            echo (isset($context["CREDIT_LINE"]) ? $context["CREDIT_LINE"] : null);
            echo "
\t\t\t\t";
            // line 11
            if ((isset($context["TRANSLATION_INFO"]) ? $context["TRANSLATION_INFO"] : null)) {
                echo "<br />";
                echo (isset($context["TRANSLATION_INFO"]) ? $context["TRANSLATION_INFO"] : null);
            }
            // line 12
            echo "\t\t\t";
        }
        // line 13
        echo "
\t\t\t";
        // line 14
        if ((isset($context["DEBUG_OUTPUT"]) ? $context["DEBUG_OUTPUT"] : null)) {
            // line 15
            echo "\t\t\t\t";
            if ((isset($context["S_COPYRIGHT_HTML"]) ? $context["S_COPYRIGHT_HTML"] : null)) {
                echo "<br />";
            }
            // line 16
            echo "\t\t\t\t";
            echo (isset($context["DEBUG_OUTPUT"]) ? $context["DEBUG_OUTPUT"] : null);
            echo "
\t\t\t";
        }
        // line 18
        echo "\t\t</div>

\t\t<div id=\"darkenwrapper\" data-ajax-error-title=\"";
        // line 20
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
\t\t\t<div id=\"darken\">&nbsp;</div>
\t\t</div>
\t\t<div id=\"loading_indicator\"></div>

\t\t<div id=\"phpbb_alert\" class=\"phpbb_alert\" data-l-err=\"";
        // line 25
        echo $this->env->getExtension('phpbb')->lang("ERROR");
        echo "\" data-l-timeout-processing-req=\"";
        echo $this->env->getExtension('phpbb')->lang("TIMEOUT_PROCESSING_REQ");
        echo "\">
\t\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t\t<h3 class=\"alert_title\"></h3><p class=\"alert_text\"></p>
\t\t</div>
\t\t<div id=\"phpbb_confirm\" class=\"phpbb_alert\">
\t\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t\t<div class=\"alert_text\"></div>
\t\t</div>
\t</div>
</div>

<script type=\"text/javascript\" src=\"";
        // line 36
        echo (isset($context["T_JQUERY_LINK"]) ? $context["T_JQUERY_LINK"] : null);
        echo "\"></script>
";
        // line 37
        if ((isset($context["S_ALLOW_CDN"]) ? $context["S_ALLOW_CDN"] : null)) {
            echo "<script type=\"text/javascript\">window.jQuery || document.write(unescape('%3Cscript src=\"";
            echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
            echo "/javascript/jquery.min.js?assets_version=";
            echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
            echo "\" type=\"text/javascript\"%3E%3C/script%3E'));</script>";
        }
        // line 38
        echo "<script type=\"text/javascript\" src=\"";
        echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
        echo "/javascript/core.js?assets_version=";
        echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
        echo "\"></script>
";
        // line 39
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
        // line 40
        $asset_file = "admin.js";
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
        // line 41
        echo "
";
        // line 42
        // line 43
        echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SCRIPTS");
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
        return array (  149 => 43,  115 => 39,  108 => 38,  100 => 37,  96 => 36,  80 => 25,  64 => 20,  54 => 16,  49 => 15,  47 => 14,  44 => 13,  29 => 9,  319 => 145,  314 => 142,  305 => 140,  301 => 138,  289 => 136,  275 => 134,  271 => 133,  268 => 132,  265 => 131,  262 => 130,  257 => 128,  249 => 126,  246 => 125,  239 => 123,  236 => 122,  206 => 113,  191 => 111,  168 => 103,  164 => 102,  159 => 99,  158 => 98,  151 => 96,  146 => 93,  140 => 90,  137 => 89,  136 => 88,  61 => 16,  57 => 15,  53 => 14,  48 => 13,  35 => 7,  22 => 2,  829 => 291,  826 => 290,  822 => 288,  817 => 285,  808 => 282,  805 => 281,  798 => 278,  793 => 277,  789 => 276,  784 => 274,  780 => 273,  776 => 272,  773 => 271,  760 => 270,  756 => 269,  752 => 267,  747 => 266,  740 => 262,  736 => 261,  732 => 260,  728 => 259,  724 => 258,  714 => 253,  709 => 251,  703 => 249,  701 => 248,  698 => 247,  693 => 244,  684 => 241,  680 => 240,  676 => 239,  672 => 238,  669 => 237,  665 => 236,  658 => 232,  654 => 231,  650 => 230,  646 => 229,  636 => 224,  631 => 222,  625 => 220,  623 => 219,  620 => 218,  616 => 216,  615 => 215,  608 => 211,  602 => 210,  597 => 208,  594 => 207,  587 => 203,  581 => 202,  575 => 200,  573 => 199,  566 => 195,  560 => 194,  555 => 192,  548 => 188,  542 => 187,  537 => 185,  530 => 181,  524 => 180,  519 => 178,  512 => 174,  508 => 173,  503 => 171,  496 => 167,  492 => 166,  487 => 164,  482 => 162,  479 => 161,  477 => 160,  471 => 156,  466 => 153,  461 => 151,  455 => 150,  453 => 149,  434 => 147,  428 => 145,  422 => 142,  417 => 141,  413 => 140,  408 => 139,  402 => 136,  397 => 135,  393 => 134,  388 => 133,  382 => 130,  377 => 129,  373 => 128,  368 => 127,  360 => 122,  355 => 121,  351 => 120,  346 => 119,  340 => 116,  335 => 115,  331 => 114,  326 => 113,  320 => 110,  315 => 109,  311 => 141,  306 => 107,  300 => 104,  295 => 137,  291 => 102,  286 => 135,  278 => 96,  274 => 95,  270 => 94,  266 => 93,  259 => 89,  255 => 87,  254 => 127,  251 => 85,  245 => 82,  242 => 124,  240 => 80,  237 => 79,  231 => 121,  228 => 120,  226 => 74,  223 => 73,  220 => 72,  214 => 119,  210 => 68,  207 => 67,  205 => 66,  202 => 65,  196 => 62,  192 => 61,  189 => 60,  187 => 110,  184 => 58,  178 => 104,  174 => 54,  171 => 53,  169 => 52,  166 => 51,  160 => 48,  156 => 47,  153 => 46,  150 => 45,  148 => 42,  145 => 41,  139 => 40,  135 => 39,  132 => 38,  130 => 40,  127 => 36,  121 => 33,  117 => 32,  114 => 31,  112 => 30,  109 => 29,  97 => 26,  93 => 25,  90 => 24,  78 => 21,  74 => 20,  70 => 19,  67 => 18,  65 => 17,  60 => 18,  55 => 13,  52 => 12,  46 => 9,  41 => 12,  38 => 6,  36 => 11,  31 => 10,  19 => 1,);
    }
}
